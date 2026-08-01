<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Cashfree extends Model
{
    use HasFactory;


    public static function payment_status($transaction_keys = [])
    {

        if ($transaction_keys != '') {
            array_shift($transaction_keys);
            // session(['keys' => $transaction_keys]);
            Session::put(['session_id' => $transaction_keys]);
            return true;
        }
        return false;
    }


    public static function payment_create($identifier)
    {
        try {
            $request = request()->all();

            $customer_phone = $request['customer_details']['customer_phone'];

            $payment_details = session('payment_details');

            $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

            $user = DB::table('users')->where('id', auth()->user()->id)->first();
            $keys = json_decode($payment_gateway->keys, true);

            $client_id = $keys['client_id'];
            $client_secret = $keys['client_secret'];

            if ($payment_gateway->test_mode == 1):
                $direct_api_url = "https://sandbox.cashfree.com/pg/orders";
                $mode = 'sandbox';
            else:
                $direct_api_url = "https://api.cashfree.com/pg/orders";
                $mode = 'production';
            endif;

            $order_id = 'ORD' . time();


            $postData = [
                'order_id' => $order_id,
                'order_amount' => number_format($payment_details['payable_amount'], 2, '.', ''),
                'order_currency' => $payment_gateway->currency,
                'customer_details' => [
                    'customer_id' => 'user_' . $user->id,
                    'customer_email' => $user->email,
                    'customer_phone' => $customer_phone,
                ],
                'order_meta' => [
                    'return_url' => $payment_details['success_url'] . '/' . $payment_gateway->identifier . '/cashfree?order_id=' . $order_id,
                ],
            ];


            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $direct_api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret),
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                throw new \Exception('Curl error: ' . $err);
            }

            $responseArr = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON response from Cashfree.');
            }

            if (isset($responseArr['valid']) && $responseArr['valid'] === true) {
                return true;
            } else {
                $errorMessage = $responseArr['message'] ?? 'Unknown error from Cashfree.';
                throw new \Exception('Cashfree API error: ' . $errorMessage);
            }
        } catch (\Exception) {
            return false;
        }
    }
}
