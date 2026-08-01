<?php

namespace App\Models\payment_gateway;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


//for paypal
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Paypal extends Model
{
    use HasFactory;

    // public static function payment_status($transaction_keys = [])
    // {
    //     $payment_gateway = DB::table('payment_gateways')->where('identifier', 'paypal')->first();
    //     $keys = json_decode($payment_gateway->keys, true);

    //     if ($payment_gateway->test_mode == 1) {
    //         $secret_key = $keys['sandbox_secret_key'];
    //         $client_id = $keys['sandbox_client_id'];
    //         $mode = 'sandbox';
    //         $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
    //     } else {
    //         $secret_key = $keys['production_secret_key'];
    //         $client_id = $keys['production_client_id'];
    //         $mode = 'production';
    //         $paypalURL       = 'https://api.paypal.com/v1/';
    //     }


    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $paypalURL . 'oauth2/token');
    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret_key);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     if (empty($response)) {
    //         return false;
    //     } else {
    //         $jsonData = json_decode($response);
    //         $curl = curl_init($paypalURL . 'checkout/orders/' . $transaction_keys['payment_id']);
    //         curl_setopt($curl, CURLOPT_POST, false);
    //         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //         curl_setopt($curl, CURLOPT_HEADER, false);
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //             'Authorization: Bearer ' . $jsonData->access_token,
    //             'Accept: application/json',
    //             'Content-Type: application/xml'
    //         ));
    //         $response = curl_exec($curl);
    //         curl_close($curl);

    //         // Transaction data
    //         $result = json_decode($response);

    //         // CHECK IF THE PAYMENT STATE IS APPROVED OR NOT
    //         if ($result->status == 'approved' || $result->status == 'COMPLETED') {
    //             Session::put(['session_id' => $transaction_keys['payment_id']]);
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    public static function payment_status($transaction_keys = [])
    {
        $payment_details = session('payment_details');
        // if (!is_array($payment_details)) {
        //     return false; // session expired or invalid
        // }
        //  Detect Vendor Payout from session
        // -----------------------------
        $payout_id = $payment_details['custom_field']['payout_id'] ?? null;
        $isVendorPayout = !empty($payout_id);

        //  Load PayPal gateway (global)
        // -----------------------------
        $payment_gateway = DB::table('payment_gateways')
            ->where('identifier', 'paypal')
            ->first();
        if (!$payment_gateway) return false;

        $keys = json_decode($payment_gateway->keys, true);

        //  Vendor payout → use vendor keys if available
        // -----------------------------
        if ($isVendorPayout) {
            $payout = Payout::find($payout_id);
            if (!$payout) {
                session()->flash('error', 'Invalid payout request.');
                return false;
            }

            $vendor = User::find($payout->user_id);
            if (!$vendor) {
                session()->flash('error', 'Vendor not found.');
                return false;
            }

            $vendorKeys = json_decode($vendor->paymentkeys, true);
            $vendorKey = $vendorKeys['paypal'] ?? null;

            if (
                !$vendorKey ||
                empty($vendorKey['sandbox_client_id']) ||
                empty($vendorKey['sandbox_secret_key'])
            ) {
                session()->flash('error', 'Vendor PayPal API key invalid or not configured.');
                return false;
            }

            $keys = $vendorKey; 
        }

        // Select sandbox / production keys
        // -----------------------------
        if ($payment_gateway->test_mode == 1 || ($isVendorPayout && !empty($keys['sandbox_client_id']))) {
            $secret_key = $keys['sandbox_secret_key'] ?? null;
            $client_id  = $keys['sandbox_client_id'] ?? null;
            $paypalURL  = 'https://api.sandbox.paypal.com/v1/';
        } else {
            $secret_key = $keys['production_secret_key'] ?? null;
            $client_id  = $keys['production_client_id'] ?? null;
            $paypalURL  = 'https://api.paypal.com/v1/';
        }

        if (!$secret_key || !$client_id) return false;

        //  Get payment ID
        // -----------------------------
        $payment_id = $transaction_keys['payment_id'] ?? null;
        if (!$payment_id) return false;

        // Get access token
        // -----------------------------
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret_key);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if (empty($response)) return false;

        $jsonData = json_decode($response);

        // Verify payment order
        // -----------------------------
        $curl = curl_init($paypalURL . 'checkout/orders/' . $payment_id);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $jsonData->access_token,
            'Accept: application/json',
            'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($response);

        if (!$result || !isset($result->status)) return false;
        if ($result->status == 'approved' || $result->status == 'COMPLETED') {
            Session::put(['session_id' => $payment_id]);
            return true;
        }

        return false; 
    }


    public static function refund_status($transaction_keys = [], $refund_amount = null)
    {
        $payment_gateway = DB::table('payment_gateways')->where('identifier', 'paypal')->first();
        $keys = json_decode($payment_gateway->keys, true);

        if ($payment_gateway->test_mode == 1) {
            $secret_key = $keys['sandbox_secret_key'];
            $client_id = $keys['sandbox_client_id'];
            $paypalURL = 'https://api.sandbox.paypal.com/';
        } else {
            $secret_key = $keys['production_secret_key'];
            $client_id = $keys['production_client_id'];
            $paypalURL = 'https://api.paypal.com/';
        }

        $payment_id = $transaction_keys ?? null;
        if (!$payment_id) {
            return false;
        }

        // Step 1: Get Access Token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'v1/oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret_key);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $response = curl_exec($ch);
        curl_close($ch);

        if (empty($response)) return false;

        $jsonData = json_decode($response);
        if (empty($jsonData->access_token)) return false;
        $access_token = $jsonData->access_token;

        // Step 2: Fetch Order Details
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'v2/checkout/orders/' . $payment_id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        $orderDetails = json_decode($response);

        if (
            empty($orderDetails->purchase_units[0]->payments->captures[0]->id)
        ) {
            return false;
        }

        $capture_id = $orderDetails->purchase_units[0]->payments->captures[0]->id;
        $amount = $orderDetails->purchase_units[0]->payments->captures[0]->amount;

        // Step 3: Make Refund Request
        $refund_value = $refund_amount ?? $amount->value; // Use partial amount if provided

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'v2/payments/captures/' . $capture_id . '/refund');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'amount' => [
                'value' => number_format($refund_value, 2, '.', ''), // PayPal requires 2 decimals
                'currency_code' => $amount->currency_code,
            ]
        ])); // Full refund
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $refundResponse = json_decode($response);

        if (!empty($refundResponse->status) && strtolower($refundResponse->status) === 'completed') {
            return true;
        }

        return false;
    }


}
