<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function contact_us(Request $request)
    {
        return view('frontend.contact.contact_us');
    }

    function contact_us_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        // $data['ip_address'] = $request->ip();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        Contact::create($data);
        return redirect(route('contact_us'))->with('success', 'Contact request send successfully');
    }
}
