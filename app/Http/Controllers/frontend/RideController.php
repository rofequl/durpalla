<?php

namespace App\Http\Controllers\frontend;

use App\post_ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RideController extends Controller
{

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }



    public function Ride()
    {

        $ride = post_ride::all();

        $group = [];
        foreach ($ride as $item)  {
            if (!in_array($item->departure, $group)) {
                array_push($group,$item->departure);
            }

        }
        $date_sort = function ($a, $b) {return strtotime($a) - strtotime($b);};
        usort($group, $date_sort);

        return view('frontend.all_ride', compact('ride','group'));
    }

    public function FindRide()
    {
        $show = 3;
        return view('frontend.find_ride',compact('show'));
    }

    public function FindRideSearch(Request $request)
    {

        $ride = post_ride::where('departure', '>=', date('m-d-Y'))->get();




        $userLat = $request->lat;
        $userLng = $request->lng;
        $userLoca = $request->location;
        $userLat2 = $request->lat2;
        $userLng2 = $request->lng2;
        $userLoca2 = $request->location2;
        $after = $request->after;
        $before = $request->before;
        $seat = $request->seat;
        $count = 1;
        foreach ($ride as $rides) {
            if (distance($rides->s_lat, $rides->s_lng, $userLat, $userLng, "K") < 10 && strtotime($rides->departure) >= strtotime("now") && $rides->seat >= $seat) {
                $count++;
            }
        }

        if ($count > 1){
            $show = 1;
        }else{
            $show = 2;
        }

        return view('frontend.find_ride', compact('ride', 'userLat', 'userLng', 'seat', 'userLat2', 'userLng2'
            , 'userLoca', 'userLoca2', 'after', 'before','show'));

    }
}
