<?php

namespace App\Models\payment_gateway;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class Razorpay extends Model
{
    use HasFactory;

    // public static function payment_status($transaction_keys = [])
    // {

    //     $payment_gateway = DB::table('payment_gateways')->where('identifier', 'razorpay')->first();
    //     $keys = json_decode($payment_gateway->keys, true);

    //     $public_key = $keys['public_key'];
    //     $secret_key = $keys['secret_key'];

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.razorpay.com/v1/payments/' . $transaction_keys['razorpay_payment_id'],
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Basic ' . base64_encode($public_key . ':' . $keys['secret_key'])
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);

    //     $response = json_decode($response);


    //     if ($response->status == 'captured' || $response->status == 'success') {
    //         Session::put(['session_id' => $transaction_keys['razorpay_payment_id']]);
    //         return true;
    //     }
        

    // }

    public static function payment_status($transaction_keys = [])
{
    
    $payment_details = session('payment_details');
    if (!is_array($payment_details)) {
        return false;
    }
    $payout_id = $payment_details['custom_field']['payout_id'] ?? null;
    $isVendorPayout = !empty($payout_id);

    $payment_gateway = DB::table('payment_gateways')->where('identifier', 'razorpay')->first();
    if (!$payment_gateway) return false;

    $keys = json_decode($payment_gateway->keys, true);
    //  Vendor payout → vendor keys
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
        $vendorKey = $vendorKeys['razorpay'] ?? null;

        if (!$vendorKey || empty($vendorKey['secret_key']) || str_contains($vendorKey['secret_key'], 'xxxx')) {
            session()->flash('error', 'Vendor Razorpay API key invalid or not configured.');
            return false;
        }

        $keys = $vendorKey; 
       

    }

    $public_key = $keys['public_key'] ?? null;
    $secret_key = $keys['secret_key'] ?? null;
    if (!$public_key || !$secret_key) return false;
    //  Transaction ID
    // -----------------------------
    $payment_id = $transaction_keys['razorpay_payment_id'] ?? null;
    if (!$payment_id) return false;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.razorpay.com/v1/payments/' . $payment_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'Authorization: Basic ' . base64_encode($public_key . ':' . $secret_key)
        ],
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($response);

    if (!$response || !isset($response->status)) return false;

    if ($response->status == 'captured' || $response->status == 'success') {
        Session::put(['session_id' => $payment_id]); // save transaction
        return true;
    }

    return false; 
}


    public static function payment_create($identifier)
    {
        $payment_details = session('payment_details');
        $user            = DB::table('users')->where('id', auth()->user()->id)->first();
        $payment_gateway = DB::table('payment_gateways')
                ->where('identifier', $identifier)
                ->first();

        $keys = json_decode($payment_gateway->keys, true);

        $public_key = $keys['public_key'];
        $secret_key = $keys['secret_key'];
        $color      = '';

        $receipt_id = Str::random(20);
        $api        = new Api($public_key, $secret_key);

        $order = $api->order->create(array(
            'receipt'  => $receipt_id,
            'amount'   => round($payment_details['payable_amount'] * 100, 2),
            'currency' => $payment_gateway->currency,
        ));

        $page_data = [
            'order_id'    => $order['id'],
            'razorpay_id' => $public_key,
            'amount'      => round($payment_details['payable_amount'] * 100, 2),

            'name'        => $user->name,
            'currency'    => $payment_gateway->currency,
            'email'       => $user->email,
            'phone'       => $user->phone,
            'address'     => $user->address,
            'description' => isset($payment_details['custom_field']['description']) ? $payment_details['custom_field']['description'] : '',
        ];

        $data = [
            'page_data'       => $page_data,
            'color'           => null,
            'payment_details' => $payment_details,
        ];
        return $data;
    }
}
