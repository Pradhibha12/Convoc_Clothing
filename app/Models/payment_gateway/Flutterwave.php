<?php

namespace App\Models\payment_gateway;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Flutterwave extends Model
{
    use HasFactory;

    // public static function payment_status($transaction_keys = [])
    // {
    //     $payment_gateway = DB::table('payment_gateways')->where('identifier', 'flutterwave')->first();
    //     $keys            = json_decode($payment_gateway->keys, true);

    //     if ($payment_gateway->test_mode == 1){
    //         $secret_key = $keys['secret_key'];
    //     }else{
    //         $secret_key = $keys['secret_live_key'];
    //     }

    //     $transaction_id = $transaction_keys['transaction_id'];

    //     $curl = curl_init();

    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$transaction_id}/verify",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_HTTPHEADER => [
    //             "Authorization: Bearer {$secret_key}",
    //         ],
    //     ]);

    //     $result = curl_exec($curl);
    //     curl_close($curl);

    //     $data = json_decode($result, true);

    //     if ($data && isset($data['status']) && $data['status'] === 'success') {
    //         $payment_status = $data['data']['status']; // e.g., "successful"

    //         if ($payment_status === 'successful') {
    //             Session::put(['session_id' => $transaction_keys['transaction_id']]);
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }

   public static function payment_status($transaction_keys = [])
{
    //  Get payment details from session
    $payment_details = session('payment_details');

    $payout_id = $payment_details['custom_field']['payout_id'] ?? null;
    $isVendorPayout = !empty($payout_id);

    $payment_gateway = DB::table('payment_gateways')
        ->where('identifier', 'flutterwave')
        ->first();

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
        $fwKey = $vendorKeys['flutterwave'] ?? null;

        if (!$fwKey || empty($fwKey['secret_key']) || str_contains($fwKey['secret_key'], 'xxxx')) {
            session()->flash('error', 'Vendor Flutterwave API key invalid or not configured.');
            return false;
        }

        $keys = $fwKey; 
        
    }

    if ($payment_gateway->test_mode == 1) {
        $secret_key = $keys['secret_key'] ?? null;
    } else {
        $secret_key = $keys['secret_live_key'] ?? null;
    }


    $transaction_id = $transaction_keys['transaction_id'] ?? null;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$transaction_id}/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer {$secret_key}",
        ],
    ]);

    $result = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($result, true);

    // Check payment status
    // -----------------------------
    if ($data && isset($data['status']) && $data['status'] === 'success') {
        $payment_status = $data['data']['status'] ?? '';

        if ($payment_status === 'successful') {
            Session::put(['session_id' => $transaction_id]);
            return true;
        } else {
            return false;
        }
    }

    return false;
}


}
