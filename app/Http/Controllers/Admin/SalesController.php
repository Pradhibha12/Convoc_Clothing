<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\Order_item;
use App\Models\Order_status;
use App\Models\Order_update;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SalesController extends Controller
{

    public function index()
    {
        $page_data['categories'] = Category::where('parent_id', 0)->get();
        $page_data['page_title'] = get_phrase('Pos ');
        return view('admin.pos.index', $page_data)->render();
    }

    public function product_view($id)
    {
        $selected_category = Category::where('id', $id)->first();

        $query = Product::where('status', 1);

        // Category
        if ($selected_category) {
            // filtered by category
            $child_category_ids = get_all_child_category_ids($selected_category->id);
            if (count($child_category_ids) > 0) {
                $query->where(function ($query) use ($child_category_ids) {
                    $query->whereIn('category_id', $child_category_ids);
                });
            }
        }

        $products = $query->get();

        if ($products->isEmpty()) {
            return view('admin.pos.no_data', ['category_id' => $id]);
        }

        

        $page_data = [
            'category_id' => $selected_category->id,
            'products' => $products,
        ];


        return view('admin.pos.product_view', $page_data);
    }

    public function category_view(Request $request)
    {
        $page_data['categories'] = Category::where('parent_id', 0)->get();

        if (request()->ajax()) {
            return view('admin.pos.category_index', $page_data);
        }

        return view('admin.pos.index', $page_data);
    }

    public function category_filter(Request $request)
    {
        $category_id = $request->query('category_id');

        // If "all" is selected → return the tiles page
        if ($category_id === 'all') {
            $page_data['categories'] = Category::where('parent_id', 0)->get();


            if ($request->ajax()) {
                return view('admin.pos.category_index', $page_data)->render();
            }

            // Full page load
            return view('admin.pos.index', $page_data)->render();
        }

        // Otherwise → filter products
        $productsQuery = Product::where('status', 1);
        if (!empty($category_id)) {
            // filtered by category
            $child_category_ids = get_all_child_category_ids($category_id);
            if (count($child_category_ids) > 0) {
                $productsQuery->where(function ($productsQuery) use ($child_category_ids) {
                    $productsQuery->whereIn('category_id', $child_category_ids);
                });
            }
        }

        $products = $productsQuery->get();


        if ($products->isEmpty()) {
            return view('admin.pos.no_data', ['category_id' => $category_id]);
        }

        // sold quantities
        
        if ($request->ajax()) {
            return view('admin.pos.product_view', [
                'products' => $products,
                // 'soldQuantities' => $soldQuantities,
                'category_id' => $category_id,
            ])->render();
        }



        $page_data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.pos.category_index', $page_data);
    }

    public function category_search(Request $request)
    {

        $search = $request->search;
        $categoryId = $request->category_id;

        $query = Category::where('parent_id', 0);

        if ($categoryId && $categoryId != 'all') {
            $query->where('id', $categoryId);
        }

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $categories = $query->get();

        if (request()->ajax()) {
            return view('admin.pos.category_index', compact('categories'))->render();
        }

        return view('admin.pos.index', compact('categories'));
    }

    public function barcode_search(Request $request)
    {
        $barcode = $request->get('barcode');

        if (!$barcode) {
            return response()->json(['error' => 'No barcode provided'], 400);
        }

        $product = Product::where('code', $barcode)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $storeSettings = $product->store->settings;
        $vat = 0;

        if ($storeSettings && $storeSettings->vat_type === 'percentage') {
            $vat = ($product->price / 100) * $storeSettings->vat_value;
        } else {
            $vat = $storeSettings->vat_value ?? 0;
        }

        return response()->json([
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'vat' => $vat,
            'tile_id' => $product->tile_id,
        ]);
    }

    public function order_store(Request $request)
    {
        
        try {
            $customer_id   = $request->checkout_customer_id;
            $discount      = $request->checkout_items_discount ?? 0;
            $grand_total   = $request->items_total_payble_amount ?? 0;

            // Explode products and quantities
            $items_id   = explode(',', $request->checkout_items_id[0] ?? '');
            $items_qty  = explode(',', $request->checkout_items_count[0] ?? '');

            // Load products with relations
            $products = Product::with(['store.settings', 'discount'])
                ->whereIn('id', $items_id)
                ->get();

            // Map quantities with product IDs
            $quantities = array_combine($items_id, $items_qty);

            $created_order_ids = [];

            // Group products by store
            $groupedByStore = $products->groupBy('store.id');

            foreach ($groupedByStore as $storeId => $items) {
                $total_price = 0;
                $total_discounted_amount = 0;
                $total_vat = 0;
                $shipping_cost = 0;

                $storeSettings = $items->first()->store->settings;

                foreach ($items as $product) {
                    $quantity = $quantities[$product->id] ?? 1;
                    $productPrice = $product->price;

                    // Price
                    $total_price += $productPrice * $quantity;

                    // Discount
                    if ($product->is_discounted && $product->discount) {
                        $discount = $product->discount;
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

                // Create order
                $order_data = [
                    'user_id'                 => auth()->id(),
                    'user_id'                 => $customer_id === 'walking_customer' ? null : $customer_id,
                    'coupon_id'               => 0,
                    'total_price'             => $total_price,
                    'total_discounted_amount' => $total_discounted_amount,
                    'total_order_amount'      => $total_order_amount,
                    'total_shipping_cost'     => $shipping_cost,
                    'total_amount_of_vat'     => $total_vat,
                    'grand_total'             => $grand_total,
                    'coupon_discount_amount'  => 0,
                    'payable_amount'          => $grand_total,
                    'currency_code'           => currency(), // or dynamic
                    'billing_address_id'      => null,
                    'shipping_address_id'     => null,
                    'payment_method'          => 'pos',
                    'created_at'              => now(),
                ];

                $order_id = Order::insertGetId($order_data);
                $created_order_ids[] = $order_id;

                // Order status
                $order_update = [
                    'order_id'        => $order_id,
                    'order_status_id' => Order_status::orderBy('sort', 'asc')->first()->id,
                    'user_id'         => auth()->id(),
                    'message'         => 'POS order created',
                    'created_at'      => now(),
                ];
                Order_update::insert($order_update);

                // Save order items
                foreach ($items as $product) {
                    $quantity = $quantities[$product->id] ?? 1;
                    $discounted_amount = 0;

                    if ($product->is_discounted && $product->discount) {
                        $discount = $product->discount;
                        if ($discount->discount_type === 'percentage') {
                            $discounted_amount = ($product->price / 100) * $discount->discount_value * $quantity;
                        } else {
                            $discounted_amount = $discount->discount_value * $quantity;
                        }
                    }

                    $order_item = [
                        'order_id'        => $order_id,
                        'product_id'      => $product->id,
                        'item_attributes' => null,
                        'quantity'        => $quantity,
                        'price'           => $product->price,
                        'discounted_amount' => $discounted_amount,
                        'created_at'      => now(),
                    ];
                    Order_item::insert($order_item);
                }
            }

            // Payment (per store order)
            $payment = [
                'order_id'       => json_encode($created_order_ids), // Save order_ids as JSON array
                'user_id'        => $customer_id === 'walking_customer' ? null : $customer_id,
                'total_amount'   => $grand_total,
                'currency_code'  => currency(),
                'status'         => 'paid',
                'payment_method' => 'pos',
                'payment_details'=> 'POS Payment',
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
            DB::table('payments')->insert($payment);

            // Response with last order
             $order_details = [
                'customer_id' => $customer_id,
                'total_items' => $request->checkout_total_items,
                'items_tax' => preg_replace('/[^0-9.]/', '', $request->checkout_items_tax) ?? '',
                'items_discount' => preg_replace('/[^0-9.]/', '', $request->checkout_items_discount) ?? '',
                'items_total_amount' => preg_replace('/[^0-9.]/', '', $request->checkout_modal_total_amount),
                'items_total_payble_amount' => $request->filled('items_total_payble_amount')
                    ? preg_replace('/[^0-9.]/', '', $request->items_total_payble_amount)
                    : preg_replace('/[^0-9.]/', '', $request->items_total_payble_round_amount),

                'items_details' => json_encode($quantities),
                'old_price' => $request->checkout_modal_main_total_amount,
            ];

            return response()->json([
                'success'       => 'Order created successfully',
                'order_details' => $order_details,
                'order_ids'     => $created_order_ids,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function order_store2(Request $request)
    {
        try {
            // Extract values from request
            $customer_id   = $request->checkout_customer_id;
            $category_id   = $request->checkout_category_id;
            $total_items   = $request->checkout_total_items;
            $tax           = $request->checkout_items_tax ?? 0;
            $discount      = $request->checkout_items_discount ?? 0;
            $grand_total   = $request->items_total_payble_amount ?? 0;
            $round_total   = $request->items_total_payble_round_amount ?? 0;

            // Convert product IDs and quantities
            $items_id   = explode(',', $request->checkout_items_id[0] ?? '');
            $items_qty  = explode(',', $request->checkout_items_count[0] ?? '');

            $items = Product::whereIn('id', $items_id)->get();

            $total_price = 0;
            $total_discounted_amount = 0;
            $total_vat = 0;

            foreach ($items as $key => $item) {
                $productPrice = $item->price;
                $quantity = $items_qty[$key];

                // Price
                $total_price += $productPrice * $quantity;

                $storeSettings = $item->store->settings;

                // Discount
                if ($item->is_discounted) {
                    $discount = $item->discount;
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

                $order_data = [
                    'user_id' => $customer_id === 'walking_customer' ? null : $customer_id,
                    'store_id' => $item->store->id, // Keep track of which store
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

                // Save order status update
                $order_update = [
                    'order_id'        => $order_id,
                    'order_status_id' => Order_status::orderBy('sort', 'asc')->first()->id,
                    'user_id'         => auth()->id(),
                    'message'         => 'POS order created',
                    'created_at'      => now()
                ];
                Order_update::insert($order_update);

                // Save order items
                foreach ($items_id as $index => $productId) {
                    $quantity = $items_qty[$index] ?? 1;
                    $product  = Product::find($productId);

                    if ($product) {
                        $discounted_amount = 0;
                        if ($product->is_discounted && $product->discount) {
                            $discount = $product->discount;
                            if ($discount->discount_type === 'percentage') {
                                $discounted_amount = ($product->price / 100) * $discount->discount_value * $quantity;
                            } else {
                                $discounted_amount = $discount->discount_value * $quantity;
                            }
                        }

                        $order_item = [
                            'order_id'        => $order_id,
                            'product_id'      => $product->id,
                            'item_attributes' => null, // POS doesn’t pass variation? Adjust if needed
                            'quantity'        => $quantity,
                            'price'           => $product->price,
                            'discounted_amount'=> $discounted_amount,
                            'created_at'      => now(),
                        ];
                        Order_item::insert($order_item);
                    }
                }
            }

            $total_order_amount = $total_price - $total_discounted_amount;
            $grand_total = $total_order_amount + $total_vat + $shipping_cost;

            // Create order
            $order_data = [
                'user_id'               => $customer_id === 'walking_customer' ? null : $customer_id,
                // 'category_id'           => $category_id,
                'total_items'           => $total_items,
                'total_discounted_amount' => $discount,
                'total_amount_of_vat'   => $tax,
                'coupon_discount_amount'=> 0,
                'total_price'           => $grand_total,
                'total_order_amount'    => $grand_total,
                'grand_total'           => $round_total,
                'payable_amount'        => $round_total,
                'currency_code'         => currency(), // change if dynamic
                'payment_method'        => 'pos',
                'created_at'            => now(),
                'updated_at'            => now()
            ];

            // Save payment
            $payment = [
                'order_id'       => $order_id,
                'user_id'        => auth()->id(),
                'total_amount'   => $round_total,
                'currency_code'  => 'USD',
                'status'         => 'paid',
                'payment_method' => 'pos',
                'payment_details'=> 'POS Payment',
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
            DB::table('payments')->insert($payment);

            // Prepare response
            $order_details = Order::with(['items', 'updates'])->find($order_id);

            return response()->json([
                'success'       => 'Order created successfully',
                'order_details' => $order_details,
                'order_id'      => $order_id,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
