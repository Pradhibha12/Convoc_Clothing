<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order_return;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function order_return_requests(Request $request)
    {
        $page_data['order_returns'] = Order_return::where('user_id', Auth()->user()->id)->paginate(10)->appends($request->query());
        return view('frontend.order_return.return_requests', $page_data);
    }

    function order_return_details(Request $request, $id = "") 
    {
        $page_data['request_details'] = Order_return::where('id', $id)->firstOrFail();
        return view('frontend.order_return.return_details', $page_data);
    }
}
