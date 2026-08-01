<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;
use App\Models\Attribute_type;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\Blog_category;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Order;
use App\Models\Order_status;
use App\Models\Order_update;
use App\Models\Order_return;
use App\Models\Language;
use App\Models\Language_phrase;
use App\Models\Message_thread;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Frontend_setting;
use App\Models\State;
use App\Models\Store;
use App\Models\User;
use App\Models\Product_attribute;
use App\Models\Product_discount;
use App\Models\Payment_gateway;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Mail;
use App\Mail\FirstEmail;
use App\Mail\FollowUpEmail;
use App\Mail\ThirdEmail;
use App\Mail\FourthEmail;
use App\Mail\FifthEmail;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Seo_field;
use App\Models\Shipping_carrier;
use App\Models\Shipping_rule;
use App\Models\Shipping_zone;
use App\Models\Shipping_zone_region;
use App\Models\Theme;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class VendorController extends Controller
{



    // function dashboard()
    // {
    //     $userId = auth()->user()->id;

    //     // Vendor’s store
    //     $store = Store::where('user_id', $userId)->first();

    //     // Total products
    //     $page_data['totalProduct'] = Product::where('status', 1)
    //         ->where('user_id', $userId)
    //         ->count();

    //     $page_data['stores'] = $store;

    //     // ===== Monthly Earnings Chart =====
    //     if ($store) {
    //         $storeOrderIds = Order::where('store_id', $store->id)->pluck('id')->toArray();
    //         $payments = Payment::whereYear('created_at', Carbon::now()->year)->get();

    //         $filteredPayments = $payments->filter(function ($payment) use ($storeOrderIds) {
    //             $orderIds = json_decode($payment->order_id, true);
    //             if (!is_array($orderIds)) $orderIds = [$payment->order_id];
    //             return count(array_intersect($storeOrderIds, $orderIds)) > 0;
    //         });

    //         $monthlyEarnings = $filteredPayments
    //             ->groupBy(function ($payment) {
    //                 return Carbon::parse($payment->created_at)->format('n'); // 1–12
    //             })
    //             ->map(function ($group) {
    //                 return $group->sum('total_amount');
    //             })
    //             ->toArray();

    //         $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    //         $monthlyTotals = [];
    //         for ($i = 1; $i <= 12; $i++) {
    //             $monthlyTotals[] = $monthlyEarnings[$i] ?? 0;
    //         }

    //         $page_data['months'] = $months;
    //         $page_data['monthlyTotals'] = $monthlyTotals;
    //         $page_data['balance'] = array_sum($monthlyTotals);
    //     } else {
    //         $page_data['months'] = [];
    //         $page_data['monthlyTotals'] = [];
    //         $page_data['balance'] = 0;
    //     }

    //     $vendorProductIds = Product::where('user_id', $userId)->pluck('id');

    //     $topProducts = DB::table('order_items')
    //         ->whereIn('product_id', $vendorProductIds)
    //         ->select(
    //             'product_id',
    //             DB::raw('SUM(quantity) as total_quantity'),
    //             DB::raw('SUM(COALESCE(CAST(REPLACE(price, ",", "") AS DECIMAL(10,2)), 0) * quantity) as total_sales')
    //         )
    //         ->groupBy('product_id')
    //         ->orderByDesc('total_sales')
    //         ->get();

    //     // $products = Product::whereIn('id', $topProducts->pluck('product_id'))->get()->keyBy('id');
    //     $products = Product::whereIn('id', $topProducts->pluck('product_id'))
    //         ->with('discount') // relation include kora
    //         ->get()
    //         ->keyBy('id');

    //     // $topProducts = $topProducts->map(function ($item) use ($products) {
    //     //     $p = $products[$item->product_id] ?? null;
    //     //     return (object)[
    //     //         'id' => $item->product_id,
    //     //         'title' => $p->title ?? 'Unknown Product',
    //     //         'code' => $p->code ?? 'N/A',
    //     //         'price' => $p->price ?? 0,
    //     //         'total_quantity' => $item->total_quantity,
    //     //         'total_sales' => (float) $item->total_sales,
    //     //     ];
    //     // });
    //     $topProducts = $topProducts->map(function ($item) use ($products) {
    //         $p = $products[$item->product_id] ?? null;

    //         $discount_type = $p && $p->discount ? $p->discount->discount_type : null;
    //         $discount_value = $p && $p->discount ? $p->discount->discount_value : 0;

    //         return (object)[
    //             'id' => $item->product_id,
    //             'title' => $p->title ?? 'Unknown Product',
    //             'code' => $p->code ?? 'N/A',
    //             'price' => $p->price ?? 0,
    //             'discount_type' => $discount_type,
    //             'discount_value' => $discount_value,
    //             'total_quantity' => $item->total_quantity,
    //             'total_sales' => (float) $item->total_sales,
    //         ];
    //     });

    //     // ===== Manual Pagination =====
    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $currentItems = $topProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();
    //     $paginatedProducts = new LengthAwarePaginator(
    //         $currentItems,
    //         $topProducts->count(),
    //         $perPage,
    //         $currentPage,
    //         ['path' => request()->url(), 'query' => request()->query()]
    //     );

    //     $page_data['topProducts'] = $paginatedProducts;
    //     $page_data['page_title'] = get_phrase('Dashboard');

    //     return view('store.dashboard.index', $page_data);
    // }
    function dashboard()
    {
        $userId = auth()->user()->id;

        // Vendor’s store
        $store = Store::where('user_id', $userId)->first();

        // Total products
        $page_data['totalProduct'] = Product::where('status', 1)
            ->where('user_id', $userId)
            ->count();

        $page_data['stores'] = $store;

        // ===== Monthly Earnings Chart =====
        if ($store) {
            $storeOrderIds = Order::where('store_id', $store->id)->pluck('id')->toArray();
            $payments = Payment::whereYear('created_at', Carbon::now()->year)->get();

            $filteredPayments = $payments->filter(function ($payment) use ($storeOrderIds) {
                $orderIds = json_decode($payment->order_id, true);
                if (!is_array($orderIds)) $orderIds = [$payment->order_id];
                return count(array_intersect($storeOrderIds, $orderIds)) > 0;
            });

            $monthlyEarnings = $filteredPayments
                ->groupBy(function ($payment) {
                    return Carbon::parse($payment->created_at)->format('n'); // 1–12
                })
                ->map(function ($group) {
                    return $group->sum('total_amount');
                })
                ->toArray();

            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $monthlyTotals = [];
            for ($i = 1; $i <= 12; $i++) {
                $monthlyTotals[] = $monthlyEarnings[$i] ?? 0;
            }

            $page_data['months'] = $months;
            $page_data['monthlyTotals'] = $monthlyTotals;
            $page_data['balance'] = array_sum($monthlyTotals);
        } else {
            $page_data['months'] = [];
            $page_data['monthlyTotals'] = [];
            $page_data['balance'] = 0;
        }

        // ===== Top Products =====
        $vendorProductIds = Product::where('user_id', $userId)->pluck('id');

        $topProducts = DB::table('order_items')
            ->whereIn('product_id', $vendorProductIds)
            ->select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity')
            )
            ->groupBy('product_id')
            ->get();

        $products = Product::whereIn('id', $topProducts->pluck('product_id'))
            ->with('discount') // eager load discount relation
            ->get()
            ->keyBy('id');

        // Map topProducts with discount and calculate total_sales
        $topProducts = $topProducts->map(function ($item) use ($products) {
            $p = $products[$item->product_id] ?? null;

            $discount_type = $p && $p->discount ? $p->discount->discount_type : null;
            $discount_value = $p && $p->discount ? $p->discount->discount_value : 0;

            // Calculate discounted price
            if ($discount_type == 'flat') {
                $discounted_price = ($p->price ?? 0) - $discount_value;
            } elseif ($discount_type == 'percentage') {
                $discounted_price = ($p->price ?? 0) - (($p->price ?? 0) * $discount_value / 100);
            } else {
                $discounted_price = $p->price ?? 0;
            }

            // Total sales = discounted price * quantity
            $total_sales = $discounted_price * $item->total_quantity;

            return (object)[
                'id' => $item->product_id,
                'title' => $p->title ?? 'Unknown Product',
                'code' => $p->code ?? 'N/A',
                'price' => $p->price ?? 0,
                'discount_type' => $discount_type,
                'discount_value' => $discount_value,
                'total_quantity' => $item->total_quantity,
                'total_sales' => round($total_sales, 2),
            ];
        });

        // ===== Manual Pagination =====
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $currentItems = $topProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedProducts = new LengthAwarePaginator(
            $currentItems,
            $topProducts->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $page_data['topProducts'] = $paginatedProducts;
        $page_data['page_title'] = get_phrase('Dashboard');

        return view('store.dashboard.index', $page_data);
    }


    //Product
    function products()
    {
        $store = get_store_by_owner_id(auth()->user()->id);

        $query = Product::where('store_id', $store->id);

        // Search filter
        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        // Status filter
        if (request()->has('status') && request()->query('status') != 'all') {
            $status = request()->query('status') === 'active' ? 1 : 0;
            $query->where('status', $status);
        }

        // Category filter (by slug)
        if (request()->has('category') && request()->query('category') != 'all') {
            $slug = request()->query('category');
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                // No matching category → force empty result
                $query->whereRaw('1 = 0');
            }
        }

        // Brand filter (using name)
        if (request()->has('brand') && request()->query('brand') != 'all') {
            $brandName = request()->query('brand');
            $brand = Brand::where('name', $brandName)->first();

            if ($brand) {
                $query->where('brand_id', $brand->id);
            } else {
                $query->whereRaw('1 = 0');
            }
        }


        $page_data['products'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Product List ');
        return view('store.product.products', $page_data);
    }

    function product_add()
    {
        $page_data['product_categories'] = Category::get();
        $page_data['brands'] = Brand::get();
        $page_data['page_title'] = get_phrase('Product Add ');
        return view('store.product.product_add', $page_data);
    }

    function product_store(Request $request, $action_type = '')
    {
        $store = get_store_by_owner_id(auth()->user()->id);

        if ($action_type == 'quick') {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'status' => 'nullable|in:1,0',
                'title' => 'required|max:255',
                'price' => 'required|numeric',
            ]);
            $data['user_id'] = auth()->user()->id;
            $data['title'] = $request->title;
            $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products');
            $data['code'] = app(CommonController::class)->unique_code('products', 'code');
            $data['store_id'] = $store->id;
            $data['category_id'] = $request->category_id;
            $data['status'] = $request->status;
            $data['summary'] = $request->summary;
            $data['description'] = $request->description;
            $data['price'] = $request->price;
            $data['total_stock'] = 0;
            $data['created_at'] = date('Y-m-d H:i:s');
        } else {
            $request->validate([
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:categories,id',
                'status' => 'nullable|in:1,0',
                'title' => 'required|max:255',
                'label' => 'required|in:top-seller,best-seller,featured,trendy,new-arrival,hot,exclusive,limited-edition,bestselling,customer-favorite',
                'quality_label' => 'required|in:certified,premium,authentic,handmade,organic,sustainable',
                'price' => 'required|numeric',
                'discount_type' => 'required|in:percentage,flat',
                'discount_value' => 'required|numeric',
            ]);


            $data['user_id'] = auth()->user()->id;
            $data['title'] = $request->title;
            $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products');
            $data['code'] = app(CommonController::class)->unique_code('products', 'code');
            $data['store_id'] = $store->id;
            $data['brand_id'] = $request->brand_id;
            $data['category_id'] = $request->category_id;
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['quality_label'] = $request->quality_label;
            $data['summary'] = $request->summary;
            $data['description'] = $request->description;
            $data['unit'] = $request->unit;
            $data['total_stock'] = $request->total_stock;
            $data['price'] = $request->price;
            $data['created_at'] = date('Y-m-d H:i:s');


            $product_image = [];

            if ($request->hasFile('thumbnail')) {
                foreach ($request->file('thumbnail') as $key => $image) {

                    $image = app(CommonController::class)->upload($image, 'uploads/product/thumbnail/' . nice_file_name($key . '-' . time(), $image->extension()), 800);

                    array_push($product_image, $image);
                }
                $data['thumbnail'] = json_encode($product_image);
            } else {
                $data['thumbnail'] = json_encode([]);
            }

            if ($request->banner) {
                $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/product/banner/' . nice_file_name($request->title, $request->banner->extension()), 800);
            }
        }

        $product_id = Product::insertGetId($data);

        if ($product_id > 0 && $action_type != 'quick') {
            //Product attributes
            if ($request->product_attributes) {
                foreach ($request->product_attributes as $attribute_type_id => $attributes) {
                    foreach ($attributes as $attribute_id => $product_quantity) {
                        if ($product_quantity > 0) {
                            $product_attribute['product_id'] = $product_id;
                            $product_attribute['attribute_type_id'] = $attribute_type_id;
                            $product_attribute['attribute_id'] = $attribute_id;
                            $product_attribute['quantity'] = $product_quantity;
                            $product_attribute['created_at'] = date('Y-m-d H:i:s');
                            Product_attribute::insert($product_attribute);
                        }
                    }
                }
            }

            //Product discounts
            if ($request->discount_period) {
                $product_discount['product_id'] = $product_id;
                $product_discount['discount_type'] = $request->discount_type;
                $product_discount['discount_value'] = $request->discount_value;
                $product_discount['status'] = $request->discount_status;
                $discount_period = explode(' - ', $request->discount_period);
                $product_discount['start_date'] = date('Y-m-d H:i:s', strtotime($discount_period[0]));
                $product_discount['end_date'] = date('Y-m-d H:i:s', strtotime($discount_period[1]));
                $product_discount['created_at'] = date('Y-m-d H:i:s');
                Product_discount::insert($product_discount);
            }
        }

        return redirect(route('vendor.products'))->with('success', get_phrase('Product added successfully'));
    }

    function product_edit($id)
    {
        $page_data['product_categories'] = Category::get();
        $page_data['product'] = Product::where('id', $id)->first();
        $page_data['brands'] = Brand::get();
        $page_data['page_title'] = get_phrase('Manage Product  ');
        return view('store.product.product_edit', $page_data);
    }

    function product_update(Request $request, $id)
    {
        $current_data = Product::where('id', $id)->first();

        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|in:1,0',
            'title' => 'required|max:255',
            'label' => 'required|in:top-seller,best-seller,featured,trendy,new-arrival,hot,exclusive,limited-edition,bestselling,customer-favorite',
            'quality_label' => 'required|in:certified,premium,authentic,handmade,organic,sustainable',
            'price' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);


        $data['user_id'] = auth()->user()->id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products', 'slug', $id);
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->status;
        $data['label'] = $request->label;
        $data['quality_label'] = $request->quality_label;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['unit'] = $request->unit;
        $data['total_stock'] = $request->total_stock;
        $data['price'] = $request->price;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $product_image = json_decode(Product::where('id', $id)->pluck('thumbnail')->toArray()[0]) ?? [];

        if ($request->hasFile('thumbnail')) {
            foreach ($request->file('thumbnail') as $key => $image) {

                $image = app(CommonController::class)->upload($image, 'uploads/product/thumbnail/' . nice_file_name($key . '-' . time(), $image->extension()), 800);

                array_push($product_image, $image);
            }
            $data['thumbnail'] = json_encode($product_image);
        } else {
            $data['thumbnail'] = $product_image;
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/product/banner/' . nice_file_name($request->title, $request->banner->extension()), 800);
            remove_file($current_data->banner);
        }

        Product::where('id', $id)->update($data);


        //Product attributes
        if ($request->product_attributes) {
            foreach ($request->product_attributes as $attribute_type_id => $attributes) {
                foreach ($attributes as $attribute_id => $product_quantity) {
                    if ($product_quantity > 0) {
                        $product_attribute['product_id'] = $id;
                        $product_attribute['attribute_type_id'] = $attribute_type_id;
                        $product_attribute['attribute_id'] = $attribute_id;
                        $product_attribute['quantity'] = $product_quantity;

                        if (Product_attribute::where('product_id', $id)->where('attribute_id', $attribute_id)->count() > 0) {
                            $product_attribute['updated_at'] = date('Y-m-d H:i:s');
                            Product_attribute::where('product_id', $id)->where('attribute_id', $attribute_id)->update($product_attribute);
                        } else {
                            $product_attribute['created_at'] = date('Y-m-d H:i:s');
                            Product_attribute::insert($product_attribute);
                        }
                    }
                }
            }
        }

        //Product discounts
        if ($request->discount_period) {
            $product_discount['product_id'] = $id;
            $product_discount['discount_type'] = $request->discount_type;
            $product_discount['discount_value'] = $request->discount_value;
            $product_discount['status'] = $request->discount_status;
            $discount_period = explode(' - ', $request->discount_period);
            $product_discount['start_date'] = date('Y-m-d H:i:s', strtotime($discount_period[0]));
            $product_discount['end_date'] = date('Y-m-d H:i:s', strtotime($discount_period[1]));
            if (Product_discount::where('product_id', $id)->count() > 0) {
                Product_discount::where('product_id', $id)->update($product_discount);
                $product_discount['updated_at'] = date('Y-m-d H:i:s');
            } else {
                $product_discount['created_at'] = date('Y-m-d H:i:s');
                Product_discount::insert($product_discount);
            }
        }


        return redirect(route('vendor.products'))->with('success', get_phrase('Product updated successfully'));
    }

    function product_delete($id)
    {
        $current_data = Product::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Product::where('id', $id)->delete();
        Product_discount::where('product_id', $id)->delete();
        Product_attribute::where('product_id', $id)->delete();
        return redirect(route('vendor.products'))->with('success', get_phrase('Product deleted successfully'));
    }

    function product_image_delete($id, $image)
    {
        $product = Product::where('id', $id);

        $imageToRemove = 'uploads/product/thumbnail/' . $image;
        $imageArray = json_decode($product->first()->thumbnail);
        $key = array_search($imageToRemove, $imageArray);
        if ($key !== false) {
            unset($imageArray[$key]);
        }
        $imageArray = array_values($imageArray);
        $resultJson = json_encode($imageArray);
        $product->update(['thumbnail' => $resultJson]);
        if (file_exists('public/uploads/product/thumbnail/' . $image)) {
            unlink('public/uploads/product/thumbnail/' . $image);
        }
        return 1;
    }


    //Coupon
    function coupons()
    {
        $page_data['coupons'] = Coupon::paginate(12)->appends(request()->query());
        return view('store.coupon.coupons', $page_data);
    }

    function coupon_add()
    {
        $page_data['customers'] = User::customers()->get();
        return view('store.coupon.coupon_add', $page_data);
    }

    function coupon_store(Request $request)
    {

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'code' => 'required|max:15|unique:coupons,code',
            'title' => 'required|max:255',
            'discount_type' => 'required|in:flat,percentage',
            'discount_value' => 'required|numeric',
            'minimum_order_amount' => 'nullable|numeric',
            'maximum_discount_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|numeric',
            'coupon_period' => 'required',
        ]);

        if ($request->coupon_period) {
            $coupon_period = explode(' - ', $request->coupon_period);
            $start_date = date('Y-m-d H:i:s', strtotime($coupon_period[0]));
            $end_date = date('Y-m-d H:i:s', strtotime($coupon_period[1]));
        } else {
            $start_date = null;
            $end_date = null;
        }

        $data['user_id'] = $request->user_id;
        $data['code'] = $request->code;
        $data['title'] = $request->title;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['minimum_order_amount'] = $request->minimum_order_amount;
        $data['maximum_discount_amount'] = $request->maximum_discount_amount;
        $data['usage_limit'] = $request->usage_limit;
        $data['description'] = $request->description;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/coupon/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        Coupon::insert($data);
        return redirect(route('vendor.coupons'))->with('success', get_phrase('Coupon added successfully'));
    }

    function coupon_edit($id)
    {
        $page_data['customers'] = User::customers()->get();
        $page_data['coupon'] = Coupon::where('id', $id)->first();
        return view('store.coupon.coupon_edit', $page_data);
    }

    function coupon_update(Request $request, $id)
    {
        $current_data = Coupon::where('id', $id)->first();

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'code' => "required|max:15|unique:coupons,code,$id",
            'title' => 'required|max:255',
            'discount_type' => 'required|in:flat,percentage',
            'discount_value' => 'required|numeric',
            'minimum_order_amount' => 'nullable|numeric',
            'maximum_discount_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|numeric',
            'coupon_period' => 'required',
        ]);

        if ($request->coupon_period) {
            $coupon_period = explode(' - ', $request->coupon_period);
            $start_date = date('Y-m-d H:i:s', strtotime($coupon_period[0]));
            $end_date = date('Y-m-d H:i:s', strtotime($coupon_period[1]));
        } else {
            $start_date = null;
            $end_date = null;
        }

        $data['user_id'] = $request->user_id;
        $data['code'] = $request->code;
        $data['title'] = $request->title;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['minimum_order_amount'] = $request->minimum_order_amount;
        $data['maximum_discount_amount'] = $request->maximum_discount_amount;
        $data['usage_limit'] = $request->usage_limit;
        $data['description'] = $request->description;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/coupon/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        Coupon::where('id', $id)->update($data);
        return redirect(route('vendor.coupons'))->with('success', get_phrase('Coupon updated successfully'));
    }

    function coupon_delete($id)
    {
        $current_data = Coupon::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        Coupon::where('id', $id)->delete();
        return redirect(route('vendor.coupons'))->with('success', get_phrase('Coupon deleted successfully'));
    }
    //Coupon



    function orders()
    {
        $store = get_store_by_owner_id(auth()->user()->id);

        $query = Order::where('store_id', $store->id);

        // ----------------------------
        // SEARCH FILTER
        // ----------------------------
        if (request()->filled('search')) {
            $search = request()->query('search');

            // remove # if user types it (e.g. "#105")
            $cleanSearch = trim($search, '#');

            $query->where(function ($q) use ($cleanSearch) {
                if (is_numeric($cleanSearch)) {
                    $num = (int)$cleanSearch;

                    // If UI ID is >=100 → convert back to DB ID
                    $orderId = ($num > 100) ? $num - 100 : $num;

                    $q->where('id', $orderId);
                }

                // search by customer name
                $q->orWhereHas('customer', function ($q2) use ($cleanSearch) {
                    $q2->where('name', 'LIKE', '%' . $cleanSearch . '%');
                });
            });
        }

        // ----------------------------
        // STATUS FILTER
        // ----------------------------
        if (request()->filled('status') && request('status') !== 'all') {
            $statusIdentifier = request('status');

            $query->whereHas('order_updates', function ($q) use ($statusIdentifier) {
                $q->whereHas('order_status', function ($q2) use ($statusIdentifier) {
                    $q2->where('identifier', $statusIdentifier);
                })
                    ->whereIn('id', function ($sub) {
                        $sub->selectRaw('MAX(id) as id')
                            ->from('order_updates')
                            ->groupBy('order_id');
                    });
            });
        }

        // ----------------------------
        // DATE RANGE FILTER (ADMIN STYLE)
        // ----------------------------
        if (request()->filled('created_at')) {
            $dates = explode(' - ', request('created_at'));

            if (count($dates) == 2) {
                $startDate = \Carbon\Carbon::parse($dates[0])->startOfDay();
                $endDate = \Carbon\Carbon::parse($dates[1])->endOfDay();

                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        // Pagination
        $page_data['orders'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Order List ');

        return view('store.order.orders', $page_data);
    }


    function order_add()
    {
        $page_data['page_title'] = get_phrase('Order Add ');
        return view('store.order.add_order', $page_data);
    }

    function order_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            'order_period' => 'required',
            'usage_limit' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'orders');
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->order_period) {
            $order_period = explode(' - ', $request->order_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($order_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($order_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/order/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/order/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
        }

        Order::insert($data);
        return redirect(route('vendor.orders'))->with('success', get_phrase('Order added successfully'));
    }

    function order_details($id)
    {
        $page_data['order'] = Order::where('id', $id)->first();
        $page_data['page_title'] = get_phrase(' Order details ');
        return view('store.order.order_details', $page_data);
    }

    function order_edit($id)
    {
        $page_data['order'] = Order::where('id', $id)->first();

        return view('store.order.edit_order', $page_data);
    }

    function order_update(Request $request, $id)
    {
        $current_data = Order::where('id', $id)->first();

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            'usage_limit' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'orders', 'slug', $id);
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->order_period) {
            $order_period = explode(' - ', $request->order_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($order_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($order_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/order/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/order/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
            remove_file($current_data->banner);
        }

        Order::where('id', $id)->update($data);
        return redirect(route('vendor.orders'))->with('success', get_phrase('Order updated successfully'));
    }

    function order_timeline_update(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $order_status_id = $request->order_status_id;

        // Check if the same status is already added
        $existing = Order_update::where('order_id', $id)
            ->where('order_status_id', $order_status_id)
            ->first();

        if ($existing) {
            // Optional: Update the existing message (if needed)
            $existing->message = $request->message;
            $existing->user_id = $user_id;
            $existing->updated_at = now();
            $existing->save();
        } else {
            // Insert new status update
            Order_update::create([
                'order_id' => $id,
                'order_status_id' => $order_status_id,
                'user_id' => $user_id,
                'message' => $request->message,
                'created_at' => now()
            ]);
        }

        return redirect()->back()->with('success', 'Order delivery status updated');
    }

    function order_timeline_remove($id)
    {
        Order_update::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Order delivery status removed');
    }

    function order_delete($id)
    {
        $current_data = Order::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Order::where('id', $id)->delete();
        return redirect(route('vendor.orders'))->with('success', get_phrase('Order deleted successfully'));
    }
    //Order

    function order_return_requests()
    {
        $page_data['return_requests'] = Order_return::paginate(10);
        $page_data['page_title'] = get_phrase(' Return Request List ');
        return view('store.order_return.return_requests', $page_data);
    }

    function order_return_details(Request $request, $id = "")
    {
        $page_data['request_details'] = Order_return::where('id', $id)->firstOrFail();
        $page_data['page_title'] = get_phrase('Return Details ');
        return view('store.order_return.return_details', $page_data);
    }

    function order_return_refund(Request $request, $id = "")
    {
        $return_details = Order_return::find($id);

        if ($request->image) {
            $proof = app(CommonController::class)->upload($request->image, 'uploads/order_return/proof/' . nice_file_name('prf-' . $id, $request->image->extension()), 400);
        }

        if ($request->refund_by == 'offline') {
            Order_return::where('id', $id)->update([
                'status' => 'approved',
                'refund_by' => 'offline',
                'proof' => $proof
            ]);
        } else {
            $identifier = $return_details->order->payment_method;
            $payment_gateway = Payment_gateway::where('identifier', $identifier)->first();
            $model_name      = $payment_gateway->model_name;
            $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);

            $payment_history = Payment::where('order_id', $return_details->order->id)->first();

            $transaction_keys = $payment_history->payment_details;

            $status = $model_full_path::refund_status($transaction_keys);
            if ($status === true) {
                Order_return::where('id', $id)->update([
                    'status' => 'approved',
                    'refund_by' => $identifier
                ]);
            } else {
                return redirect(route('vendor.order.return_requests'))->with('error', get_phrase('Payment failed! Please try again.'));
            }
        }

        return redirect(route('vendor.order.return_requests'))->with('success', get_phrase('Order return request approved'));
    }

    function order_return_request_cancel($id = "")
    {
        Order_return::where('id', $id)->update([
            'status' => 'canceled',
        ]);

        return redirect(route('vendor.order.return_requests'))->with('success', get_phrase('Order return request cancelled'));
    }

    //Order status
    function order_statuses()
    {
        $page_data['statuses'] = Order_status::orderBy('sort')->get();
        return view('store.order_status.order_statuses', $page_data);
    }

    function order_status_sort(Request $request)
    {
        $order_statuses = json_decode($request->itemJSON);
        foreach ($order_statuses as $key => $id) {
            // Update the 'sort' field for each order status
            Order_status::where('id', $id)->update(['sort' => $key + 1]);
        }

        Session::flash('success', get_phrase('Order status sorted successfully'));
    }

    function order_status_add()
    {
        return view('store.order_status.add_order_status');
    }

    function order_status_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);


        $name = $request->name;
        $identifier = strtolower(preg_replace('/\s+/', '_', preg_replace('/[^a-zA-Z0-9 ]/', '', $name)));

        $maxOrder = Order_status::max('sort');

        $orderStatus = Order_status::create([
            'name' => $name,
            'identifier' => $identifier,
            'color' => $request->color,
            'sort' => $maxOrder + 1,
        ]);

        return redirect(route('vendor.order.statuses'))->with('success', 'Order status created successfully.');
    }

    function order_status_edit($id)
    {
        $page_data['order_status'] = Order_status::where('id', $id)->first();
        return view('store.order_status.edit_order_status', $page_data);
    }

    function order_status_update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        // Fetch the current order status
        $orderStatus = Order_status::findOrFail($id);

        // Process the identifier from the name
        $name = $request->name;
        $identifier = strtolower(preg_replace('/\s+/', '_', preg_replace('/[^a-zA-Z0-9 ]/', '', $name)));

        // Update the order status
        $orderStatus->update([
            'name' => $name,
            'identifier' => $identifier,
            'color' => $request->color,
        ]);

        return redirect(route('vendor.order.statuses'))->with('success', 'Order status updated successfully.');
    }

    function order_status_delete($id)
    {
        Order_status::where('id', $id)->delete();
        return redirect(route('vendor.order.statuses'))->with('success', get_phrase('Order status deleted successfully'));
    }

    // Message
    function messages(Request $request, $thread_id = "")
    {
        if ($thread_id) {
            $page_data['thread_details'] = Message_thread::where('id', $thread_id)->where('user_one', auth()->user()->id)->orWhere('user_two', auth()->user()->id)->firstOrNew();
        } else {
            $page_data['thread_details'] = Message_thread::where('user_one', auth()->user()->id)->orWhere('user_two', auth()->user()->id)->orderBy('updated_at', 'desc')->firstOrNew();
        }

        //mark as read
        Message::where('message_thread_id', $page_data['thread_details']->id)->where('read_status', '!=', 1)->update(['read_status' => 1]);
        $page_data['page_title'] = get_phrase('Message');
        return view('store.message.messages', $page_data);
    }

    public function message_store(Request $request)
    {
        $validated = $request->validate([
            'message'     => 'required',
            'sender_id'   => 'required|integer|exists:App\Models\User,id',
            'receiver_id' => 'required|integer|exists:App\Models\User,id',
            'message_thread_id'   => 'required|integer',
        ]);

        $data['message']     = $request->message;
        $data['sender_id']   = $request->sender_id;
        $data['receiver_id'] = $request->receiver_id;
        $data['message_thread_id']   = $request->message_thread_id;
        $data['read_status'] = 0;
        $data['created_at']  = date('Y-m-d H:i:s');

        Message::insert($data);
        Message_thread::where('id', $request->message_thread_id)->update(['updated_at' => date('Y-m-d H:i:s')]);

        return redirect(route('vendor.messages', ['thread_id' => $request->message_thread_id]))->with('success', get_phrase('Your message successfully has been sent'));
    }

    public function message_thread_store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|integer|exists:App\Models\User,id',
        ]);

        $auth       = auth()->user()->id;
        $user_id    = $request->receiver_id;
        $has_thread = Message_thread::where(function ($query) use ($auth, $user_id) {
            $query->where('user_one', $auth)->where('user_two', $user_id);
        })
            ->orWhere(function ($query) use ($auth, $user_id) {
                $query->where('user_one', $user_id)->where('user_two', $auth);
            })
            ->first();

        if (!$has_thread) {
            $data['user_one'] = auth()->user()->id;
            $data['user_two'] = $request->receiver_id;
            $data['created_at']  = date('Y-m-d H:i:s');
            $thread_id = Message_thread::insertGetId($data);
            return redirect(route('vendor.messages', ['thread_id' => $thread_id]))->with('success', get_phrase('Message thread successfully created'));
        } else {
            $thread_id = $has_thread->id;
        }
        return redirect(route('vendor.messages', ['thread_id' => $thread_id]));
    }

    // Message

    // Payment
    function payments()
    {
        $store = get_store_by_owner_id(auth()->user()->id);
        $store_id = $store->id;

        $query = Payment::orderBy('id', 'desc');

        // -----------------------
        // SEARCH FILTER
        // -----------------------
        if (request()->filled('search')) {

            $search = trim(request()->query('search'));
            $cleanSearch = ltrim($search, '#');

            // Case 1: Search is numeric → filter normally
            if (is_numeric($cleanSearch)) {
                $num = (int)$cleanSearch;
                $orderId = $num > 100 ? $num - 100 : $num;

                $query->where('order_id', 'LIKE', '%' . $orderId . '%');
            }
            // Case 2: Search is NOT numeric → instantly return empty result
            else {
                $emptyPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
                    collect(), // empty
                    0,
                    12,
                    1,
                    ['path' => request()->url(), 'query' => request()->query()]
                );

                return view('store.payment.payments', [
                    'payments' => $emptyPaginator,
                    'page_title' => get_phrase('Payment List'),
                ]);
            }
        }

        // -----------------------
        // FILTER PAYMENTS BY STORE
        // -----------------------
        $filteredPayments = $query->get()->filter(function ($payment) use ($store_id) {

            $order_ids = json_decode($payment->order_id, true) ?? [];

            $orders = Order::whereIn('id', $order_ids)
                ->where('store_id', $store_id)
                ->get();

            $payment->store_orders = $orders;

            return $orders->isNotEmpty();
        });

        // -----------------------
        // PAGINATION
        // -----------------------
        $currentPage = request()->get('page', 1);
        $perPage = 12;

        $itemsForCurrentPage = $filteredPayments
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->values();

        $paginatedPayments = new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsForCurrentPage,
            $filteredPayments->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('store.payment.payments', [
            'payments' => $paginatedPayments,
            'page_title' => get_phrase('Payment List'),
        ]);
    }


    function payment_store() {}

    function payment_delete($id)
    {
        Payment::where('id', $id)->delete();
        return redirect(route('vendor.payments'))->with('success', get_phrase('Payment history deleted successfully'));
    }

    function payment_invoice($id)
    {

        $payment = Payment::findOrFail($id);

        // Get current store
        $store = get_store_by_owner_id(auth()->user()->id);

        // Decode order IDs
        $order_ids = json_decode($payment->order_id, true) ?? [];

        // Get only orders belonging to current store and payment
        $orders = Order::with('order_items.product')
            ->whereIn('id', $order_ids)
            ->where('store_id', $store->id)
            ->get();

        // Sum grand total only for store's orders
        $total_amount = $orders->sum('grand_total');
        $page_title = get_phrase(' Invoice  ');
        return view('store.payment.invoice', compact('payment', 'orders', 'total_amount', 'page_title'));
    }

    function payments_offline_request(Request $request)
    {

        $store = get_store_by_owner_id(auth()->user()->id);
        $store_id = $store->id;

        // Get offline payments with status not paid (initial query)
        $paymentsQuery = Payment::where('payment_method', 'offline')
            ->where('status', '!=', 'paid')
            ->orderBy('id', 'desc');

        // Get all such payments, then filter manually for store's orders
        $allPayments = $paymentsQuery->paginate(20); // Fetch a bit more for filtering, or all

        // Filter payments having orders that belong to this store
        $filteredPayments = $allPayments->filter(function ($payment) use ($store_id) {
            $order_ids = json_decode($payment->order_id, true) ?? [];

            $storeOrders = \App\Models\Order::whereIn('id', $order_ids)
                ->where('store_id', $store_id)
                ->get();

            // Attach storeOrders and total_amount to payment instance for blade usage
            $payment->store_orders = $storeOrders;
            $payment->store_total_amount = $storeOrders->sum('grand_total');

            return $storeOrders->isNotEmpty();
        });

        // Manual pagination because filter() returns a collection
        $currentPage = request()->get('page', 1);
        $perPage = 10;
        $itemsForCurrentPage = $filteredPayments->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedPayments = new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsForCurrentPage,
            $filteredPayments->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('store.payment.offline_requests', [
            'payments' => $paginatedPayments,
            'page_title' => get_phrase(' Offline Payment List '),
        ]);
    }

    function payment_offline_status(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:paid,unpaid',
        ]);
        // Find the payment record
        $payment = Payment::findOrFail($id);
        // Update the payment status
        $payment->status = $request->status;
        $payment->save();
        // Redirect back with success message
        return redirect()->back()->with('success', get_phrase('Payment status updated successfully'));
    }
    // Payment

    // Settings
    function vendor_settings()
    {
        $page_data['store'] = Store::where('user_id', auth()->user()->id)->first();
        $page_data['page_title'] = get_phrase('Store Settings  ');
        return view('store.settings.store_settings', $page_data);
    }

    public function vendor_settings_update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'currency' => 'required|string|max:10',
            'vat_type'       => 'required|in:percentage,flat',
            'vat_value'      => 'required|integer|min:0',
            'shipping_cost'  => 'required|numeric|min:0|max:999999.99',
            'timezone' => 'nullable|string|max:100',
            'store_email' => 'required|email|max:255',
            'support_phone' => 'nullable|string|max:50',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
        ]);

        // Find store by id
        $store = Store::findOrFail($id);

        // Get or create related settings record
        $settings = $store->settings()->firstOrNew([]);

        // Assign validated data
        $settings->currency = $validated['currency'];
        $settings->vat_type       = $validated['vat_type'];
        $settings->vat_value      = $validated['vat_value'];
        $settings->shipping_cost  = $validated['shipping_cost'];
        $settings->timezone = $validated['timezone'] ?? null;
        $settings->store_email = $validated['store_email'];
        $settings->support_phone = $validated['support_phone'] ?? null;
        $settings->facebook_url = $validated['facebook_url'] ?? null;
        $settings->instagram_url = $validated['instagram_url'] ?? null;
        $settings->twitter_url = $validated['twitter_url'] ?? null;



        // Save settings
        $store->settings()->save($settings);

        // Redirect back with success message
        return redirect()->back()->with('success', get_phrase('Store settings updated successfully'));
    }

    function profile_settings()
    {
        $page_data['store'] = get_store_by_owner_id(auth()->user()->id);
        $page_data['page_title'] = get_phrase(' Store Profile settings ');
        return view('store.settings.store_profile', $page_data);
    }

    function profile_settings_update(Request $request)
    {
        $current_data = get_store_by_owner_id(auth()->user()->id);

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'stores', 'slug', $current_data->id);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['zip'] = $request->zip;
        $data['country'] = $request->country;
        $data['phone'] = $request->phone;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/store/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/store/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
            remove_file($current_data->banner);
        }

        Store::where('id', $current_data->id)->update($data);
        return redirect(route('vendor.profile'))->with('success', get_phrase('Store updated successfully'));
    }


    function download_invoice($id)
    {
        $order = Order::with('order_items.product')->findOrFail($id);

        if (request()->has('download') && request('download') == 'pdf') {
            $pdf = Pdf::loadView('store.order.invoice', ['order' => $order]);
            $fileName = 'invoice_' . $order->id . '.pdf';
            return $pdf->download($fileName);
        }
        return view('store.order.invoice', compact('order'));
    }
}
