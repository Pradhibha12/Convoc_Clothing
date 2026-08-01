<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Doku extends Model
{
    use HasFactory;

 public static function payment_status($transaction_keys = [])
    {
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', 'doku')->first();

        if ($transaction_keys != '' && $payment_gateway->identifier == 'doku') {
            array_shift($transaction_keys);
            session(['keys' => $transaction_keys]);
            Session::put(['session_id' => $transaction_keys]);
            return true;
        } 
        
        return false;
    }


    public static function payment_create($identifier)
    {
        $payment_details      = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();


        $keys            = json_decode($payment_gateway->keys, true);
        $test_mode       = $payment_gateway->test_mode == 1 ? 1 : 0;
        $client_id       = $keys['client_id'];
        if ($test_mode == 1) {
            $key        = $keys['public_test_key'];
            $secret_key = $keys['secret_test_key'];
        } else {
            $key        = $keys['public_live_key'];
            $secret_key = $keys['secret_live_key'];
        }

        $user_id         = auth()->user()->id;
        $user            = DB::table('users')->where('id', $user_id)->first();
        $currency        = $payment_gateway->currency;
        $product_title   = $payment_details['items'][0]['name'];
        $amount          = $payment_details['payable_amount'];

        $requestBody = array(
            'order'    => array(
                'amount'         => $amount,
                'invoice_number' => 'INV-' . rand(1, 10000),
                'currency' => $currency,
                'callback_url'   => $payment_details["success_url"] . "/$identifier",
                'line_items'     => array(
                    0 => array(
                        'name'     => $product_title,
                        'price'    => $amount,
                        'quantity' => 1,
                    ),
                ),
            ),
            'payment'  => array(
                'payment_due_date' => 60,
            ),
            'customer' => array(
                'id'      => 'CUST-' . rand(1, 1000),
                'name' => $user->name,
                'email'   => $user->email,
                'phone'   => $user->phone ?? '01723546783',
                'address' => $user->address ?? 'Bangladesh',
                'country' => 'ID',
            ),
        );

        $requestId     = rand(1, 100000);
        $dateTime      = gmdate("Y-m-d H:i:s");
        $isoDateTime   = date(DATE_ISO8601, strtotime($dateTime));
        $dateTimeFinal = substr($isoDateTime, 0, 19) . "Z";
        $clientId      = $client_id;
        $secretKey     = $secret_key;


        if ($test_mode == 1) {
            $getUrl = 'https://api-sandbox.doku.com';
        } else {
            $getUrl = 'https://api.doku.com';
        }

        $targetPath = '/checkout/v1/payment';
        $url        = $getUrl . $targetPath;

        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));

        $componentSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $dateTimeFinal . "\n" .
            "Request-Target:" . $targetPath . "\n" .
            "Digest:" . $digestValue;

        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Client-Id:' . $clientId,
            'Request-Id:' . $requestId,
            'Request-Timestamp:' . $dateTimeFinal,
            'Signature:' . "HMACSHA256=" . $signature,
        ));

        $responseJson = curl_exec($ch);
        $httpCode     = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if (is_string($responseJson) && $httpCode == 200) {
            $response = json_decode($responseJson, true);
            return $response['response']['payment']['url'];
        } else {
            return null;
        }
    }


}
