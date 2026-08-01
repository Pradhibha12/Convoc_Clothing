<?php
namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Tazapay extends Model
{
    use HasFactory;


    public static function payment_status($transaction_keys = [])
    {
        if ($transaction_keys != '') {
            // array_shift($transaction_keys);
            Session::put(['session_id' => $transaction_keys]);
            return true;
        }
        return false;

    }


    public static function payment_create($identifier)
    {
        $request = request()->all();
        $payment_details = session('payment_details');
        
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $user = DB::table('users')->where('id', auth()->user()->id)->first();
        $keys = json_decode($payment_gateway->keys, true);

        $products_name = '';
        foreach ($payment_details['items'] as $key => $value):
            if ($key == 0) {
                $products_name .= $value['name'];
            } else {
                $products_name .= ', ' . $value['name'];
            }
        endforeach;

        if ($payment_gateway->test_mode == 1):
            $public_key = $keys['public_key'];
            $api_key = $keys['api_key'];
            $api_secret = $keys['api_secret'];
            $direct_api_url = "https://service-sandbox.tazapay.com/v3/checkout";
        else:
            $public_key = $keys['public_key'];
            $api_key = $keys['api_key'];
            $api_secret = $keys['api_secret'];
            $direct_api_url = "https://service.tazapay.com/v3/checkout";
        endif;

        $country = $request['country_code'];
        if (is_array($country)) {
            $country = reset($country);
        } else {
            $country = $country ?? 'DEFAULT';
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $direct_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'customer_details' => [
                    'name' => $user->name,
                    'country' => $country,
                    'email' => $user->email,
                ],
                'invoice_currency' => $payment_gateway->currency,
                'amount' => round($payment_details['payable_amount'] * 100),
                'success_url' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
                'cancel_url' => $payment_details['cancel_url'],
                'transaction_description' => $identifier,
            ]),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic " . base64_encode($api_key . ':' . $api_secret),
                "content-type: application/json"
            ],
        ]);


        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $responseArr = json_decode($response, true);

        if (isset($responseArr) && $responseArr['status'] == 'success') {
            return $responseArr['data']['url'];
        }


    }

}
