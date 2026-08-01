<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class VendorPayment extends Model
{
    use HasFactory;
    public static function vendor_payment($identifier)
    {
        $payment_details = session('payment_details');
        $id = $payment_details['custom_field']['payout_id'];
        $data['status'] = 1;
        $data['payment_type'] = $identifier;
        Payout::where('id', $id)->update($data);
        Session::flash('success_message', 'Vendor payment successfully.');
        return redirect($payment_details['cancel_url']);
    }
    // public static function vendor_payment($identifier)
    // {
    //     $payment_details = session('payment_details');

    //     if (!$payment_details) {
    //         return redirect()->route('admin.vendor.payout');
    //     }

    //     $id = $payment_details['custom_field']['payout_id'];

    //     Payout::where('id', $id)->update([
    //         'status' => 1,
    //         'payment_type' => $identifier,
    //     ]);

    //     Session::flash('success_message', 'Vendor payment successfully.');
    //     return redirect($payment_details['cancel_url']);
    // }

//     public function vendor_payment(Request $request)
// {
//     Payout::where('id', $request->payout_id)->update([
//         'status' => 1,
//         'payment_type' => 'manual', // or admin
//     ]);

//     Session::flash('success_message', 'Vendor payment successfully completed.');
//     return redirect()->route('admin.vendor.payout');
// }

}
