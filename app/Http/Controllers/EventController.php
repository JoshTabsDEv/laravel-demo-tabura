<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function add_event(Request $request){
       $validate = $request->validate([
            "event_name"=> "required|string|max:255",
            "event_description"=> "required|string|max:255",
        ]);

        Event::create($validate);

        return redirect()->back();
    }
}
