<?php

namespace App\Models\payment_gateway;

use App\Http\Requests;
use App\Models\Payment_gateway;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Stripe extends Model
{
    use HasFactory;

    public static function payment_status($transaction_keys = [])
    {
        $payment_gateway = Payment_gateway::where('identifier', 'stripe')->first();
        $keys            = json_decode($payment_gateway->keys, true);

        if ($payment_gateway->test_mode == 1){
            $stripeSecretKey = $keys['secret_key'];
        }else{
            $stripeSecretKey = $keys['secret_live_key'];
        }

        // Check whether stripe checkout session is not empty
        $session_id = $transaction_keys['session_id'];
        if ($session_id != "") {

            // Set API key
            \Stripe\Stripe::setApiKey($stripeSecretKey);

            // Fetch the Checkout Session to display the JSON result on the success page
            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $checkout_session) {
                // Retrieve the details of a PaymentIntent
                try {
                    $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if ($intent) {
                    // Check whether the charge is successful
                    if ($intent->status == 'succeeded') {
                        Session::put(['session_id' => $transaction_keys['session_id']]);
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }

    public static function refund_status($transaction_keys = [], $return_amount = 0)
    {
        $payment_gateway = Payment_gateway::where('identifier', 'stripe')->first();
        $keys            = json_decode($payment_gateway->keys, true);

        if ($payment_gateway->test_mode == 1){
            $stripeSecretKey = $keys['secret_key'];
        }else{
            $stripeSecretKey = $keys['secret_live_key'];
        }

        // Check whether stripe checkout session is not empty
        $session_id = $transaction_keys;
        if ($session_id != "") {

            // Set API key
            \Stripe\Stripe::setApiKey($stripeSecretKey);

            // Fetch the Checkout Session to display the JSON result on the success page
            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $checkout_session) {
                // Retrieve the details of a PaymentIntent
                try {
                    $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if ($intent) {
                    $chargeId = $intent->latest_charge;
                    $amount_in_cents = intval(round($return_amount * 100));

                    $refund = \Stripe\Refund::create([
                        'charge' => $chargeId,
                        'amount' => $amount_in_cents,  // USD in cents
                    ]);

                    // Check whether the charge is successful
                    if ($refund->status == 'succeeded') {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }

    // public static function payment_create()
    // {
    //     $payment_gateway = Payment_gateway::where('identifier', 'stripe')->first();
    //     $payment_details = session('payment_details');
    //     $keys            = json_decode($payment_gateway->keys, true);


    //     $products_name = '';
    //     foreach ($payment_details['items'] as $key => $value) :
    //         if ($key == 0) {
    //             $products_name .= $value['name'];
    //         } else {
    //             $products_name .= ', ' . $value['name'];
    //         }
    //     endforeach;

    //     if ($payment_gateway->test_mode == 1) :
    //         $stripeSecretKey = $keys['secret_key'];
    //     else :
    //         $stripeSecretKey = $keys['secret_live_key'];
    //     endif;

    //     \Stripe\Stripe::setApiKey($stripeSecretKey);
    //     header('Content-Type: application/json');

    //     $checkout_session = \Stripe\Checkout\Session::create([
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'product_data' => [
    //                         'name' => get_phrase('Purchasing:') . ' ' . $products_name,
    //                     ],
    //                     'unit_amount'  => round($payment_details['payable_amount'] * 100, 2),
    //                     'currency'     => $payment_gateway->currency,
    //                 ],
    //                 'quantity'   => 1,
    //             ],
    //         ],
    //         'mode'       => 'payment', //Checkout has three modes: payment, subscription, or setup. Use payment mode for one-time purchases. Learn more about subscription and setup modes in the docs.
    //         'success_url' => $payment_details['success_url'] . '/stripe?session_id={CHECKOUT_SESSION_ID}',
    //         'cancel_url' => $payment_details['cancel_url'],
    //     ]);

    //     return $checkout_session->url;
    // }

    public static function payment_create()
{
    $payment_gateway = Payment_gateway::where('identifier', 'stripe')->first();
    $payment_details = session('payment_details');

    $isVendorPayout = isset($payment_details['custom_field']['payout_id']);

    $keys = json_decode($payment_gateway->keys, true);

    if ($isVendorPayout) {
        // Vendor payout → vendor Stripe keys
        // -----------------------------
        $payout_id = $payment_details['custom_field']['payout_id'];

        $payout = Payout::findOrFail($payout_id);
        $vendor = User::findOrFail($payout->user_id);
        
        $vendorKeys = json_decode($vendor->paymentkeys, true);

         if (!isset($vendorKeys['stripe'])) {
            session()->flash('error', 'Vendor Stripe account not configured. Please contact support.');
            return redirect()->back(); 
        }
        $keys = $vendorKeys['stripe'];
    }

    // test / live key selection
    // -----------------------------
    if ($payment_gateway->test_mode == 1) {
        $stripeSecretKey = $keys['secret_key'];
    } else {
        $stripeSecretKey = $keys['secret_live_key'];
    }

  
    $products_name = '';
    foreach ($payment_details['items'] as $key => $value) {
        $products_name .= $key == 0 ? $value['name'] : ', ' . $value['name'];
    }

    \Stripe\Stripe::setApiKey($stripeSecretKey);

    $checkout_session = \Stripe\Checkout\Session::create([
        'line_items' => [
            [
                'price_data' => [
                    'product_data' => [
                        'name' => $isVendorPayout
                            ? 'Vendor payout #' . $payment_details['custom_field']['payout_id']
                            : get_phrase('Purchasing:') . ' ' . $products_name,
                    ],
                    'unit_amount' => round($payment_details['payable_amount'] * 100),
                    'currency' => $payment_gateway->currency,
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => $payment_details['success_url']
            . '/stripe?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => $payment_details['cancel_url'],
    ]);

    return $checkout_session->url;
}



}
