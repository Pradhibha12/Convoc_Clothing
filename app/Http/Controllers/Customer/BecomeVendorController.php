<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BecomeVendorController extends Controller
{
    public function index()
    {
        $view_path = 'frontend.become_vendor.index';
        return view($view_path);
    }

    public function store(Request $request)
    {
        // check application exists or not
        if (Application::where('user_id', auth()->user()->id)->exists()) {
            Session::flash('error', get_phrase('Your request is in process. Please wait for admin to response.'));
            return redirect()->route('customer.become.vendor');
        }

        $rules = [
            'phone' => 'required',
            'store_name' => 'required',
            'store_description' => 'required',
        ];

        // validate data
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // process data
        $application['user_id'] = auth()->user()->id;
        $application['phone'] = $request->phone;
        $application['store_name'] = $request->store_name;
        $application['store_description'] = $request->store_description;

        // store application
        Application::create($application);

        Session::flash('success', get_phrase('Your application has been submitted.'));
        return redirect()->back();
    }
}
