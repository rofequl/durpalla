<?php

namespace App\Http\Controllers\frontend;

use App\request_ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class RequestController extends Controller
{
    public function RequestPost(Request $request){
        $request->validate([
            'location' => 'required',
            'location2' => 'required',
            'after' => 'required',
            'before' => 'required',
            'seat' => 'required',
        ]);

        if(Session::get('userId') == null && Session::get('phone') == null) {
            Session::flash('message', 'Submit this form Login first.');
            return view('frontend.request');
        }

        $insert = new request_ride;
        $insert->s_lat = $request->lat;
        $insert->s_lng = $request->lng;
        $insert->s_location = $request->location;
        $insert->e_lat = $request->lat2;
        $insert->e_lng = $request->lng2;
        $insert->e_location = $request->location2;
        $insert->after = $request->after;
        $insert->before = $request->before;
        $insert->seat = $request->seat;
        $insert->user_id = Session('userId');
        $insert->save();

        return view('frontend.request_congrates');
    }

    public function RequestNext(){
        $ride = request_ride::where('user_id',Session('userId'))->get();
        return view('frontend.request2',compact('ride'));
    }
}
