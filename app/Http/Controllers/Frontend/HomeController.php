<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist_item;
use App\Models\Review;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    function index()
    {
        // $page_data['categories'] = Category::where('is_featured', 1)->get();
        $page_data['categories'] = Category::get();
        $page_data['popular_products'] = Product::where('status', 1)->latest()->take(4)->get();
        $page_data['latest_products'] = Product::where('status', 1)->latest()->take(4)->get();
        $page_data['blogs'] = Blog::where('status', 1)->get();
        
        $page_data['reviews'] = Review::where('rating', 5)->latest()->take(10)->get();

        return view('frontend.home.index', $page_data);
    }

    function customer_feedback() {
        return view('frontend.feedback.index');
    }

    function switch_language(Request $request){
        session(['active_lan_id' => $request->active_lan_id]);
        return redirect()->back();
    }


     public function wishlist_toggle(Request $request)
    {
        if (!Auth::check()) {
        return response()->json(['status' => 'error', 'message' => 'Please login first.']);
    }

        $productId = $request->product_id;
        $userId = Auth::id();

        // Check if exists
        $wishlist = Wishlist_item::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Wishlist_item::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }


    
    public function track_order(Request $request)
    {
        $order = null;
        $searched = false;

        if ($request->filled('order_id') && $request->filled('phone_or_email')) {
            $searched = true;
            $order_id_input = $request->order_id;
            // Strip '#' prefix if typed by user
            $order_id_clean = ltrim($order_id_input, '#');
            $db_order_id = intval($order_id_clean) - 100;

            $phone_or_email = trim($request->phone_or_email);
            $numeric_phone = preg_replace('/[^0-9]/', '', $phone_or_email);

            $order = \App\Models\Order::where('id', $db_order_id)
                ->whereHas('user', function($query) use ($phone_or_email, $numeric_phone) {
                    $query->where('email', $phone_or_email)
                          ->orWhere('phone', $phone_or_email);
                    if (!empty($numeric_phone)) {
                        $query->orWhere('phone', 'like', '%' . $numeric_phone . '%');
                    }
                })
                ->first();
        }

        return view('frontend.orders.track', compact('order', 'searched'));
    }

    public function zipcode_lookup($zip_code)
    {
        $stateName = null;
        $cityName = null;
        $countryCode = 'IN';

        // 1. Try India Postal Pincode API first if 6 digits
        if (preg_match('/^[0-9]{6}$/', $zip_code)) {
            $response = \Illuminate\Support\Facades\Http::get("https://api.postalpincode.in/pincode/{$zip_code}");
            if ($response->successful()) {
                $data = $response->json();
                if (!empty($data) && isset($data[0]['Status']) && $data[0]['Status'] === 'Success') {
                    $postOffices = $data[0]['PostOffice'];
                    if (!empty($postOffices)) {
                        $stateName = $postOffices[0]['State'];
                        $cityName = $postOffices[0]['District'] ?? $postOffices[0]['Name'];
                        $countryCode = 'IN';
                    }
                }
            }
        }

        // 2. Fallback to GeoNames API for global lookup
        if (!$stateName) {
            $geoResponse = \Illuminate\Support\Facades\Http::get("http://api.geonames.org/postalCodeSearchJSON", [
                'postalcode' => $zip_code,
                'maxRows' => 1,
                'username' => 'wsplhost'
            ]);

            if ($geoResponse->successful()) {
                $geoData = $geoResponse->json();
                if (!empty($geoData['postalCodes'])) {
                    $postalInfo = $geoData['postalCodes'][0];
                    $stateName = $postalInfo['adminName1'] ?? null;
                    $cityName = $postalInfo['placeName'] ?? $postalInfo['adminName2'] ?? null;
                    $countryCode = $postalInfo['countryCode'] ?? 'IN';
                }
            }
        }

        // 3. Database matching and creation
        if ($stateName) {
            // Find or select matching country
            $country = \App\Models\Country::where('code', $countryCode)->first();
            $countryId = $country ? $country->id : 1;

            // Search matching state in database
            $state = \App\Models\State::where('name', 'like', "%{$stateName}%")->first();
            
            // If state doesn't exist, create it!
            if (!$state && !empty($stateName)) {
                $state = \App\Models\State::create([
                    'country_id' => $countryId,
                    'name' => $stateName
                ]);
            }

            $city = null;
            if ($state) {
                $city = \App\Models\City::where('state_id', $state->id)
                    ->where('name', 'like', "%{$cityName}%")
                    ->first();
                    
                // If city doesn't exist, dynamically insert it!
                if (!$city && !empty($cityName)) {
                    $city = \App\Models\City::create([
                        'state_id' => $state->id,
                        'country_id' => $state->country_id,
                        'name' => $cityName
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'state_id' => $state ? $state->id : null,
                'state_name' => $stateName,
                'city_id' => $city ? $city->id : null,
                'city_name' => $cityName,
                'country_code' => $countryCode
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'Zip code not found']);
    }
}
