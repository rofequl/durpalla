<?php

namespace App\Http\Controllers\backend;

use App\post_ride;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackingController extends Controller
{
    public function TrackingRide(Request $request){
        $ride = stopover::where('tracking',$request->tracking)->first();
        if ($ride){
            $postRide = post_ride::find($ride->post_id);
            return view('backend.tracking',compact('ride','postRide'));
        }else{
            abort(404, 'Invalid Tracking Number');
        }
    }
}
