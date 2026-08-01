<?php
// import facade 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist_item;

//All common helper functions

function get_category_params($category) {
    $route_params = [];

    $current = $category;
    while ($current->slug && $current->level >= 0) {
        array_unshift($route_params, $current->slug); // Prepend slug to maintain hierarchy
        $current = $current->parent;
    }

    return $route_params;
}


if (!function_exists('get_photo')) {
    function get_photo($type, $identifier)
    { // type is the flag to realize whether it is course, category or user image. For course, user image Identifier is id but for category Identifier is image name
        if ($type == 'user_image') {
            if (file_exists('public/' . $identifier) && $identifier != "") {
                return url('public/' . $identifier);
            } else {
                return url('public/assets/upload/user/placeholder/placeholder.png');
            }
        } 
        elseif ($type == 'product_thumbnail') {
            if (file_exists('public/' . $identifier) && $identifier != "") {
                return url('public/' . $identifier);
            } else {
                return url('public/uploads/product/thumbnail/placeholder/placeholder.png');
            }
        } 
        elseif ($type == 'category_icon') {
            if (file_exists('public/' . $identifier) && $identifier != "") {
                return url('public/' . $identifier);
            } else {
                return url('public/uploads/category/icon/placeholder/placeholder.png');
            }
        }
    }

}

if (! function_exists('get_user_info')) {
    function get_user_info($user_id = "")
    {
        $user_info = App\Models\User::where('id', $user_id)->firstOrNew();
        return $user_info;
    }
}


function get_phrase($phrase = '', $value_replace = array())
{
    $default_lan_slug = 'english';
    $active_lan_id = session('active_lan_id') ?? DB::table('languages')->first()->id;
    if(session('active_lan_id')){
        $active_lan_id = session('active_lan_id');
    }elseif(get_settings('active_lan_id')){
        $active_lan_id = get_settings('active_lan_id');
    }else{
        $active_lan_id = DB::table('languages')->first()->id;
    }
    
    $lan_phrase    = DB::table('language_phrases')->where('language_id', $active_lan_id)->where('phrase', $phrase)->first();
    if ($lan_phrase) {
        $translated = $lan_phrase->translated;
    } else {
        $translated  = $phrase;
        $default_lan = DB::table('languages')->where('slug', $default_lan_slug)->first();
        if (DB::table('language_phrases')->where('language_id', $default_lan->id)->where('phrase', $phrase)->count() == 0) {
            DB::table('language_phrases')->insert(['language_id' => $default_lan->id, 'phrase' => $phrase, 'translated' => $translated]);
        }
    }

    if (!is_array($value_replace)) {
        $value_replace = array($value_replace);
    }
    foreach ($value_replace as $replace) {
        $translated = preg_replace('/____/', $replace, $translated, 1); // Replace one placeholder at a time
    }

    return $translated;
}


//All common helper functions
if (!function_exists('get_image')) {
    function get_image($url = null, $optimized = false)
    {
        if ($url == null) {
            return asset('uploads/system/placeholder.png');
        }

        // If the value of URL is from an online URL
        if (str_contains($url, 'http://') && str_contains($url, 'https://')) {
            return $url;
        }

        $url_arr = explode('/', $url);
        // File name & Folder path
        $file_name = end($url_arr);
        $path      = str_replace($file_name, '', $url);

        //Optimized image url
        $optimized_image = $path . 'optimized/' . $file_name;

        if (!$optimized) {
            if (is_file(public_path($url)) && file_exists(public_path($url))) {
                return asset($url);
            } else {
                return asset($path . 'placeholder/placeholder.png');
            }
        } else {
            if (is_file(public_path($optimized_image)) && file_exists(public_path($optimized_image))) {
                return asset($optimized_image);
            } else {
                return asset($path . 'placeholder/placeholder.png');
            }
        }
    }
}

// Global Settings
if (! function_exists('remove_file')) {
    function remove_file($url = null)
    {
        $url       = public_path($url);
        $url       = str_replace('optimized/', '', $url);
        $url_arr   = explode('/', $url);
        $file_name = $url_arr[count($url_arr) - 1];

        if (is_file($url) && file_exists($url) && ! empty($file_name)) {
            unlink($url);

            $url = str_replace($file_name, 'optimized/' . $file_name, $url);
            if (is_file($url) && file_exists($url)) {
                unlink($url);
            }
        }
    }
}

if (!function_exists('upload_description_images')) {
    function upload_description_images($description = "", $path = "")
    {
        // Find all the image tags in the Summernote content
        preg_match_all('/<img[^>]+src="data:image\/([a-zA-Z0-9]+);base64,([^"]+)"/', $description, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            // Define the path to where you want to save the image
            $imagePath = 'public/' . $path . '/' . time() . random(20) . '.' . $match[1];

            if (str_contains($match[0], 'data:image')) {
                $image_tag = str_replace('data:image/' . $match[1] . ';base64,' . $match[2], asset($imagePath), $match[0]);
                $description = str_replace($match[0], $image_tag, $description);

                file_put_contents($imagePath, base64_decode($match[2]));
            }
        }
        return $description;
    }
}

if (!function_exists('remove_description_images')) {
    function remove_description_images($description = "")
    {
        // Find all the image tags in the Summernote content
        preg_match_all('/<img[^>]+>/i', $description, $matches);
        foreach ($matches[0] as $match) {
            //$match this is image tag
            preg_match('/src=[\'"]([^\'"]+)[\'"]/i', $match, $srcMatches);
            $image_path_arr = explode('uploads/', $srcMatches[1]);
            $image_path = 'uploads/' . $image_path_arr[1];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }
}

if (!function_exists('script_checker')) {
    function script_checker($string = '', $convert_string = true)
    {

        if ($convert_string == true) {
            $string = nl2br(htmlspecialchars($string));
        } else {
            //make script to string
            $string = str_replace("<script>", "&lt;script&gt;", $string);
            $string = str_replace("</script>", "&lt;/script&gt;", $string);

            //removing <script> tags
            $string = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $string);
            $string = preg_replace("/[<][^<]*script.*[>].*[<].*[\/].*script*[>]/i", "", $string);

            //removing inline js events
            $string = preg_replace("/([ ]on[a-zA-Z0-9_-]{1,}=\".*\")|([ ]on[a-zA-Z0-9_-]{1,}='.*')|([ ]on[a-zA-Z0-9_-]{1,}=.*[.].*)/", "", $string);
            //removing inline js events
            $string = preg_replace('/(<.+?)(?<=\s)on[a-z]+\s*=\s*(?:([\'"])(?!\2).+?\2|(?:\S+?\(.*?\)(?=[\s>])))(.*?>)/i', "$1 $3", $string);

            //removing inline js
            $string = preg_replace("/([ ]href.*=\".*javascript:.*\")|([ ]href.*='.*javascript:.*')|([ ]href.*=.*javascript:.*)/i", "", $string);
        }

        return $string;
    }
}

if (!function_exists('date_formatter')) {
    function date_formatter($strtotime = "", $format = "")
    {
        if ($strtotime && !is_numeric($strtotime)) {
            $strtotime = strtotime($strtotime);
        } elseif (!$strtotime) {
            $strtotime = time();
        }

        if ($format == "") {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime);
        }

        if ($format == 1) {
            return date('D', $strtotime) . ', ' . date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime);
        }

        if ($format == 2) {
            $time_difference = time() - $strtotime;
            if ($time_difference <= 10) {
                return get_phrase('Just now');
            }
            //864000 = 10 days
            if ($time_difference > 864000) {
                return date_formatter($strtotime, 3);
            }

            $condition = array(
                12 * 30 * 24 * 60 * 60    => get_phrase('year'),
                30 * 24 * 60 * 60        =>  get_phrase('month'),
                24 * 60 * 60            =>  get_phrase('day'),
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
            );

            foreach ($condition as $secs => $str) {
                $d = $time_difference / $secs;
                if ($d >= 1) {
                    $t = round($d);
                    return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ' . get_phrase('ago');
                }
            }
        }

        if ($format == 3) {
            $date = date('d', $strtotime);
            $date .= ' ' . date('M', $strtotime);

            if (date('Y', $strtotime) != date('Y', time())) {
                $date .= date(' Y', $strtotime);
            }

            $date .= ' ' . get_phrase('at') . ' ';
            $date .= date('h:i a', $strtotime);
            return $date;
        }

        if ($format == 4) {
            return date('d', $strtotime) . ' ' . date('M', $strtotime) . ' ' . date('Y', $strtotime) . ', ' . date('h:i:s A', $strtotime);
        }
    }
}




if (!function_exists('user')) {
    function user($data){
        return Auth::user()[$data]??'';
    }
}



if (!function_exists('slugify')) {
    function slugify($string)
    {
        // Normalize the string to NFC (Normalization Form C)
        $string = Normalizer::normalize(trim($string), Normalizer::FORM_C);

        // Replace all non-letter/number characters (like &, %, etc.) with a single dash
        $slug = preg_replace('/[^\p{L}\p{M}\p{N}]+/u', '-', $string);

        // Remove leading/trailing dashes
        $slug = trim($slug, '-');

        // Replace multiple consecutive dashes with a single one (just in case)
        $slug = preg_replace('/-+/', '-', $slug);

        // Convert to lowercase
        return mb_strtolower($slug, 'UTF-8');
    }
}


if (!function_exists('removeScripts')) {
    function removeScripts($text)
    {
        if (!$text) return;

        // Step 1: Remove dangerous tags like <script> and <iframe>
        $pattern_script = '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/is';
        $cleanText = preg_replace($pattern_script, '', $text);

        // Remove iframe, object, embed, and other potentially harmful tags
        $pattern_dangerous_tags = '/<(iframe|object|embed|applet|meta|link|style|base|form)\b[^<]*(?:(?!<\/\1>)<[^<]*)*<\/\1>/is';
        $cleanText = preg_replace($pattern_dangerous_tags, '', $cleanText);

        // Step 2: Remove inline event handlers (e.g., onclick, onload)
        $pattern_inline = '/\s*on\w+="[^"]*"/i'; // Match inline event handlers with double quotes
        $cleanText = preg_replace($pattern_inline, '', $cleanText);

        $pattern_inline_single = '/\s*on\w+=\'[^\']*\'/i'; // Match inline event handlers with single quotes
        $cleanText = preg_replace($pattern_inline_single, '', $cleanText);

        // Step 3: Remove JavaScript URIs (javascript: protocol)
        $pattern_js_uri = '/\s*href="javascript:[^"]*"/i';
        $cleanText = preg_replace($pattern_js_uri, '', $cleanText);

        // Step 4: Optional - Allow specific HTML tags and entities
        // You can modify the allowed HTML tags here
        $allowed_tags = '<b><i><strong><em><p><a><ul><ol><li><br><u><img><span><div>';
        $cleanText = strip_tags($cleanText, $allowed_tags);

        // Output the sanitized HTML
        return $cleanText;
    }
}


if (!function_exists('ellipsis')) {
    function ellipsis($long_string, $max_character = 30)
    {
        $long_string = strip_tags($long_string);
        $short_string = strlen($long_string) > $max_character ? mb_substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}



// RANDOM NUMBER GENERATOR FOR ELSEWHERE
if (!function_exists('random')) {
    function random($length_of_string, $lowercase = false)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        $randVal = substr(str_shuffle($str_result), 0, $length_of_string);
        if ($lowercase) {
            $randVal = strtolower($randVal);
        }
        return $randVal;
    }
}


if (!function_exists('get_settings')) {
    function get_settings($type = "", $decode = false)
    {
        $value = DB::table('settings')->where('type', $type)->value('description');
        if ($decode === true) {
            return json_decode($value, true);
        } else {
            return $value;
        }
    }
}

if (!function_exists('get_frontend_settings')) {
    function get_frontend_settings($type = "", $decode = false)
    {
        $value = DB::table('frontend_settings')->where('type', $type)->value('description');
        if ($decode === true) {
            return json_decode($value, true);
        } else {
            return $value;
        }
    }
}

if (!function_exists('nice_file_name')) {
    function nice_file_name($name, $ext)
    {
        return slugify($name) . '-' . time() . '.' . $ext;
    }
}


if (!function_exists('currency')) {
    function currency($price = false)
    {
        $currency_id = get_settings('system_currency');
        $currency_position = get_settings('currency_position') ?? 'left';

        $symbol = DB::table('currencies')->where('id', $currency_id)->value('symbol') ?? '$';
        if (!is_numeric($price)) {
            $price = 0;
        }
        $formatted_price = number_format((float)$price, 2);
        if ($currency_position == 'left') {
            return $symbol . ' ' . $formatted_price;
        } else {
            return $formatted_price . ' ' . $symbol;
        }
    }
}

if (!function_exists('getCurrentLocation')) {
    function getCurrentLocation($lat = 0, $long = 0)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://nominatim.openstreetmap.org/reverse?format=json&lat=$lat&lon=$long&zoom=18",
            CURLOPT_VERBOSE => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'User-Agent: Creativeitem Workplace'
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);


        if ($response) {
            $location = json_decode($response, true)['display_name'];
            $location_arr = explode(",", $location);
            $name = null;
            foreach ($location_arr as $key => $location_name) {
                if ($key == 4) break;
                if ($key > 0) {
                    $name .= ',' . $location_name;
                } else {
                    $name .= $location_name;
                }
            }
            return $name;
        } else {
            return null;
        }
    }
}

if (!function_exists('check_order_process_status')) {
    function check_order_process_status($order_id = "", $status_id = "")
    {
        $exists = DB::table('order_updates')
            ->where('order_id', $order_id)
            ->where('order_status_id', $status_id)
            ->exists();

        return $exists;
    }
}


//For Mobile API

function formatProduct($product)
{
    return [
        'id' => $product->id,
        'creator_id' => $product->user_id,
        'creator_name' => $product->user->name ?? null,

        'category_id' => $product->category_id,
        'category_title' => $product->category->title ?? null,

        'store_id' => $product->store_id,
        'store_name' => $product->store->name ?? null,

        'brand_id' => $product->brand_id,
        'brand_name' => $product->brand->name ?? null,

        'status' => $product->status,
        'title' => $product->title,
        'slug' => $product->slug,
        'tags' => $product->tags,
        'label' => $product->label,
        'quality_label' => $product->quality_label,
        'summary' => $product->summary,
        'description' => $product->description,
        'average_rating' => $product->average_rating,
        'price' => $product->price,
        'vat_type' => $product->vat_type,
        'vat_value' => $product->vat_value,
        'shipping_cost' => $product->shipping_cost,
        'unit' => $product->unit,
        'total_stock' => $product->total_stock,

        'thumbnail' => $product->thumbnail ? URL::to('public/' . $product->thumbnail) : null,
        'banner' => $product->banner ? URL::to('public/' . $product->banner) : null,

        'created_at' => $product->created_at,
        'updated_at' => $product->updated_at,
    ];
}

if (! function_exists('sanitize')) {
    function sanitize($text)
    {
        $text = removeScripts($text);
        $text = strip_tags($text);
        return str_replace('&amp;', '&', $text);
    }
}

if (!function_exists('get_payment_settings')) {
    function get_payment_settings($identifier = "", $decode = false)
    {
        $value = DB::table('payment_gateways')->where('identifier', $identifier)->value('keys');
        if ($decode === true) {
            return json_decode($value, true);
        } else {
            return $value;
        }
    }
}

if (!function_exists('get_store_by_owner_id')) {
    function get_store_by_owner_id($user_id = "")
    {
        $store = DB::table('stores')
            ->where('user_id', $user_id)
            ->first(); // You can use get() if you expect multiple

        return $store;
    } 
}



if (!function_exists('getSoldProgress')) {
    function getSoldProgress($productId)
    {
        $totalStock = DB::table('products')
            ->where('id', $productId)
            ->value('total_stock');

        if (!$totalStock || $totalStock <= 0) {
            return 0; 
        }
        $soldQuantity = DB::table('order_items')
            ->where('product_id', $productId)
            ->sum('quantity');

        // calculate sold percentage
        $progress = ($soldQuantity / $totalStock) * 100;
        // max 100%
        return round(min($progress, 100));
    }
}

if (!function_exists('getSoldQuantity')) {
    function getSoldQuantity($productId)
    {
        return DB::table('order_items')
            ->where('product_id', $productId)
            ->sum('quantity');
    }
}

if (!function_exists('availiblty')) {
    function availiblty($productId)
    {
        // Get total stock from products table
        $product = DB::table('products')->where('id', $productId)->first();

        if (!$product) {
            return 'Stock Not Found';
        }

        // Get total sold quantity
        $soldQuantity = DB::table('order_items')
            ->where('product_id', $productId)
            ->sum('quantity');

        // Calculate available stock
        $availableStock = $product->total_stock - $soldQuantity;

        // Return availability status
        if ($availableStock > 0) {
            return 'In Stock (' . $availableStock . ' available)';
        } else {
            return 'Stock Out';
        }
    }
}


if(!function_exists('seo'))
{
    function seo($current_route = "", $item_id ='')
    {
        $seo = array();

        // Setting default value
        $seo['meta_title'] = '';
        $seo['meta_description'] = '';
        $seo['meta_keywords'] = '';
        $seo['meta_robot'] = '';
        $seo['canonical_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $seo['custom_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $seo['og_title'] = '';
        $seo['og_description'] = '';
        $seo['og_image'] = '';
        $seo['json_ld'] = '';

        $seo['meta_title'] = App\Models\Seo_field::firstWhere('route', $current_route)->meta_title ?? '';
        $seo['meta_description'] = App\Models\Seo_field::firstWhere('route', $current_route)->meta_description ?? '';
        $seo['meta_keywords'] = App\Models\Seo_field::firstWhere('route', $current_route)->meta_keywords ?? '';
        $seo['canonical_url'] = App\Models\Seo_field::firstWhere('route', $current_route)->canonical_url ?? '';
        $seo['custom_url'] = App\Models\Seo_field::firstWhere('route', $current_route)->custom_url ?? '';
        $seo['meta_robot'] = App\Models\Seo_field::firstWhere('route', $current_route)->meta_robot ?? '';
        $seo['og_title'] = App\Models\Seo_field::firstWhere('route', $current_route)->og_title ?? '';
        $seo['og_description'] = App\Models\Seo_field::firstWhere('route', $current_route)->og_description ?? '';
        $seo['og_image'] = url('public/uploads/og-image/'.App\Models\Seo_field::firstWhere('route', $current_route)->og_image  ?? '');
        $seo['json_ld'] = App\Models\Seo_field::firstWhere('route', $current_route)->json_ld ?? '';

        return (object) $seo; // Cast the array to an object
    }
}

if(!function_exists('get_all_child_category_ids'))
{
    function get_all_child_category_ids($category_id)
    {
        $category_ids[] = $category_id;

        $category = App\Models\Category::where('id', $category_id)->first();
        foreach ($category->childs as $child) {
            if ($child->childs->count() > 0) {
                $category_ids = array_merge($category_ids, get_all_child_category_ids($child->id));
            } else {
                $category_ids[] = $child->id;
            }
        }

        return $category_ids;
    }
}

if (!function_exists('wishlist_class')) {
    function wishlist_class($product_id)
    {
        if (auth()->check()) {
            $exists = Wishlist_item::where('user_id', auth()->id())
                              ->where('product_id', $product_id)
                              ->exists();
            return $exists ? 'active' : '';
        }
        return '';
    }
}



// get Vendor total revenue
if (! function_exists('vendor_total_revenue')) {
    function vendor_total_revenue($user_id = null)
    {
        $id = $user_id ?? auth()->user()->id;

        return App\Models\Store::where('user_id', $id)
            ->sum('vendor_revenue');
    }
}



// get Vendor total payout
if (! function_exists('vendor_total_payout')) {
    function vendor_total_payout($user_id = null)
    {
        $id = $user_id ?? auth()->user()->id;

        return App\Models\Payout::where([
                'user_id' => $id,
                'status'  => 1 // approved/paid
            ])->sum('amount');
    }
}


// get Vendor available balance
if (! function_exists('vendor_available_balance')) {
    function vendor_available_balance($user_id = null)
    {
        $id = $user_id ?? auth()->user()->id;

        $total_revenue = vendor_total_revenue($id);
        $total_payout  = vendor_total_payout($id);

        return max(0, $total_revenue - $total_payout);
    }
}

// if (! function_exists('instructor_available_balance')) {
//     function instructor_available_balance($user_id = null)
//     {
//         $instructor_id = $user_id ?? auth()->user()->id;

//         $course_revenue = DB::table('payment_histories')
//             ->join('courses', 'courses.id', '=', 'payment_histories.course_id')
//             ->where('courses.user_id', $instructor_id)
//             ->sum('payment_histories.instructor_revenue');

//         $ebook_revenue = DB::table('ebook_purchases')
//             ->join('ebooks', 'ebooks.id', '=', 'ebook_purchases.ebook_id')
//             ->where('ebooks.user_id', $instructor_id)
//             ->sum('ebook_purchases.instructor_revenue');

//         $bundle_revenue = DB::table('bundle_payments')
//             ->join('course_bundles', 'course_bundles.id', '=', 'bundle_payments.bundle_id')
//             ->where('course_bundles.user_id', $instructor_id)
//             ->sum('bundle_payments.instructor_revenue');

//         $total_revenue = $course_revenue + $ebook_revenue + $bundle_revenue;
//         $total_payout = DB::table('payouts')->where('user_id', $instructor_id)->where('status', 1)->sum('amount');
//         return $total_revenue - $total_payout;
//     }
// }