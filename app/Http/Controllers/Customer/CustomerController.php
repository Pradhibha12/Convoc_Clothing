<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Cart_item;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\File;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Product;
use App\Models\Shipping_address;
use App\Models\User;
use App\Models\Wishlist_item;
use App\Models\Order_return;
use App\Models\Message;
use App\Models\Message_thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CustomerController extends Controller
{

    // Wishlist start
    public function wishlist_items(Request $request)
    {
        $page_data['wishlist_items'] = Wishlist_item::where('user_id', Auth()->user()->id)->paginate(12)->appends($request->query());
        return view('frontend.wishlist_item.wishlist_items', $page_data);
    }

    public function wishlist_item_update($product_id)
    {
        $user_id = auth()->id();

        $current_data = Wishlist_item::where('user_id', $user_id)->where('product_id', $product_id)->exists();

        if ($current_data) {
            Wishlist_item::where('user_id', $user_id)->where('product_id', $product_id)->delete();
            $wishlistCount = Wishlist_item::where('user_id', $user_id)->count();
            $response = [
                'removeClass' => [
                    'elem' => "#wishlist_item_$product_id",
                    'content' => 'active',
                ],
                'attribute' => [
                    'elem' => '#header-wishlist-item-counter',
                    'attr' => 'data-count',
                    'content' => $wishlistCount
                ],
                'removeElem' => "#my_wishlist_item_$product_id",
                'success' => get_phrase('Product removed from wishlist'),
            ];
        } else {
            Wishlist_item::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
            $wishlistCount = Wishlist_item::where('user_id', $user_id)->count();
            $response = [
                'addClass' => [
                    'elem' => "#wishlist_item_$product_id",
                    'content' => 'active',
                ],
                'attribute' => [
                    'elem' => '#header-wishlist-item-counter',
                    'attr' => 'data-count',
                    'content' => $wishlistCount
                ],
                'success' => get_phrase('Product added to wishlist'),
            ];
        }

        // Return the response in JSON format
        return json_encode($response);
    }


    public function wishlist_item_delete($product_id)
    {
        $user_id = auth()->id();

        Wishlist_item::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        $wishlistCount = Wishlist_item::where('user_id', $user_id)->count();

        // Build the response
        $response = [
            'attribute' => [
                'elem' => '#header-wishlist-item-counter',
                'attr' => 'data-count',
                'content' => $wishlistCount
            ],
            'fadeOut' => "#wishlist_item_$product_id",
            'success' => get_phrase('Product removed from wishlist'),
        ];

        return json_encode($response);
    }
    // Wishlist ended




    // Cart start
    public function cart_items()
    {
        return view('frontend.cart.index'); 
    }

    public function cart_item_store(Request $request, $product_id)
    {
        $user_id = auth()->id();

        $data = $request->all();
        unset($data['_token']);
        unset($data['quantity']);

        Cart_item::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => 1,
            'item_attributes' => json_encode($data)
        ]);

        return $this->get_cart_response($product_id, false);
    }

    public function buy_now(Request $request, $product_id)
    {
        $user_id = auth()->id();

        $data = $request->all();
        unset($data['_token']);
        unset($data['quantity']);


        Cart_item::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => 1,
            'item_attributes' => json_encode($data)
        ]);

        $this->get_cart_response($product_id, false);

        return redirect(route('customer.cart_items'))->with('success', get_phrase('Product added to cart')); 
    }

    public function cart_item_update($product_id)
    {
        $user_id = auth()->id();
        $current_data = Cart_item::where('user_id', $user_id)->where('product_id', $product_id)->exists();
        if ($current_data) {
            Cart_item::where('user_id', $user_id)->where('product_id', $product_id)->delete();
            return $this->get_cart_response($product_id, true);
        } else {
            Cart_item::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => 1,
                'item_attributes' => json_encode([])
            ]);
            return $this->get_cart_response($product_id, false);
        }
    }


    public function cart_item_delete($product_id)
    {
        $user_id = auth()->id();
        Cart_item::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return $this->get_cart_response($product_id, true);
    }

    public function cart_item_quantity_update($cart_item_id, $sign)
    {

        $user_id = auth()->id();
        $current_data = Cart_item::where('user_id', $user_id)->where('id', $cart_item_id)->firstOrNew();

        if ($current_data->quantity > 0) {
            if ($sign == 'plus') {
                $quantity = $current_data->quantity + 1;

                Cart_item::where('user_id', $user_id)->where('id', $cart_item_id)->update(['quantity' => $quantity]);
            } else {
                $quantity = $current_data->quantity - 1;

                if ($quantity > 0) Cart_item::where('user_id', $user_id)->where('id', $cart_item_id)->update(['quantity' => $quantity]);
            }
        }

        $response = [
            'html' => [
                'elem' => "#offcanvasCart",
                'content' => view('frontend.cart.offcanvas_cart_body')->render()
            ],
            'load' => [
                'elem' => "#shopping-cart-page",
                'content' => view('frontend.cart.shopping_cart_page_body')->render()
            ]
        ];

        return json_encode($response);
    }

    function get_cart_response($product_id, $is_deleted)
    {
        $cartCount = Cart_item::where('user_id', auth()->id())->count();
        $response = [
            'text' => [
                'elem' => "#cart_item_$product_id",
                'content' => $is_deleted ? get_phrase('Add to cart') : get_phrase('Added to cart'),
            ],
            'html' => [
                'elem' => "#offcanvasCart",
                'content' => view('frontend.cart.offcanvas_cart_body')->render(),
            ],
            'load' => [
                'elem' => "#shopping-cart-page",
                'content' => view('frontend.cart.shopping_cart_page_body')->render()
            ],
            'view' => [
                'elem' => "#header-cart-item-counter",
                'content' => $cartCount
            ],
            'fadeOut' => '#cart_offcanvas_item' . $product_id,
            'success' => $is_deleted ? get_phrase('Product removed from cart') : get_phrase('Product added to cart'),
        ];

        return json_encode($response);
    }

    // Cart ended


    // Coupon start
    function coupon_applied(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->firstOrNew(['code' => $request->coupon_code]);

        $response = [
            'html' => [
                'elem' => "#shopping-cart-page",
                'content' => view('frontend.cart.shopping_cart_page_body', ['coupon' => $coupon])->render()
            ]
        ];

        return json_encode($response);
    }
    // Coupon end





    // Review started
    function product_review_store(Request $request)
    {
        // Validate the input and return correct response
        $rules = [
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required', // Validate each file in the array
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }
        // End Validate the input and return correct response

        if (Review::where('product_id', $request->product_id)->where('user_id', auth()->id())->count() == 0) {
            $data['user_id'] = auth()->user()->id;
            $data['product_id'] = $request->product_id;
            $data['rating'] = $request->rating;
            $data['comment'] = $request->comment;
            $data['created_at'] = date('Y-m-d H:i:s');

            $review_id = Review::insertGetId($data);

            $average_rating = Review::where('product_id', $request->product_id)->avg('rating');
            Product::where('id', $request->product_id)->update(['average_rating' => $average_rating]);
        }

        // Process each uploaded file
        if ($request->hasFile('review_images')) {
            foreach ($request->file('review_images') as $file) {
                $file_data = [
                    'review_id' => $review_id, // Assuming $review_id is already set
                    'path' => app(CommonController::class)->upload($file, 'uploads/review/' . nice_file_name($file->getClientOriginalName(), $file->getClientOriginalExtension()), 1000), // Store file in the `storage/app/public/reviews` directory
                    'type' => $file->getMimeType(), // Get the MIME type (e.g., image/jpeg)
                    'name' => $file->getClientOriginalName(), // Get the original name of the file
                    'extension' => $file->getClientOriginalExtension(), // Get the file extension
                    'size' => $file->getSize(), // Get the file size in bytes
                ];

                // Insert file data into the database
                File::insert($file_data);
            }
        }


        $response['html'] = [
            'elem' => "#customer_reviews",
            'content' => view('frontend.product.customer_reviews', ['product_id' => $request->product_id])->render(),
        ];
        $response['success'] = get_phrase('Review added successfully');

        return json_encode($response);
    }

    function product_review_update(Request $request, $review_id)
    {
        $product_id = Review::where('id', $review_id)->value('product_id');
        // Validate the input and return correct response
        $rules = [
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required', // Validate each file in the array
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }
        // End Validate the input and return correct response

        $data['rating'] = $request->rating;
        $data['comment'] = $request->comment;
        $data['updated_at'] = date('Y-m-d H:i:s');
        Review::where('id', $review_id)->update($data);

        $average_rating = Review::where('product_id', $product_id)->avg('rating');
        Product::where('id', $product_id)->update(['average_rating' => $average_rating]);

        // Process each uploaded file
        if ($request->hasFile('review_images')) {
            if (count($request->file('review_images')) > 0) {
                foreach (File::where('review_id', $review_id)->get() as $review_file) {
                    remove_file($review_file->path);
                    File::where('id', $review_file->id)->delete();
                }
            }

            foreach ($request->file('review_images') as $file) {
                $file_data = [
                    'review_id' => $review_id, // Assuming $review_id is already set
                    'path' => app(CommonController::class)->upload($file, 'uploads/review/' . nice_file_name($file->getClientOriginalName(), $file->getClientOriginalExtension()), 1000), // Store file in the `storage/app/public/reviews` directory
                    'type' => $file->getMimeType(), // Get the MIME type (e.g., image/jpeg)
                    'name' => $file->getClientOriginalName(), // Get the original name of the file
                    'extension' => $file->getClientOriginalExtension(), // Get the file extension
                    'size' => $file->getSize(), // Get the file size in bytes
                ];

                // Insert file data into the database
                File::insert($file_data);
            }
        }


        $response['html'] = [
            'elem' => "#customer_reviews",
            'content' => view('frontend.product.customer_reviews', ['product_id' => $product_id])->render(),
        ];
        $response['success'] = get_phrase('Review updated successfully');

        return json_encode($response);
    }

    function product_review_helpful(Request $request)
    {
        $current_data = Review::where('id', $request->review_id)->value('helpful_marked_users');

        if ($current_data) {
            $current_data = json_decode($current_data, true);
            if (in_array(auth()->id(), $current_data)) {
                $current_data = array_diff($current_data, [auth()->id()]);
                $helped = false;
            } else {
                $current_data[] = auth()->id();
                $helped = true;
            }

            Review::where('id', $request->review_id)->update(['helpful_marked_users' => json_encode($current_data)]);
        } else {
            $current_data[] = auth()->id();
            Review::where('id', $request->review_id)->update(['helpful_marked_users' => json_encode($current_data)]);
            $helped = true;
        }


        if ($helped) {
            $response = [
                'text' => [
                    'elem' => "#helpful-$request->review_id",
                    'content' => count($current_data),
                ],
            ];
        } else {
            $response = [
                'text' => [
                    'elem' => "#helpful-$request->review_id",
                    'content' => count($current_data),
                ],
            ];
        }

        return json_encode($response);
    }
    // Review ended

    // Profile started
    function profile()
    {
        return view('frontend.profile.index');
    }

    function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => "required",
            'city_id' => "required|exists:cities,id",
            'address' => "required",
        ]);

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
        }

        User::where('id', auth()->id())->update($data);
        return redirect(route('customer.profile'))->with('success', get_phrase('Profile updated successfully'));
    }
    // Profile ended



    //Shipping addresses started
    function shipping_addresses()
    {
        $page_data['shipping_addresses'] = Shipping_address::where('user_id', auth()->id())->get();
        return view('frontend.shipping_addresses.index', $page_data);
    }

    function shipping_address_store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'country_code' => "required",
            'state_id' => "required|exists:states,id",
            'city_id' => "required|exists:cities,id",
            'address' => "required",
            'zip_code' => "required",
        ]);

        $data['title'] = $request->title;
        $data['user_id'] = auth()->user()->id;
        $data['country_id'] = Country::where('code', $request->country_code)->firstOrNew()->id;
        $data['state_id'] = $request->state_id;
        $data['city_id'] = $request->city_id;
        $data['zip_code'] = $request->zip_code;
        $data['address'] = $request->address;
        $data['is_primary'] = Shipping_address::where('user_id', auth()->id())->count() == 0 ? 1 : 0;
        $data['created_at'] = date('Y-m-d H:i:s');
        Shipping_address::insert($data);

        if ($request->return_route) {
            return redirect(route($request->return_route))->with('success', get_phrase('Shipping address added successfully'));
        } else {
            return redirect(route('customer.shipping_addresses'))->with('success', get_phrase('Shipping address added successfully'));
        }
    }

    function shipping_address_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'country_code' => "required",
            'state_id' => "required|exists:states,id",
            'city_id' => "required|exists:cities,id",
            'address' => "required",
            'zip_code' => "required",
        ]);

        $data['title'] = $request->title;
        $data['user_id'] = auth()->user()->id;
        $data['country_id'] = Country::where('code', $request->country_code)->firstOrNew()->id;
        $data['state_id'] = $request->state_id;
        $data['city_id'] = $request->city_id;
        $data['zip_code'] = $request->zip_code;
        $data['address'] = $request->address;
        $data['updated_at'] = date('Y-m-d H:i:s');
        Shipping_address::where('id', $id)->where('user_id', auth()->id())->update($data);

        if ($request->return_route) {
            return redirect(route($request->return_route))->with('success', get_phrase('Shipping address updated successfully'));
        } else {
            return redirect(route('customer.shipping_addresses'))->with('success', get_phrase('Shipping address updated successfully'));
        }
    }

    function shipping_address_primary($id)
    {
        Shipping_address::where('user_id', auth()->id())->update(['is_primary' => 0]);
        Shipping_address::where('id', $id)->where('user_id', auth()->id())->update(['is_primary' => 1]);
        return redirect()->back()->with('success', get_phrase('Shipping address set as primary successfully'));
    }

    function shipping_address_delete($id)
    {
        Shipping_address::where('id', $id)->where('user_id', auth()->id())->delete();
        return redirect(route('customer.shipping_addresses'))->with('success', get_phrase('Shipping address deleted successfully'));
    }
    //Shipping addresses ended


    // Account started
    function account(Request $request)
    {
        return view('frontend.account.index');
    }

    function account_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required|max:50',
            'new_password' => 'required|max:50',
            'confirm_password' => 'required|max:50',
        ]);

        $old_pass_check = Auth::attempt(['email' => auth()->user()->email, 'password' => $request->current_password]);

        if (!$old_pass_check) {
            return redirect(route('customer.account'))->with('error', 'Current password is wrong');
        }

        if ($request->new_password != $request->confirm_password) {
            return redirect(route('customer.account'))->with('error', 'Confirm password is not matched with the new password');
        }

        $password = Hash::make($request->new_password);
        User::where('id', auth()->user()->id)->update(['password' => $password]);

        return redirect(route('customer.account'))->with('success', get_phrase('Password changed successfully'));
    }
    // Account ended



    // Payment started


    function payments(Request $request)
    {
        $page_data['payments'] = Payment::where('user_id', Auth()->user()->id)->orderBy('id', 'desc')->paginate(10)->appends($request->query());
        return view('frontend.payments.index', $page_data);
    }

    function payment_invoice($payment_id)
    {
        $page_data['payment'] = Payment::find($payment_id);

        // If no payment found, return 404 or custom message
        if (!$page_data['payment']) {
            return abort(404, 'Payment not found');
        }


        // Decode order IDs from payment
        $order_ids = json_decode($page_data['payment']->order_id, true) ?? [];

        // Fetch orders with related data
        $page_data['orders'] = Order::with(['order_items.product', 'store'])->whereIn('id', $order_ids)->get();

        return view('frontend.payments.invoice', $page_data);
    }
    // Payment ended


    // Payment started
    function orders(Request $request)
    {
        $page_data['orders'] = Order::with(['order_updates'])->where('user_id', Auth()->user()->id)->orderBy('id', 'desc')->paginate(10)->appends($request->query());
        return view('frontend.orders.index', $page_data);
    }

    function order(Request $request, $order_id)
    {
        $page_data['order'] = Order::where('id', $order_id)->firstOrNew();
        return view('frontend.orders.order', $page_data);
    }

    function order_cancel_request(Request $request, $order_id)
    {
        // Validate input
        $request->validate([
            'message' => 'required',
        ]);

        // Prepare data
        $data = [
            'order_id'      => $order_id,
            'message'       => $request->message,
            'user_id'       => auth()->user()->id,
            'status'        => 'pending',         // Set default status
            'refund_status' => 'pending',         // Set default refund status
        ];

        // Handle images if any
        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/order_return'), $filename);
                $uploadedImages[] = $filename;
            }
        }

        $data['images'] = $uploadedImages; // Save as JSON array

        // Save to database
        Order_return::create($data);

        return redirect()->back()->with('success', get_phrase('Order return request submitted successfully'));
    }

    function user_messages($id = "", $thread_id = "")
    {

        $page_data['active'] = 'message';
        $user_id = auth()->user()->id;
        if ($id) {
            if ($thread_id) {
                $threads = Message_thread::where('id', $thread_id);

                // If thread not found, prevent null access
                if (!$threads->first()) {
                    return abort(404, 'Message thread not found');
                }


                $page_data['messages'] = Message::where('message_thread_id', $thread_id)->get();
            } 
            

            $page_data['thread_details'] = $threads->first();
            $page_data['thread_id'] = ($thread_id == '' && !$thread_id) ? $page_data['thread_details']->message_thread_id : $thread_id;

        } else {
            $page_data['thread_id'] = '';
        }
        $page_data['thread_id'] = '';

        $page_data['all_threads'] = Message_thread::where('user_one', $user_id)->orWhere('user_two', $user_id)->get();

        return view('frontend.message.index', $page_data);
    }

    public function send_message(Request $request, $thread_id)
    {
        $mes['message_thread_id'] = $thread_id;
        $mes['message'] = sanitize($request->message);
        $mes['sender_id'] = auth()->user()->id;
        $mes['receiver_id'] = auth()->user()->id;
        $mes['read_status'] = 0;
        $mes['created_at'] = Carbon::now();
        $mes['updated_at'] = Carbon::now();
        Message::insert($mes);
        return redirect()->back();
    }

    // Payment started

}
