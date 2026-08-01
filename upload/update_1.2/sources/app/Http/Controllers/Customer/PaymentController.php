<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart_item;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Order_status;
use App\Models\Order_update;
use App\Models\Payment_gateway;
use App\Models\Store;
use App\Models\Shipping_address;
use App\Models\payment_gateway\Paytm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;

class PaymentController extends Controller
{
    function get_amount_of_payment()
    {

        $total_price = 0;
        $total_discounted_amount = 0;
        $total_order_amount = 0;
        $total_amount_of_vat = 0;
        $total_shipping_cost = 0;
        $grand_total = 0;
        $coupon_discount_amount = 0;
        $payable_amount = 0;
        $processedStores = []; // Track stores for one-time shipping

        foreach (Cart_item::with(['product', 'product.discount'])->where('user_id', auth()->user()->id)->get() as $cart_item) {
            //Product price
            $total_price += $cart_item->product->price * $cart_item->quantity;

            if ($cart_item->product->is_discounted) {
                                
                $discount = $cart_item->product->discount;
                if ($discount->discount_type == 'percentage') {
                    $total_discounted_amount += ($cart_item->product->price / 100) * $discount->discount_value * $cart_item->quantity;
                } else {
                    $total_discounted_amount += $discount->discount_value * $cart_item->quantity;
                }
            }

            // Total order amount of product
            $total_order_amount = $total_price - $total_discounted_amount;

            // VAT calculation (store settings)
            $storeSettings = $cart_item->product->store->settings;

            if ($storeSettings && $storeSettings->vat_type === 'percentage') {
                $total_amount_of_vat += ($cart_item->product->price / 100) * $storeSettings->vat_value * $cart_item->quantity;
            } else {
                $total_amount_of_vat += ($storeSettings->vat_value ?? 0) * $cart_item->quantity;
            }


            // Shipping cost - once per store
            $storeId = $cart_item->product->store->id;
            if (!in_array($storeId, $processedStores)) {
                $total_shipping_cost += $storeSettings->shipping_cost ?? 0;
                $processedStores[] = $storeId;
            }
        }

        //Grand total including vat and shipping code but without coupon discount
        $grand_total += ($total_price - $total_discounted_amount) + ($total_amount_of_vat + $total_shipping_cost);

        if (session('coupon_id')) {
            // Coupon validity
            $coupon = Coupon::where('id', session('coupon_id'))
                ->where('usage_limit', '>', 0)
                ->where('minimum_order_amount', '<=', $total_order_amount)
                ->where(function ($query) {
                    $query->where('user_id', auth()->id())->orWhere('user_id', '')->orWhereNull('user_id');
                })
                ->where(function ($query) {
                    $query->where(function ($query) {
                        $query->whereDate('start_date', '<=', date('Y-m-d H:i:s'))->whereDate('end_date', '>=', date('Y-m-d H:i:s'));
                    });
                })
                ->first();

            if ($coupon) {
                if ($coupon->discount_type == 'percentage') {
                    $coupon_discount_amount = ($total_order_amount / 100) * $coupon->discount_value;
                } else {
                    $coupon_discount_amount = $coupon->discount_value;
                }
                $coupon_discount_amount = ($coupon_discount_amount > $coupon->maximum_discount_amount) ? $coupon->maximum_discount_amount : $coupon_discount_amount;

                $payable_amount = $grand_total - $coupon_discount_amount;
            } else {
                $payable_amount = $grand_total;
            }
        } else {
            $payable_amount = $grand_total;
        }


        return array(
            'total_price' => $total_price,
            'total_discounted_amount' => $total_discounted_amount,
            'total_order_amount' => $total_order_amount,
            'total_amount_of_vat' => $total_amount_of_vat,
            'total_shipping_cost' => $total_shipping_cost,
            'grand_total' => $grand_total,
            'coupon_discount_amount' => $coupon_discount_amount,
            'payable_amount' => $payable_amount
        );
    }

    function proceed_to_checkout()
    {
        $amount_of_payment = $this->get_amount_of_payment();
        $cart_items = Cart_item::with(['product'])->where('user_id', auth()->user()->id)->get();

        $items = [];
        foreach ($cart_items as $item) {
            $discount_price = 0;
            $price = 0;

            if ($item->product->is_discounted) {
                $discount = $item->product->discount;
                if ($discount->discount_type == 'percentage') {
                    $discount_price = ($item->product->price / 100) * $discount->discount_value;
                } else {
                    $discount_price = $discount->discount_value;
                }
                $price = $item->product->price;
            } else {
                $price = $item->product->price;
            }

            $items[] = array(
                'id'                  => $item->product->id,
                'name'               => $item->product->title,
                'selling_price'      => currency($price - $discount_price),
            );
        }

        $primary_shipping_address = Shipping_address::where('user_id', auth()->user()->id)->where('is_primary', 1)->firstOrNew();

        $payment_details = [
            'items'          => $items,
            'custom_field'   => [
                'item_type'       => 'order_placed',
                'shipping_address_id' => $primary_shipping_address->id,
            ],
            'coupon_id'         => session('coupon_id') > 0 ? session('coupon_id') : 0,
            'total_price' => round($amount_of_payment['total_price'], 2),
            'total_discounted_amount' => round($amount_of_payment['total_discounted_amount'], 2),
            'total_order_amount' => round($amount_of_payment['total_order_amount'], 2),
            'total_amount_of_vat' => round($amount_of_payment['total_amount_of_vat'], 2),
            'total_shipping_cost' => round($amount_of_payment['total_shipping_cost'], 2),
            'grand_total' => round($amount_of_payment['grand_total'], 2),
            'coupon_discount_amount' => round($amount_of_payment['coupon_discount_amount'], 2),
            'payable_amount' => round($amount_of_payment['payable_amount'], 2),
            'cancel_url'     => route('customer.cart_items'),
            'success_url'    => route('payment.success', ''),

            'success_method' => 'order_placed',
        ]; 

        Session::put(['payment_details' => $payment_details]);

        return redirect(route('payment'));
    }
 
    function payment()
    {
        $page_data['payment_details'] = session('payment_details');
        $page_data['cart_items'] = Cart_item::with(['product'])->where('user_id', auth()->id())->get();

        if (!$page_data['payment_details']) {
            return redirect()->route('customer.cart_items');
        }

        return view('payment.index', $page_data);
    }

    function payment_create($identifier)
    {
        $payment_gateway      = Payment_gateway::where('identifier', $identifier)->first();
        $model_name           = $payment_gateway->model_name;
        $model_full_path      = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);
        $created_payment_link = $model_full_path::payment_create($identifier);
        return redirect()->to($created_payment_link);
    }

    // public function payment_success($identifier, Request $request)
    // {
    //     $payment_details = session('payment_details');
    //     $payment_gateway = Payment_gateway::where('identifier', $identifier)->first();
    //     $model_name      = $payment_gateway->model_name;
    //     $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);


    //     $status = $model_full_path::payment_status($request->all());
        
    //     if ($status === true) {
    //         $success_function = $payment_details['success_method'];
    //         return $this->$success_function($identifier);
    //     } else {
    //         Session::flash('error', get_phrase('Payment failed! Please try again.'));
    //         return redirect()->to($payment_details['cancel_url']);
    //     }
    // }

public function payment_success(Request $request, $identifier = null)
{
    $payment_details = session('payment_details');

    if (!is_array($payment_details)) {
        Session::flash('error', get_phrase('Payment session expired.'));
        return redirect()->back();
    }

    if (empty($identifier)) {
        Session::flash('error', get_phrase('Invalid payment gateway.'));
        return redirect()->back();
    }

    $payment_gateway = Payment_gateway::where('identifier', $identifier)->first();
    if (!$payment_gateway) {
        Session::flash('error', get_phrase('Invalid payment gateway.'));
        return redirect()->back();
    }

    $model_full_path = 'App\Models\payment_gateway\\' . $payment_gateway->model_name;

    $status = $model_full_path::payment_status($request->all());

    if ($status !== true) {
        Session::flash('error', get_phrase('Payment failed! Please try again.'));
        return redirect()->to($payment_details['cancel_url'] ?? url()->previous());
    }

    // Frontend success (string method)
    if (isset($payment_details['success_method']) && is_string($payment_details['success_method'])) {
        return $this->{$payment_details['success_method']}($identifier);
    }

    // Admin payout success (array method)
    if (isset($payment_details['success_method']) && is_array($payment_details['success_method'])) {
        $method      = $payment_details['success_method'];
        $model_class = 'App\Models\\' . $method['model_name'];
        $function    = $method['function_name'];

        if (class_exists($model_class) && method_exists($model_class, $function)) {
            return $model_class::$function($identifier);
        }
    }

    // Default frontend redirect
    if (isset($payment_details['success_url'])) {
        return redirect()->to($payment_details['success_url']);
    }

    Session::flash('success', get_phrase('Payment completed successfully.'));
    return redirect()->back();
}




    public function order_placed($payment_method)
    {
        $cart_items = Cart_item::with(['product', 'product.store.settings', 'product.discount'])
            ->where('user_id', auth()->id())
            ->get();

        $payment_gateway = Payment_gateway::where('identifier', $payment_method)->first();
        $payment_details = session('payment_details');

        // Group cart items by store_id
        $groupedByStore = $cart_items->groupBy(function ($item) {
            return $item->product->store->id;
        });

        foreach ($groupedByStore as $storeId => $items) {
            
            $total_price = 0;
            $total_discounted_amount = 0;
            $total_vat = 0;
            $shipping_cost = 0;

            $storeSettings = $items->first()->product->store->settings;
            $shipping_cost = $storeSettings->shipping_cost ?? 0; // One time per store

            foreach ($items as $cart_item) {
                $productPrice = $cart_item->product->price;
                $quantity = $cart_item->quantity;

                // Price
                $total_price += $productPrice * $quantity;

                // Discount
                if ($cart_item->product->is_discounted) {
                    $discount = $cart_item->product->discount;
                    if ($discount->discount_type === 'percentage') {
                        $total_discounted_amount += ($productPrice / 100) * $discount->discount_value * $quantity;
                    } else {
                        $total_discounted_amount += $discount->discount_value * $quantity;
                    }
                }

                // VAT
                if ($storeSettings && $storeSettings->vat_type === 'percentage') {
                    $total_vat += ($productPrice / 100) * $storeSettings->vat_value * $quantity;
                } else {
                    $total_vat += ($storeSettings->vat_value ?? 0) * $quantity;
                }
            }

            $total_order_amount = $total_price - $total_discounted_amount;
            $grand_total = $total_order_amount + $total_vat + $shipping_cost;

            // ================= REVENUE CALCULATION START =================

            // Commission base (only product price after discount)
            $commissionBase = $total_order_amount;

            // Default values
            $adminRevenue  = 0;
            $vendorRevenue = 0;
            // Store owner
            $storeOwner = $items->first()->product->store->user;

            // If admin (role_id = 1), admin gets 100%
            if ($storeOwner->role_id == 1) {
                $adminRevenue  = $commissionBase;
                $vendorRevenue = 0;
            } else {
                $vendorPercent = get_settings('vendor_revenue'); // e.g. 70
                $vendorRevenue = ($commissionBase * $vendorPercent) / 100;
                $adminRevenue  = $commissionBase - $vendorRevenue;
            }

            // ================= REVENUE CALCULATION END =================
            
            Store::where('id', $storeId)->update([
                'admin_revenue'  => DB::raw('COALESCE(admin_revenue,0) + ' . $adminRevenue),
                'vendor_revenue' => DB::raw('COALESCE(vendor_revenue,0) + ' . $vendorRevenue),
            ]);


            // Create order
            $order_data = [
                'user_id' => auth()->user()->id,
                'store_id' => $storeId, // Keep track of which store
                'coupon_id' => $payment_details['coupon_id'] ?? 0,
                'total_price' => $total_price,
                'total_discounted_amount' => $total_discounted_amount,
                'total_order_amount' => $total_order_amount,
                'total_shipping_cost' => $shipping_cost,
                'total_amount_of_vat' => $total_vat,
                'grand_total' => $grand_total,
                'coupon_discount_amount' => $payment_details['coupon_discount_amount'] ?? 0,
                'payable_amount' => $grand_total,
                'currency_code' => $payment_gateway->currency,
                'billing_address_id' => 4, // hardcoded in your example
                'shipping_address_id' => $payment_details['custom_field']['shipping_address_id'] ?? null,
                'payment_method' => $payment_method,
                'created_at' => now()
            ];

            $order_id = Order::insertGetId($order_data);

            $created_order_ids[] = $order_id; // Collect order IDs

            // Create order update
            $order_update = [
                'order_id' => $order_id,
                'order_status_id' => Order_status::orderBy('sort', 'asc')->first()->id,
                'user_id' => auth()->user()->id,
                'message' => '',
                'created_at' => now()
            ];
            Order_update::insert($order_update);

            foreach ($items as $cart_item) {
                // Calculate discounted amount for this cart item
                $discounted_amount = 0;
                if ($cart_item->product->is_discounted) {
                    $discount = $cart_item->product->discount;
                    if ($discount->discount_type === 'percentage') {
                        $discounted_amount = ($cart_item->product->price / 100) * $discount->discount_value * $cart_item->quantity;
                    } else {
                        $discounted_amount = $discount->discount_value * $cart_item->quantity;
                    }
                }

                $order_item_data = [
                    'order_id' => $order_id,
                    'product_id' => $cart_item->product_id,
                    'item_attributes' => $cart_item->item_attributes,
                    'quantity' => $cart_item->quantity,
                    'price' => $cart_item->product->price,
                    'discounted_amount' => $discounted_amount,
                    'created_at' => now(),
                ];

                Order_item::insert($order_item_data);
            }
        }

        // Payment history save start
        $transaction_keys = '';
        $tnx_details = '';

        if (Session::has('keys')) {
            $transaction_keys = session('keys');
            $transaction_keys = json_encode($transaction_keys);
            $tnx_details = $transaction_keys;
            $remove_session_item[] = 'keys';
        } elseif (Session::has('session_id')) {
            $transaction_keys = session('session_id');
            $tnx_details = $transaction_keys;
            $remove_session_item[] = 'session_id';
        }

        

        $payment = [
            'order_id' => json_encode($created_order_ids), // Save order_ids as JSON array
            'user_id' => auth()->user()->id,
            'total_amount' => $payment_details['grand_total'],

            'admin_revenue'   => $adminRevenue,
            'vendor_revenue'  => $vendorRevenue,
            
            'currency_code' => $payment_gateway->currency,
            'status' => $payment_method == 'offline' ? 'pending' : 'paid',
            'payment_method' => $payment_method,
            'payment_details' => $tnx_details,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert payment history
        DB::table('payments')->insert($payment);
        // Payment history save end


        // Clear user's cart items
        Cart_item::where('user_id', auth()->id())->delete();

        session()->forget('payment_details');

        // Forget transaction keys/session_id if exist
        if (isset($remove_session_item)) {
            foreach ($remove_session_item as $key) {
                session()->forget($key);
            }
        }
        
        return redirect(route('customer.orders'))->with('success', get_phrase('order placed successfully'));

    }


    function order_placed2($payment_method)
    {
        $cart_items = Cart_item::with(['product'])->where('user_id', auth()->id())->get();
        $payment_gateway = Payment_gateway::where('identifier', $payment_method)->first();
        $payment_details = session('payment_details');

        // Order placed
        $order_data['user_id'] = auth()->user()->id;
        $order_data['coupon_id'] = $payment_details['coupon_id'];
        $order_data['total_price'] = $payment_details['total_price'];
        $order_data['total_discounted_amount'] = $payment_details['total_discounted_amount'];
        $order_data['total_order_amount'] = $payment_details['total_order_amount'];
        $order_data['total_shipping_cost'] = $payment_details['total_shipping_cost'];
        $order_data['total_amount_of_vat'] = $payment_details['total_amount_of_vat'];
        $order_data['grand_total'] = $payment_details['grand_total'];
        $order_data['coupon_discount_amount'] = $payment_details['coupon_discount_amount'];
        $order_data['payable_amount'] = $payment_details['payable_amount'];
        $order_data['currency_code'] = $payment_gateway->currency;
        $order_data['billing_address_id'] = 4;
        $order_data['shipping_address_id'] = $payment_details['custom_field']['shipping_address_id'];
        $order_data['payment_method'] = $payment_method;
        $order_data['created_at'] = date('Y-m-d H:i:s');

        
        $order_id = Order::insertGetId($order_data);


        // Order updates
        $order_update['order_id'] = $order_id;
        $order_update['order_status_id'] = Order_status::orderBy('sort', 'asc')->firstOrNew()->id;
        $order_update['user_id'] = auth()->user()->id;
        $order_update['message'] = '';
        $order_update['created_at'] = date('Y-m-d H:i:s');
        Order_update::insert($order_update);

        die();

        // Payment history save start
        if (Session::has('keys')) {
            $transaction_keys          = session('keys');
            $transaction_keys          = json_encode($transaction_keys);
            $tnx_details           = $transaction_keys;
            $remove_session_item[]     = 'keys';
        } elseif (Session::has('session_id')) {
            $transaction_keys      = session('session_id');
            $tnx_details       = $transaction_keys;
            $remove_session_item[] = 'session_id';
        } else {
            $transaction_keys      = '';
            $tnx_details       = '';
        }

        // generate invoice for payment
        $payment['order_id']            = $order_id;
        $payment['user_id']             = auth()->user()->id;
        $payment['total_amount']        = $payment_details['grand_total'];
        $payment['currency_code']    = $payment_gateway->currency;
        $payment['status']           = $payment_method == 'offline'? 'pending' : 'paid';
        $payment['payment_method']   = $payment_method;
        $payment['payment_details']     = $tnx_details;

        // insert payment history
        DB::table('payments')->insert($payment);
        // Payment history save end


        // Order items and remove cart items
        foreach ($cart_items as $cart_item) {
            if ($cart_item->product->is_discounted) {
                $discount = $cart_item->product->discount;
                if ($discount->discount_type == 'percentage') {
                    $discounted_amount = ($cart_item->product->price / 100) * $discount->discount_value;
                } else {
                    $discounted_amount = ($discount->discount_value - $cart_item->product->price);
                }
            } else {
                $discounted_amount = 0;
            }

            $order_item_data['order_id'] = $order_id;
            $order_item_data['product_id'] = $cart_item->product_id;
            $order_item_data['item_attributes'] = $cart_item->item_attributes;
            $order_item_data['quantity'] = $cart_item->quantity;
            $order_item_data['price'] = $cart_item->product->price;
            $order_item_data['discounted_amount'] = $discounted_amount;
            $order_item_data['created_at'] = date('Y-m-d H:i:s');
            Order_item::insert($order_item_data);


            // Remove cart items
            $cart_item->delete();
        }

        session()->forget('payment_details');
        return redirect(route('customer.orders'))->with('success', get_phrase('order placed successfully'));
    }

    function set_shipping_address($shipping_address_id = ""){
        if($shipping_address_id == '' || Shipping_address::where('id', $shipping_address_id)->where('user_id', auth()->user()->id)->count() == 0){
            return json_encode(['error' => get_phrase('Please select your shipping address')]);
        }else{
            $payment_details = session('payment_details');
            $payment_details['custom_field']['shipping_address_id'] = $shipping_address_id;
            Session::put(['payment_details' => $payment_details]);
            return json_encode(['success' => get_phrase('Shipping address updated')]);
        }

    }


    // Paytm
    public function payment_paytm(Request $request)
    {
        $user    = DB::table('users')->where('id', auth()->user()->id)->first();

        $payment_gateway = \App\Models\Payment_gateway::where('identifier', 'paytm')->firstOrNew();
        $keys = json_decode($payment_gateway->keys, true);

        config([
            'services.paytm-wallet.env' => $payment_gateway->test_mode == 1 ? 'local' : 'production',
            'services.paytm-wallet.merchant_id' => $keys['paytm_merchant_mid'],
            'services.paytm-wallet.merchant_key' => $keys['paytm_merchant_key'],
            'services.paytm-wallet.merchant_website' => $keys['paytm_merchant_website'],
            'services.paytm-wallet.channel' => $keys['channel_id'],
            'services.paytm-wallet.industry_type' => $keys['industry_type_id'],
        ]);
        
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order'         => $user->phone . "_" . rand(1, 1000),
            'user'          => auth()->user()->id,
            'mobile_number' => $user->phone,
            'email'         => $user->email,
            'amount'        => $request->amount,
            'callback_url'  => route('payment.status'),
        ]);
        return $payment->receive();
    }

    public function paytm_paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        $response    = $transaction->response();
        $order_id    = $transaction->getOrderId(); // return a order id
        $transaction->getTransactionId(); // return a transaction id

        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            Paytm::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");
        } else if ($transaction->isFailed()) {
            Paytm::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");
        } else if ($transaction->isOpen()) {
            Paytm::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available

    }

    public function payment_razorpay($identifier)
    {
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();

        $model_name      = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);
        $data            = $model_full_path::payment_create($identifier);

        return view('payment.razorpay.payment', compact('data'));
    }
}