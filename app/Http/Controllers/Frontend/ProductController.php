<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index($slug = ""){
        $product = Product::where('status', 1)->where('slug', $slug)->first();
        if (!$product && (str_contains($slug, 'polo') || str_contains($slug, 'corporate'))) {
            $product = Product::find(582);
        }
        if (!$product) {
            abort(404);
        }
        $page_data['product'] = $product;
        return view('frontend.product.index', $page_data);
    }
}
