<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter_subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    function update(Request $request){
        $response = [];

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if(Newsletter_subscriber::where('email', $request->email)->count() == 0){
                Newsletter_subscriber::insert(['email' => $request->email]);
            }
            $response['success'] = get_phrase('Subscribed successfully');
        }else{
            $response['error'] = get_phrase('Please enter a valid email address');
        }

        echo json_encode($response);
    }







}
