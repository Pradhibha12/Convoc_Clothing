<?php
namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Xendit extends Model
{
    use HasFactory;


    public static function payment_status($transaction_keys = [])
    {

        if ($transaction_keys != '') {
            Session::put(['session_id' => $transaction_keys]);
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


        $api_key = $keys['api_key'];
        $secret_key = $keys['secret_key'];

        if ($payment_gateway->test_mode == 1) {
            $direct_api_url = "https://api.xendit.co/v2/invoices";
        } else {
            $direct_api_url = "https://service.xendit.com/v3/checkout";
        }

        $external_id = 'AC' . time();

        $postData = [
            'external_id' => $external_id,
            'payer_email' => $user->email,
            'description' => 'Payment',
            'amount' => number_format($payment_details['payable_amount'], 2, '.', ''),
            'success_redirect_url' => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'failure_redirect_url' => $payment_details['cancel_url'],
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
                "Authorization: Basic " . base64_encode($api_key . ':' . $secret_key),
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json(['error' => $err], 500);
        }

        $responseArr = json_decode($response, true);

        if (isset($responseArr['invoice_url'])) {
            return $responseArr['invoice_url'];
        } elseif (isset($responseArr['data']['url'])) {
            return $responseArr['data']['url'];
        } else {
            return response()->json(['error' => 'Payment creation failed', 'response' => $responseArr], 500);
        }


    }

}
