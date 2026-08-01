<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\Wishlist_item;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Review;
use App\Models\Cart_item;
use App\Models\Attribute;
use App\Models\Shipping_address;
use App\Models\Payment;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Facades\Password;

class ApiController extends Controller
{
    //Login function
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->where('status', 1)->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            if (isset($user) && $user->count() > 0) {
                return response([
                    'message' => 'Invalid credentials!',
                ], 401);
            } else {
                return response([
                    'message' => 'User not found!',
                ], 401);
            }
        } else if ($user->user_type == 'customer') {

            // $user->tokens()->delete();

            $token = $user->createToken('auth-token')->plainTextToken;

            $user->photo = get_photo('user_image', $user->photo);

            $response = [
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
            ];

            return response($response, 200);

        } else {

            //user not authorized
            return response()->json([
                'message' => 'User not found!',
            ], 400);
        }
    }

    public function signup(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^\+?[0-9]{7,15}$/'], // Ensure valid phone format
            'password' => ['required', 'confirmed', PasswordRule::defaults()],
        ];

        // Validate request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Prepare user data
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => 'customer',
            'status' => 1,
            'password' => Hash::make($request->password),
        ];

        // Create the user
        $user = User::create($user_data);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Customer account created successfully',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to create customer account',
        ], 500);
    }

    //customer details
    public function userDetails()
    {
    	$customer_details = User::find(auth('sanctum')->user()->id);

    	if($customer_details) {
            $customer_details->photo = get_photo('user_image', $customer_details->photo);

            $countries = Country::get();

            foreach($countries as $key => $country) {
        		$res[$key] = $country;
        		$res[$key]['cities'] = City::where('country_id', $country->id)->get();
        	}

        	$response = [
	        	'customer_details' => $customer_details,
	        	'country_wise_cities' => $res,
	        ];

	    	return response($response, 200);

    	} else {
    		return response()->json([
                'message' => 'Customer information not found!',
            ], 400);
    	}
    }

    public function profileUpdate(Request $request)
    {

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
        }

        User::where('id',auth('sanctum')->user()->id)->update($data);

        $customer_details = User::find(auth('sanctum')->user()->id);

    	if($customer_details) {
    		return response()->json([
                'customer_details' => $customer_details,
                'message' => 'Profile Update successfully',
            ], 201);
    	} else {
    		return response()->json([
                'message' => 'Profile Update failed!',
            ], 400);
    	}
    }

    public function home()
    {
        $category_list = [];
        $product_list = [];

        // Fetch categories
        $categories = Category::where('parent_id', 0)->get();

        // Fetch products with discount relation
        $products = Product::where('status', 1)
            ->with('discount', 'reviews') // eager load
            ->limit(20)
            ->get();

        if ($categories->count()) {
            // Color list
            $colors = [
                "#FF5733",
                "#33C1FF",
                "#28A745",
                "#FFC300",
            ];

            foreach ($categories as $key => $category) {
                $category_list[$key] = [
                    'id'         => $category->id,
                    'logo'       => get_photo('category_icon', $category->icon),
                    'title'      => $category->title,
                    'color_code' => $colors[$key % count($colors)],
                ];
            }
        }

        if ($products->count()) {
            $product_list = api_get_products($products);
        }

        $data = [
            "status"  => "success",
            "message" => "Homepage data fetched successfully",
            "data"    => [
                "hero_section" => [
                    "banner" => "https://example.com/images/hero-banner.jpg",
                    "title" => "Welcome to Our Store",
                    "sub_title" => "Best Deals Everyday"
                ],
                "category_list" => $category_list,
                "banners" => [
                    [
                        "id" => 1,
                        "image_url" => "https://example.com/images/banner1.jpg",
                        "title" => "Summer Sale",
                        "sub_title" => "Up to 50% Off",
                        "sub_sub_title" => "Limited Time Offer"
                    ],
                    [
                        "id" => 2,
                        "image_url" => "https://example.com/images/banner2.jpg",
                        "title" => "New Arrivals",
                        "sub_title" => "Trendy Collections",
                        "sub_sub_title" => "Shop Now"
                    ]
                ],
                "products" => $product_list,
            ],
        ];

        return response()->json($data);
    }

    public function all_products()
    {
        $products = Product::with(['user', 'category', 'store', 'brand'])->where('status', 1)->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No products found',
                'products' => [],
            ], 404);
        }

        $formattedProducts = $products->map(function ($product) {
            return formatProduct($product);
        });

        return response()->json([
            'status' => 200,
            'message' => 'Products fetched successfully',
            'products' => $formattedProducts,
        ]);
    }

    public function featured_products()
    {
        $products = Product::with(['user', 'category', 'store', 'brand'])->where('status', 1)->latest()->take(20)->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No feaured products found',
                'products' => [],
            ], 404);
        }

        $formattedProducts = $products->map(function ($product) {
            return formatProduct($product);
        });

        return response()->json([
            'status' => 200,
            'message' => 'Feaured products fetched successfully',
            'products' => $formattedProducts,
        ]);
    }

    public function find_products(Request $request)
    {
        $search       = $request->input('search');
        $category_id  = $request->input('category_id');
        $min_price    = $request->input('min_price');
        $max_price    = $request->input('max_price');
        $color_slug   = $request->input('color');
        $size_slug    = $request->input('size');
        $availability = $request->input('availability');
        $rating       = $request->input('rating');

        $query = Product::with(['user', 'category', 'store', 'brand', 'product_attributes.attribute_type'])
            ->where('status', 1);

        // Search by title
        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        // Category
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // Price range
        if ($min_price !== null && $max_price !== null) {
            $query->whereBetween('price', [$min_price, $max_price]);
        }

        // Availability
        if ($availability === 'in_stock') {
            $query->where('total_stock', '>', 0);
        } elseif ($availability === 'out_of_stock') {
            $query->where('total_stock', '<=', 0);
        }

        // Rating
        if ($rating) {
            $query->where('average_rating', '>=', $rating);
        }

        // Attribute filters (color, size) from category
        if (($color_slug || $size_slug) && $category_id) {
            $category = Category::with('attribute_types.attributes')->find($category_id);

            if ($category) {
                $attributeFilters = [];

                foreach ($category->attribute_types as $type) {
                    foreach ($type->attributes as $attribute) {
                        if ($color_slug && $type->slug === 'color' && ($attribute->slug === $color_slug || $attribute->input_value === $color_slug)) {
                            $attributeFilters[] = $attribute->id;
                        }

                        if ($size_slug && $type->slug === 'size' && $attribute->slug === $size_slug) {
                            $attributeFilters[] = $attribute->id;
                        }
                    }
                }

                if (!empty($attributeFilters)) {
                    $query->whereHas('product_attributes', function ($q) use ($attributeFilters) {
                        $q->whereIn('attribute_id', $attributeFilters);
                    });
                }
            }
        }

        $products = $query->get();

        if ($products->isEmpty()) {
            return response()->json([
                'code' => 204,
                'message' => 'No products matched your filter.',
                'products' => [],
            ], 200);
        }

        $formattedProducts = $products->map(function ($product) {
            return formatProduct($product);
        });

        return response()->json([
            'code' => 200,
            'message' => 'Products fetched successfully.',
            'products' => $formattedProducts,
        ], 200);
    }


    public function productDetails($id = "")
    {
        $product_details = Product::find($id);

        $price = $product_details->price;
        $discount_price = null;

        // Check discount
        if ($product_details->discount->discount_type === 'percentage') {
            $discount_price = $price - (($price / 100) * $product_details->discount->discount_value);
        } elseif ($product_details->discount->discount_type === 'flat') {
            $discount_price = $price - $product_details->discount->discount_value;
        }

        $thumbs = $product_details->thumbnail;

        if (is_string($thumbs) && $thisThumbs = json_decode($thumbs, true)) {
            // Case 1: JSON format (["img1.png","img2.png"])
            $thumbnails = array_map(fn($t) => api_get_photo('product_thumbnail', $t), $thisThumbs);

        } else {
            // Case 3: Single string
            $thumbnails = [
                api_get_photo('product_thumbnail', $thumbs)
            ];
        }

        $products = Product::where('status', 1)
            ->where('category_id', $product_details->category_id)
            ->with('discount', 'reviews') // eager load
            ->limit(10)
            ->get();

        // Rating breakdown
        $ratings = [
            'five'  => $product_details->reviews->where('rating', 5)->count(),
            'four'  => $product_details->reviews->where('rating', 4)->count(),
            'three' => $product_details->reviews->where('rating', 3)->count(),
            'two'   => $product_details->reviews->where('rating', 2)->count(),
            'one'   => $product_details->reviews->where('rating', 1)->count(),
        ];

        $response['id'] = $product_details->id;
        $response['title'] = $product_details->title;
        $response['summary'] = $product_details->summary;
        $response['description'] = $product_details->description;
        $response['thumbnails'] = $thumbnails;
        $response['price'] = $price;
        $response['discount_price'] = $discount_price;
        $response['avg_rating'] = $product_details->average_rating;
        $response['number_of_reviews'] = $product_details->reviews->count();
        $response['available_sizes'] = ["Small", "Medium", "Large"];
        $response['available_colors'] = [
            ["color_name" => "Black", "color_code" => "#000000"],
            ["color_name" => "Silver", "color_code" => "#C0C0C0"],
            ["color_name" => "Rose Gold", "color_code" => "#FF007F"]
        ];
        $response['ratings_breakdown'] = $ratings;
        $response['reviews'] = api_get_product_reviews($id);
        $response['related_products'] = api_get_products($products);

        $data = [
            "status" => "success",
            "message" => "Product details fetched successfully",
            "data" => $response,
        ];

        return response()->json($data);
    }

    // My wishlist API
    public function my_wishlist(Request $request)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized. Please login to view your wishlist.',
                'products' => [],
            ], 401);
        }

        $productIds = Wishlist_item::where('user_id', $user->id)->pluck('product_id');

        if ($productIds->isEmpty()) {
            return response()->json([
                'status' => 204,
                'message' => 'Your wishlist is currently empty.',
                'products' => [],
            ], 200); // 200 OK with empty result is more appropriate than 404 here
        }

        $products = Product::whereIn('id', $productIds)
            ->with(['user', 'category', 'store', 'brand'])
            ->where('status', 1)
            ->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No active products found in your wishlist.',
                'products' => [],
            ], 404);
        }

        $formattedProducts = $products->map(function ($product) {
            return formatProduct($product);
        });

        return response()->json([
            'status' => 200,
            'message' => 'Wishlist products fetched successfully.',
            'products' => $formattedProducts,
        ]);
    }

    // Remove from wishlist
    public function toggle_wishlist_items(Request $request)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized. Please login first.',
            ], 401);
        }

        $product_id = $request->input('product_id');

        if (!$product_id) {
            return response()->json([
                'status' => 422,
                'message' => 'Product ID is required.',
            ], 422);
        }

        $existing = Wishlist_item::where('product_id', $product_id)
            ->where('user_id', $user->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $status = 'removed';
            $message = 'Product removed from your wishlist.';
        } else {
            Wishlist_item::create([
                'product_id' => $product_id,
                'user_id' => $user->id,
            ]);
            $status = 'added';
            $message = 'Product added to your wishlist.';
        }

        return response()->json([
            'status' => 200,
            'action' => $status,
            'message' => $message,
        ]);
    }

    public function my_orders(Request $request)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Unauthorized',
                'data' => null
            ], 404);
        }

        $my_orders = Order::with('order_items', 'order_updates.order_status')
                        ->where('user_id', $user->id)
                        ->get();

        $formattedOrders = $my_orders->map(function ($order) {
            $order_update = $order->order_updates()->latest()->first();
            $order_status = $order_update?->order_status;

            return [
                'id' => $order->id,
                'number_of_items' => $order->order_items->count(),
                'grand_total' => $order->grand_total,
                'currency' => $order->currency_code,
                'payment_method' => ucfirst($order->payment_method),
                'created_at' => strtotime($order->created_at),
                'status' => [
                    'name' => $order_status?->name,
                    'color' => $order_status?->color,
                ],
            ];
        });

        return response()->json([
            'code' => 200,
            'message' => $formattedOrders->isEmpty() ? 'No orders found' : 'Orders fetched successfully',
            'data' => $formattedOrders
        ], 200);
    }

    public function my_order_details(Request $request, $id = "")
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                'code' => 401,
                'message' => 'Unauthorized',
                'data' => null
            ], 401);
        }

        $order = Order::with([
            'order_items.product',
            'order_updates.order_status'
        ])
        ->where('id', $id)
        ->where('user_id', $user->id)
        ->first();

        if (!$order) {
            return response()->json([
                'code' => 404,
                'message' => 'Order not found',
                'data' => null
            ], 404);
        }

        $formattedOrder = [
            'id' => $order->id,
            'number_of_items' => $order->order_items->count(),
            'grand_total' => $order->grand_total,
            'created_at' => strtotime($order->created_at),
            'order_items' => $order->order_items->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'title' => $item->product?->title,
                    'summary' => $item->product?->summary,
                    'thumbnail' => get_photo('product_thumbnail', $item->product->thumbnail),
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                ];
            }),
            'order_status' => $order->order_updates->map(function ($update) {
                return [
                    'status_id' => $update->order_status_id,
                    'name' => $update->order_status?->name,
                    'message' => $update->message,
                    'created_at' => strtotime($update->created_at),
                ];
            }),
        ];

        return response()->json([
            'code' => 200,
            'message' => 'Order details fetched successfully',
            'data' => $formattedOrder
        ], 200);

    }

    public function get_faq()
    {
        $categories = collect([
            ['id' => 1, 'name' => 'Ordering'],
            ['id' => 2, 'name' => 'Shipping'],
            ['id' => 3, 'name' => 'Returns & Refunds'],
            ['id' => 4, 'name' => 'Payment'],
        ]);

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No faqs found',
                'categories' => [],
                'faqs' => [],
            ], 404);
        }

        $faqs = collect([
            ['id' => 101, 'question' => 'How do I place an order?', 'answer' => 'Add items to cart and checkout.', 'category_id' => 1],
            ['id' => 102, 'question' => 'Can I cancel my order?', 'answer' => 'You can cancel within 12 hours.', 'category_id' => 1],
            ['id' => 103, 'question' => 'Can I modify my order?', 'answer' => 'Yes, before dispatch.', 'category_id' => 1],
            ['id' => 104, 'question' => 'Do I need an account?', 'answer' => 'Yes, you must register.', 'category_id' => 1],
            ['id' => 105, 'question' => 'Is there a minimum order?', 'answer' => 'No minimum limit.', 'category_id' => 1],

            ['id' => 106, 'question' => 'How long does shipping take?', 'answer' => '3–5 business days.', 'category_id' => 2],
            ['id' => 107, 'question' => 'Express shipping available?', 'answer' => 'Yes, extra charge.', 'category_id' => 2],
            ['id' => 108, 'question' => 'Can I track my shipment?', 'answer' => 'Tracking emailed.', 'category_id' => 2],
            ['id' => 109, 'question' => 'Do you ship internationally?', 'answer' => 'Yes, to select countries.', 'category_id' => 2],
            ['id' => 110, 'question' => 'What if delayed?', 'answer' => 'We notify you.', 'category_id' => 2],

            ['id' => 111, 'question' => 'Return policy?', 'answer' => 'Return within 7 days.', 'category_id' => 3],
            ['id' => 112, 'question' => 'How to request return?', 'answer' => 'Via dashboard or support.', 'category_id' => 3],
            ['id' => 113, 'question' => 'Are returns free?', 'answer' => 'You pay shipping.', 'category_id' => 3],
            ['id' => 114, 'question' => 'How are refunds done?', 'answer' => 'To original method.', 'category_id' => 3],
            ['id' => 115, 'question' => 'Refund time?', 'answer' => '5–7 days.', 'category_id' => 3],

            ['id' => 116, 'question' => 'Payment methods?', 'answer' => 'Card, wallet, bank.', 'category_id' => 4],
            ['id' => 117, 'question' => 'Cash on delivery?', 'answer' => 'Available in some areas.', 'category_id' => 4],
            ['id' => 118, 'question' => 'Is it secure?', 'answer' => 'Yes, SSL protected.', 'category_id' => 4],
            ['id' => 119, 'question' => 'Payment failed?', 'answer' => 'Try another method.', 'category_id' => 4],
            ['id' => 120, 'question' => 'Multiple payment methods?', 'answer' => 'One per order only.', 'category_id' => 4],
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Faqs fetched',
            'categories' => $categories,
            'faqs' => $faqs,
        ]);
    }

    public function get_filters()
    {
        $categories = Category::with(['attribute_types.attributes'])->get();

        if ($categories->isEmpty()) {
            return response()->json([
                'code' => 204,
                'message' => 'No categories found.',
                'data' => null,
            ], 204);
        }

        $formattedCategories = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
                'attribute_types' => $category->attribute_types->map(function ($type) {
                    return [
                        'id' => $type->id,
                        'name' => $type->name,
                        'slug' => $type->slug,
                        'input_type' => $type->input_type,
                        'attributes' => $type->attributes->map(function ($attr) {
                            return [
                                'id' => $attr->id,
                                'attribute_type_id' => $attr->attribute_type_id,
                                'name' => $attr->name,
                                'slug' => $attr->slug,
                                'input_value' => $attr->input_value,
                            ];
                        }),
                    ];
                }),
            ];
        });

        $minPrice = Product::min('price') ?? 0;
        $maxPrice = Product::max('price') ?? 0;

        return response()->json([
            'code' => 200,
            'message' => 'Filter data fetched successfully.',
            'data' => [
                'categories' => $formattedCategories,
                'price_range' => [
                    'min' => (int) $minPrice,
                    'max' => (int) $maxPrice,
                ]
            ]
        ], 200);
    }

    // password reset
    public function update_password(Request $request)
    {

        $token = $request->bearerToken();
        $response = array();

        if (isset($token) && $token != '') {
            $auth = auth('sanctum')->user();

            // The passwords matches
            if (!Hash::check($request->get('current_password'), $auth->password)) {
                $response['status'] = 'failed';
                $response['message'] = 'Current Password is Invalid';

                return $response;
            }

            // Current password and new password same
            if (strcmp($request->get('current_password'), $request->new_password) == 0) {
                $response['status'] = 'failed';
                $response['message'] = 'New Password cannot be same as your current password.';

                return $response;
            }

            // Current password and confirm password not same
            if (strcmp($request->get('confirm_password'), $request->new_password) != 0) {
                $response['status'] = 'failed';
                $response['message'] = 'New Password is not same as your confirm password.';

                return $response;
            }

            $user = User::find($auth->id);
            $user->password = Hash::make($request->new_password);
            $user->save();

            $response['status'] = 'success';
            $response['message'] = 'Password Changed Successfully';

            return $response;

        } else {
            $response['status'] = 'failed';
            $response['message'] = 'Please login first';

            return $response;
        }
    }

    public function forgot_password(Request $request)
    {
        $response = [];

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            $response['success'] = true;
            $response['message'] = 'Reset Password Link sent successfully to your email.';
            return response()->json($response, 200);
        }

        $response['success'] = false;
        $response['message'] = 'Failed to send Reset Password Link. Please check the email and try again.';
        return response()->json($response, 400);
    }

    public function review_product(Request $request)
    {
        $userId = auth('sanctum')->id();
        $productId = $request->query('product_id'); // since you send ?product_id=21

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        // Check if user purchased this product
        $purchased = Order::where('user_id', $userId)
            ->whereHas('order_items', function ($q) use ($productId) {
                $q->where('product_id', $productId);
            })
            ->exists();

        if (!$purchased) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'You cannot review this product because you have not purchased it.',
                'data'    => null
            ], 403);
        }

        // Fetch existing review if available
        $review = Review::with('files')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($review) {
            $orderItem = \App\Models\Order_item::whereHas('order', function($q) use ($userId) {
                    $q->where('user_id', $userId);
                })
                ->where('product_id', $productId)
                ->first();

            $data = [
                'id' => $review->id,
                'user_id' => $review->user_id,
                'product' => [
                    'id' => $review->product->id,
                    'title' => $review->product->title,
                    'summary' => $review->product->summary,
                    'thumbnail' => url('public/'.$review->product->thumbnail),
                    'currency' => currency(),
                    'price' => $orderItem ? $orderItem->price : $review->product->price,
                    'discounted_amount' => $orderItem ? $orderItem->discounted_amount : 0,
                ],
                'rating' => $review->rating,
                'comment' => $review->comment,
                'helpful_marked_users' => $review->helpful_marked_users,
                'files' => $review->files->map(function ($file) {
                    return [
                        'id' => $file->id,
                        'path' =>  url('public/'.$file->path)
                    ];
                })
            ];

            return response()->json([
                'status'  => 'success',
                'message' => 'Review found',
                'data'    => $data
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'No review found for this product',
            'data'    => null
        ]);
    }

    public function submit_review(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:2000',
            'files.*'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120', // max 5MB per file
        ]);

        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        // Check if user purchased this product
        $purchased = Order::where('user_id', $userId)
            ->whereHas('order_items', function ($q) use ($request) {
                $q->where('product_id', $request->product_id);
            })
            ->exists();

        if (!$purchased) {
            return response()->json([
                'status' => 'failed',
                'message' => 'You cannot review this product because you have not purchased it.'
            ], 403);
        }

        // Create or update review
        $review = Review::firstOrNew([
            'user_id' => $userId,
            'product_id' => $request->product_id,
        ]);

        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        // Handle file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {

                $fileName = nice_file_name(
                    pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME),
                    $uploadedFile->extension()
                );

                $path = app(\App\Http\Controllers\CommonController::class)
                    ->upload($uploadedFile, 'uploads/review/' . $fileName, 800);

                $review->files()->create([
                    'path' => $path,
                ]);
            }
        }


        return response()->json([
            'status' => 'success',
            'message' => $review->wasRecentlyCreated ? 'Review submitted successfully.' : 'Review updated successfully.'
        ]);
    }

    public function track_order($order_id)
    {
        $order = Order::with([
                'order_items.product',
                'order_updates.order_status',
                'shipping_address.city',
                'shipping_address.state',
                'shipping_address.country'
            ])->where('id', $order_id)->first();

        if (!$order) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Order not found',
            ], 404);
        }

        // Format order items
        $items = $order->order_items->map(function ($item) {
            return [
                'product_id' => $item->product->id,
                'title'      => $item->product->title,
                'summary'      => $item->product->summary,
                'thumbnail'  => url('public/' . $item->product->thumbnail),
                'price'      => $item->price,
                'discount'   => $item->discounted_amount,
            ];
        });

        // Format tracking history
        $tracking = $order->order_updates->map(function ($update) {
            return [
                'status'     => $update->order_status->name,
                'message'    => $update->message ?? null,
                'updated_at' => $update->created_at->format('d M Y, h:i A'),
            ];
        });

        // Format shipping address (comma separated)
        $address = null;
        if ($order->shipping_address) {
            $addressParts = [
                $order->shipping_address->address ?? '',
                $order->shipping_address->zip_code ?? '',
                optional($order->shipping_address->city)->name,
                optional($order->shipping_address->state)->name,
                optional($order->shipping_address->country)->name,
            ];

            // remove empty values and join with comma
            $address = implode(', ', array_filter($addressParts));
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Order tracking details',
            'data'    => [
                'order_id'          => $order->id,
                'grand_total'       => $order->grand_total,
                'currency'          => $order->currency_code,
                'shipping_address'  => $address,
                'items'             => $items,
                'tracking'          => $tracking,
            ]
        ]);
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'product_id'      => 'required|exists:products,id',
            'quantity'        => 'required|integer|min:1',
            'item_attributes' => 'nullable|array', // e.g. {"color_1":["red"], "size":["l"]}
        ]);

        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }
        
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Product not found'
            ], 404);
        }

        // normalize attributes (always JSON string for DB compare)
        $attributesJson = $request->item_attributes ? json_encode($request->item_attributes) : json_encode([]);

        // 🔹 check if same product + same attributes already in cart
        $cartItem = Cart_item::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->where('item_attributes', $attributesJson)
            ->first();

        if ($cartItem) {
            // update qty
            $cartItem->quantity += $request->quantity;
            $cartItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully',
                'cart_item' => $cartItem
            ]);
        } else {
            // create new row
            $cartItem = Cart_item::create([
                'user_id'        => $userId,
                'product_id'     => $request->product_id,
                'item_attributes'=> $attributesJson,
                'quantity'       => $request->quantity,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart',
                'cart_item' => $cartItem
            ]);
        }
    }

    public function my_cart(Request $request)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        $cartItems = Cart_item::with('product')->where('user_id', $userId)->get();

        $result = $cartItems->map(function ($item) {
            $decodedAttributes = json_decode($item->item_attributes, true) ?? [];

            $formattedAttributes = [];
            foreach ($decodedAttributes as $attrSlug => $values) {
                foreach ($values as $value) {
                    // get attribute_type name + value details
                    $attribute = Attribute::where('slug', $value)
                        ->orWhere('name', $value)
                        ->first();

                    $label = $attrSlug; // default: use slug
                    $attrName = null;

                    if ($attribute) {
                        $attrName = $attribute->name;
                        $label = $attribute->attribute_type->name ?? $attrSlug;
                    }

                    $formattedAttributes[] = [
                        'attribute' => $label, // e.g. "Color"
                        'value'     => $attrName ?? $value, // e.g. "Red"
                    ];
                }
            }

            return [
                'id'        => $item->id,
                'product_id'        => $item->product->id,
                'title' => $item->product->title,
                'price' => $item->product->price,
                'currency_code'  => currency(),
                'image' => get_image($item->product->thumbnail ?? null),
                'quantity'  => $item->quantity,
                'attributes'=> $formattedAttributes,
                'subtotal'  => $item->quantity * $item->product->price,
            ];
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Cart data fetched successfully',
            'cart'   => $result,
            'currency_code'  => currency(),
            'total'  => $result->sum('subtotal')
        ]);
    }

    public function shipping_addresses(Request $request)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        $addresses = Shipping_address::with(['country', 'state', 'city'])
            ->where('user_id', $userId)
            ->get()
            ->map(function ($address) {
                return [
                    'id'        => $address->id,
                    'title'     => $address->title,
                    'address'   => $address->address,
                    'zip_code'  => $address->zip_code,
                    'is_primary'=> (bool) $address->is_primary,
                    'country'   => $address->country->name ?? null,
                    'state'     => $address->state->name ?? null,
                    'city'      => $address->city->name ?? null,
                ];
            });

        return response()->json([
            'status' => 'success',
            'addresses' => $addresses
        ]);
    }

    public function mark_as_primary_address(Request $request, $id)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        // Reset all addresses for this user
        Shipping_address::where('user_id', $userId)->update(['is_primary' => 0]);

        // Mark the selected one as primary
        $address = Shipping_address::where('user_id', $userId)
            ->where('id', $id)
            ->first();

        if (!$address) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Address not found'
            ], 404);
        }

        $address->is_primary = 1;
        $address->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Primary address updated successfully',
            'address' => $address
        ]);
    }

    public function payment_invoice(Request $request)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        // Validate request input
        $request->validate([
            'payment_id' => 'required|integer'
        ]);

        // Get the payment with relations
        $payment = Payment::with([
            'user',
            'order.order_items.product'
        ])->where('id', $request->payment_id)->first();

        if (!$payment) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Payment not found'
            ], 404);
        }

        // Check if the logged-in user is the owner of the payment
        if ($payment->user_id != $userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Forbidden'
            ], 403);
        }

        // Decode order_id (e.g. "[1,2]")
        $orderIds = json_decode($payment->order_id, true);

        if (!is_array($orderIds)) {
            $orderIds = [$payment->order_id]; // fallback if single value
        }

        // Fetch all related orders with items & products
        $orders = Order::with('order_items.product')
            ->whereIn('id', $orderIds)
            ->get();

        // Flatten order items
        $ordersData = [];
         $total_shipping_cost = 0;
        $total_vat = 0;
        $grand_total = 0;

        foreach ($orders as $order) {

            $total_shipping_cost += $order->total_shipping_cost;
            $total_vat += $order->total_amount_of_vat;
            $grand_total += $order->grand_total;

            foreach ($order->order_items as $item) {
                $ordersData[] = [
                    'order_id'       => $order->id,
                    'product_id'     => $item->product_id,
                    'product'        => $item->product->title,
                    'thumbnail'      => get_photo('product_thumbnail', $item->product->thumbnail),
                    'quantity'       => $item->quantity,
                    'price'          => $item->price,
                    'discount_price' => $item->discount_price,
                ];
            }
        }

        // Prepare invoice JSON
        $invoice = [
            'invoice_id'    => 'INV-' . $payment->id,
            'invoice_date'  => date_formatter($payment->created_at, 1),
            'user' => [
                'name'    => $payment->user->name,
                'email'   => $payment->user->email,
                'address' => $payment->user->address,
                'phone'   => $payment->user->phone,
            ],
            'payment_details' => [
                'total'           => $orders->sum('total_order_amount'),
                'vat'             => $total_vat,
                'shipping_cost'   => $total_shipping_cost,
                'grand_total'     => $grand_total,
                'due'             => $payment->status == 'paid' ? "0 {$payment->currency_code}" : "{$payment->currency} {$payment->currency_code}",
                'method'          => $payment->payment_method,
                'status'          => $payment->status,
            ],
            'orders' => $ordersData
        ];

        return response()->json([
            'status'  => 'success',
            'invoice' => $invoice
        ]);
    }

    public function payment_history(Request $request)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        // Paginate payments for the logged-in user
        $payments = Payment::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $paymentsData = $payments->map(function ($payment) {
            $order_ids = json_decode($payment->order_id, true) ?? [];
            $formatted_order_ids = array_map(function($id) {
                return '#' . ($id + 100);
            }, $order_ids);

            // Calculate total items across all orders
            $total_items = Order_item::whereIn('order_id', $order_ids)->sum('quantity');

            return [
                'payment_id'        => $payment->id,
                'order_ids'         => implode(', ', $formatted_order_ids),
                'total_order_items' => $total_items,
                'currency'          => $payment->currency_code,
                'total_amount'      => $payment->total_amount,
                'status'            => $payment->status,
                'payment_method'    => $payment->payment_method,
                'payment_details'   => json_decode($payment->payment_details, true),
                'created_at'        => $payment->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'status'    => 'success',
            'payments'  => $paymentsData
        ]);
    }

    public function buy_now(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'attributes' => 'nullable|array',
        ]);

        $userId = auth('sanctum')->id();

        // check if product exists
        $product = Product::findOrFail($request->product_id);

        // check if product already exists in cart with same attributes
        $cart = Cart_item::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->where('item_attributes', json_encode($request->attributes ?? []))
            ->first();

        if ($cart) {
            // update quantity normally
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        } else {
            // create new cart row
            $cart = Cart_item::create([
                'user_id'    => $userId,
                'product_id' => $request->product_id,
                'item_attributes' => json_encode($request->attributes ?? []),
                'quantity'   => $request->quantity,
            ]);
        }

        if ($cart) {
            return response()->json([
                'status'  => true,
                'message' => 'Product added to cart successfully (Buy Now).',
                'cart_id' => $cart->id,
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Failed to add product to cart.',
        ], 400);
    }

    public function order_summary(Request $request)
    {
        $user = auth('sanctum')->user();

        // Get cart items with product + discount relation
        $cartItems = Cart_item::where('user_id', $user->id)
            ->with(['product.discount']) // eager load
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Cart is empty'
            ], 404);
        }

        $subTotal = 0;
        $total_amount_of_vat = 0;
        $total_shipping_cost = 0;
        $items = [];
        $processedStores = [];

        foreach ($cartItems as $item) {
            $product = $item->product;
            $price   = $product->price;
            $discountPrice = null;

            if ($product->discount) {
                if ($product->discount->discount_type === 'percentage') {
                    $discountPrice = $price - (($price / 100) * $product->discount->discount_value);
                } elseif ($product->discount->discount_type === 'flat') {
                    $discountPrice = $price - $product->discount->discount_value;
                }
            }

            $finalPrice = $discountPrice ?? $price;
            $lineTotal  = $finalPrice * $item->quantity;

            $subTotal += $lineTotal;

            $storeSettings = $product->store->settings;

            // VAT Calculation (per store setting)
            if ($storeSettings) {
                if ($storeSettings->vat_type === 'percentage') {
                    $total_amount_of_vat += (($finalPrice * $item->quantity) / 100) * $storeSettings->vat_value;
                } else {
                    $total_amount_of_vat += ($storeSettings->vat_value ?? 0) * $item->quantity;
                }
            }

            // Shipping Cost (once per store)
            $storeId = $product->store->id;
            if (!in_array($storeId, $processedStores)) {
                $total_shipping_cost += $storeSettings->shipping_cost ?? 0;
                $processedStores[] = $storeId;
            }

            $items[] = [
                'product_id'     => $product->id,
                'product'        => $product->title,
                'thumbnail'      => get_photo('product_thumbnail', $product->thumbnail),
                'quantity'       => $item->quantity,
                'price'          => $price,
                'discount_price' => $discountPrice,
                'total'     => $lineTotal,
            ];
        }

        $grandTotal = $subTotal + $total_shipping_cost + $total_amount_of_vat;

        return response()->json([
            'status' => true,
            'order_summary' => [
                'cart_items'   => $items,
                'sub_total'    => $subTotal,
                'shipping'     => $total_shipping_cost,
                'vat'          => $total_amount_of_vat,
                'grand_total'  => $grandTotal,
                'currency'     => 'USD',
                'addresses'    => [
                    'shipping' => $user->shipping_addresses,
                ]
            ]
        ]);
    }

    public function checkout(Request $request)
    {
        $userId = auth('sanctum')->id();

        if (!$userId) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'redirect_url' => 'https://demo.creativeitem.com/ecommerce',
        ]);


    }







}
