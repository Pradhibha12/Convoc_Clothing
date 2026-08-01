<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index(){
        $page_data['events'] = Event::where('status', 1)->paginate(12);
        return view('frontend.event.index', $page_data);
    }

    function event_details($slug = ""){

        // Fetch the details of the event using the slug
        $page_data['event_details'] = Event::where('slug', $slug)->firstOrFail();

        return view('frontend.event.event_details', $page_data);
    }
}
