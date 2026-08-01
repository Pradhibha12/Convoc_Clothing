<?php
namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Pagseguro extends Model
{
    use HasFactory;

    public static function payment_status($transaction_keys = [])
    {

        if ($transaction_keys != '') {
            array_shift($transaction_keys);
            session(['keys' => $transaction_keys]);
            return true;
        }
        return false;

    }


    public static function payment_create($identifier)
    {
        $payment_details = session('payment_details');

        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $user = DB::table('users')->where('id', auth()->user()->id)->first();
        $keys = json_decode($payment_gateway->keys, true);

        $store_id = $payment_details['items'][0]['id'];
        $notify_url = $payment_details['success_url'] . '/' . $payment_gateway->identifier;
        $order_id = 'ORD' . time();

        $info = $store_id . $notify_url . $order_id . $payment_details['payable_amount'] . $payment_gateway->currency;
        $hash_key = hash_hmac('sha256', $info, $keys['secret_key']);


        $postData = [
            'store_id' => $store_id,
            'return' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'notify_url' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'currency_code' => $payment_gateway->currency,
            'order_id' => $order_id,
            'order_description' => 'SaaS product purchase',
            'amount' => round($payment_details['payable_amount']),
            'hash_key' => $hash_key,
        ];

        $data = json_encode($postData);

        if ($payment_gateway->test_mode == 1) {
            $url = 'https://api.sandbox.international.pagseguro.com?data=' . $data;
        } else {
            $url = 'https://billing.boacompra.com/payment.php?data=' . $data;
        }

        return $url;


    }

}
