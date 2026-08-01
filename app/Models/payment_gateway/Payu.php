<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use OpenPayU_Configuration;

class Payu extends Model
{
    use HasFactory;

    protected static function getUserIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        } else {
            return '127.0.0.1';
        }
    }

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
        $ip = self::getUserIp();
        $payment_details = session('payment_details');

        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $user = DB::table('users')->where('id', auth()->user()->id)->first();
        $keys = json_decode($payment_gateway->keys, true);

        $pos_id = $keys['pos_id'];
        $second_key = $keys['second_key'];

        if ($payment_gateway->test_mode == 1) {
            $direct_api_url = "https://secure.snd.payu.com/api/v2_1/orders";
        } else {
            $direct_api_url = "https://secure.payu.com/api/v2_1/orders";
        }

        $products = [];
        foreach ($payment_details['items'] as $item) {

            $price = floatval(preg_replace('/[^\d.]/', '', $item['selling_price']));

            $products[] = [
                'name' => $item['name'],
                'unitPrice' => round($price * 100),
                'quantity' => 1,
            ];
        }

        $postData = [
            'notifyUrl' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'continueUrl' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'cancelUrl' => $payment_details['cancel_url'],
            'customerIp' => $ip,
            'merchantPosId' => $pos_id,
            'description' => 'Product purchase',
            'currencyCode' => $payment_gateway->currency,
            'totalAmount' => round($payment_details['payable_amount'] * 100),
            'buyer' => [
                'email' => $user->email,
                'phone' => '',
                'name' => $user->name,
                'language' => 'en',
            ],
            'products' => $products,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $direct_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Basic " . base64_encode($pos_id . ':' . $second_key),
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        $responseArr = json_decode($response, true);

        if (isset($responseArr['status']['statusCode']) && $responseArr['status']['statusCode'] == 'SUCCESS') {
            return $responseArr['redirectUri'];
        }
    }
}
