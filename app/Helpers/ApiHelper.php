<?php

// import facade 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

//All common helper functions

if (!function_exists('api_get_photo')) {
    function api_get_photo($type, $identifier)
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

if (!function_exists('api_get_products')) {
    function api_get_products($products = [])
    {
        foreach ($products as $key => $product) {
            $price = $product->price;
            $discount_price = null;

            $products[$key]->requirements = json_decode($product->requirements) == null ? [] : json_decode($product->requirements);

            // Check discount
            if ($product->discount->discount_type === 'percentage') {
                $discount_price = $price - (($price / 100) * $product->discount->discount_value);
            } elseif ($product->discount->discount_type === 'flat') {
                $discount_price = $price - $product->discount->discount_value;
            }

            $products[$key] = (object) [];

            $products[$key]->id             = $product->id;
            $products[$key]->thumbnail_url  = $product->thumbnail_url;
            $products[$key]->title          = $product->title;
            $products[$key]->price          = $price;
            $products[$key]->discount_price = $discount_price;
            $products[$key]->currency_code  = currency();
            $products[$key]->rating         = $product->average_rating;
            $products[$key]->total_ratings  = $product->reviews->count();

        }

        return $products;
    }
}


if (!function_exists('api_get_product_reviews')) {
    function api_get_product_reviews($product_id = "")
    {
       // Fetch reviews with user and files
        $reviews = \App\Models\Review::with(['user'])
            ->where('product_id', $product_id)
            ->get();

        $result = [];

        foreach ($reviews as $review) {
            // decode helpful_marked_users column
            $helpfulUsers = is_string($review->helpful_marked_users)
                ? json_decode($review->helpful_marked_users, true)
                : $review->helpful_marked_users;

            if (!is_array($helpfulUsers)) {
                $helpfulUsers = [];
            }
            
            $result[] = (object) [
                'id'       => $review->id,
                'user'     => (object) [
                    'id'       => $review->user?->id,
                    'name'     => $review->user?->name,
                    'avatar'   => api_get_photo('user_image', $review->user?->avatar_url) ?? null,
                ],
                'rating'   => $review->rating,
                'comment'  => $review->comment,
                'files'      => $review->files->map(function ($file) {
                    return (object) [
                        'id'        => $file->id,
                        'path'      => url('public/'.$file->path),
                        'type'      => $file->type,
                        'name'      => $file->name,
                        'extension' => $file->extension,
                        'size'      => $file->size,
                    ];
                }),
                'helpful_count' => count($helpfulUsers), 
                'created_at' => $review->created_at->format('d M, Y'),
            ];
        }

        return $result; 
    }
}