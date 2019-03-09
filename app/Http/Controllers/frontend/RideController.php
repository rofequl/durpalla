<?php

namespace App\Http\Controllers\frontend;

use App\post_ride;
use App\ride_setting;
use App\stopover;
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

        $ride = stopover::all();

        $group = [];
        foreach ($ride as $item) {
            if (!in_array($item->date, $group)) {
                array_push($group, $item->date);
            }

        }
        $date_sort = function ($a, $b) {
            return strtotime($a) - strtotime($b);
        };
        usort($group, $date_sort);

        return view('frontend.all_ride', compact('ride', 'group'));
    }

    public function FindRide()
    {
        $show = 3;
        return view('frontend.find_ride', compact('show'));
    }

    public function FindRideSearch(Request $request)
    {

        $request->validate([
            'location' => 'required',
            'location2' => 'required',
            'after' => 'required',
            'before' => 'required',
        ]);

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

        $stopover = stopover::all();

        $satting = ride_setting::first();

        foreach ($stopover as $stopovers) {
            $s_location = PostRideAddress($stopovers->post_id,$stopovers->going,'location');
            $e_location = PostRideAddress($stopovers->post_id,$stopovers->target,'location');
            $s_lat = PostRideAddress($stopovers->post_id,$stopovers->going,'lat');
            $s_lng = PostRideAddress($stopovers->post_id,$stopovers->going,'lng');
            $e_lat = PostRideAddress($stopovers->post_id,$stopovers->target,'lat');
            $e_lng = PostRideAddress($stopovers->post_id,$stopovers->target,'lng');
            if (strtotime($stopovers->date) >= strtotime($after) && strtotime($stopovers->date) <= strtotime($before)) {
                if (distance($s_lat, $s_lng, $userLat, $userLng, "K") < $satting->search && distance($e_lat, $e_lng, $userLat2, $userLng2, "K") < $satting->search ) {
                    $count++;
                }
            }
        }

        if ($count > 1) {
            $show = 1;
        } else {
            $show = 2;
        }


        return view('frontend.find_ride', compact('stopover','satting', 'userLat', 'userLng', 'seat', 'userLat2', 'userLng2'
            , 'userLoca', 'userLoca2', 'after', 'before', 'show'));

    }
}
