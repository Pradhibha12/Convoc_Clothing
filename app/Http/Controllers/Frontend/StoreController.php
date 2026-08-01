<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function index(){
        $page_data['stores'] = Store::with('products.reviews')->paginate(12);
        return view('frontend.store.index', $page_data);
    }

    function store_details($slug = ""){
        $page_data['store_details'] = Store::where('slug', $slug)->firstOrFail();
        return view('frontend.store.store_details', $page_data);
    }

    function store_location($slug = ""){
        $page_data['product'] = Store::all();
        return view('frontend.store.store_location', $page_data);
    }
}
