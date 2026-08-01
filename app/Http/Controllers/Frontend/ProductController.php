<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index($slug = ""){
        $page_data['product'] = Product::where('status', 1)->where('slug', $slug)->firstOrNew();
        return view('frontend.product.index', $page_data);
    }
}
