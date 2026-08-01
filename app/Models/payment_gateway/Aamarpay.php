<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aamarpay extends Model
{
    use HasFactory;

    public static function payment_status($identifier, $transaction_keys = [])
    {

        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $keys            = json_decode($payment_gateway->keys, true);

        if (is_array($_POST) && $_POST['pay_status'] == "Successful") {
            $transaction_keys = $_POST['mer_txnid'];
            $store_id         = $keys['store_id'];
            $signature_key    = $keys['signature_key'];

            if ($payment_gateway->test_mode == 1) {
                $url = "https://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$transaction_keys&store_id=$store_id&signature_key=$signature_key&type=json"; //sandbox
            } else {
                $url = "https://secure.aamarpay.com/api/v1/trxcheck/request.php?request_id=$transaction_keys&store_id=$store_id&signature_key=$signature_key&type=json"; //live url
            }

            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
            $arr = json_decode($buffer, true);

            if (is_array($arr) && $arr['pay_status'] == "Successful") {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }



    public static function payment_create($identifier)
    {
        $payment_details = session('payment_details');

        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $user            = DB::table('users')->where('id', auth()->user()->id)->first();
        $keys            = json_decode($payment_gateway->keys, true);


        $products_name = '';
        foreach ($payment_details['items'] as $key => $value):
            if ($key == 0) {
                $products_name .= $value['name'];
            } else {
                $products_name .= ', ' . $value['name'];
            }
        endforeach;

        if ($payment_gateway->test_mode == 1):
            $store_id      = $keys['store_id'];
            $signature_key = $keys['signature_key'];
            $payment_url   = 'https://sandbox.aamarpay.com/jsonpost.php';
        else:
            $store_id      = $keys['store_id'];
            $signature_key = $keys['signature_live_key'];
            $payment_url   = 'https://secure.aamarpay.com/jsonpost.php';
        endif;


        $data = [
            'store_id'      => $store_id,
            'tran_id'       => "AAMAR_TXN_" . uniqid(15),
            'success_url'   => $payment_details['success_url'] . '/' . $payment_gateway->identifier,
            'fail_url'      => $payment_details['cancel_url'],
            'cancel_url'    => $payment_details['cancel_url'],
            'amount'        => round($payment_details['payable_amount']),
            'currency'      => 'BDT',
            'signature_key' => $signature_key,
            'desc'          => $identifier,
            'cus_name'      => $user->name,
            'cus_email'     => $user->email,
            'cus_add1'     => $user->address ?? 'Rangpur',
            'cus_add2'     => $user->address ?? 'Rangpur',
            'cus_city'      => $user->address ?? 'Rangpur',
            'cus_state'      => $user->address ?? 'Rangpur',
            'cus_postcode'      => "POST_CODE_" . uniqid(8),
            'cus_country'      => 'Bangladesh',
            'cus_phone'     => $user->phone ?? '01723624344',
            'type'          => 'json',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $payment_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Accept: application/json',
            ],
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $responseObj = json_decode($response);

        if (isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {
            return $responseObj->payment_url;
        }
    }
}
