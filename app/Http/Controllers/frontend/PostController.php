<?php

namespace App\Http\Controllers\frontend;

use App\post_ride;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PostController extends Controller
{


    public function RidePost(Request $request)
    {

        if (Session::get('userId') == null && Session::get('phone') == null) {
            Session::flash('message', 'Submit this form Login first.');
            return redirect('post-ride');
        }


        $request->validate([
            'location' => 'required',
            'location2' => 'required',
            'departure' => 'required',
            'car' => 'required',
        ]);

        $location = [];
        $lat = [];
        $lng = [];

        array_push($location, $request->location);
        array_push($lat, $request->lat);
        array_push($lng, $request->lng);


        if ($request->alocation != null) {
            array_push($location, $request->alocation);
            array_push($lat, $request->alat);
            array_push($lng, $request->alng);
        }

        if ($request->alocation1 != null) {
            array_push($location, $request->alocation1);
            array_push($lat, $request->alat1);
            array_push($lng, $request->alng1);
        }

        if ($request->alocation2 != null) {
            array_push($location, $request->alocation2);
            array_push($lat, $request->alat2);
            array_push($lng, $request->alng2);
        }

        if ($request->alocation3 != null) {
            array_push($location, $request->alocation3);
            array_push($lat, $request->alat3);
            array_push($lng, $request->alng3);
        }

        if ($request->alocation4 != null) {
            array_push($location, $request->alocation4);
            array_push($lat, $request->alat4);
            array_push($lng, $request->alng4);
        }

        if ($request->alocation5 != null) {
            array_push($location, $request->alocation5);
            array_push($lat, $request->alat5);
            array_push($lng, $request->alng5);
        }

        if ($request->alocation6 != null) {
            array_push($location, $request->alocation6);
            array_push($lat, $request->alat6);
            array_push($lng, $request->alng6);
        }

        if ($request->alocation7 != null) {
            array_push($location, $request->alocation7);
            array_push($lat, $request->alat7);
            array_push($lng, $request->alng7);
        }

        if ($request->alocation8 != null) {
            array_push($location, $request->alocation8);
            array_push($lat, $request->alat8);
            array_push($lng, $request->alng8);
        }

        if ($request->alocation9 != null) {
            array_push($location, $request->alocation9);
            array_push($lat, $request->alat9);
            array_push($lng, $request->alng9);
        }

        array_push($location, $request->location2);
        array_push($lat, $request->lat2);
        array_push($lng, $request->lng2);

        $return = 0;
        $insert = new post_ride;
        $insert->s_lat = $request->lat;
        $insert->s_lng = $request->lng;
        $insert->s_location = $request->location;
        $insert->e_lat = $request->lat2;
        $insert->e_lng = $request->lng2;
        $insert->e_location = $request->location2;
        $insert->departure = $request->departure;
        $insert->d_time = $request->d_time;
        $insert->d_time2 = $request->d_time2;
        if ($request->return != null) {
            $insert->return = $request->return;
            $insert->r_time = $request->r_time;
            $insert->r_time2 = $request->r_time2;
            $return = 1;
        }
        $insert->car_id = $request->car;
        $insert->user_id = Session('userId');
        $insert->save();

        $total = count($location);
        for ($i = 0; $i < $total; $i++) {
            if ($i == $total - 1) {
                break;
            }
            for ($l = $i + 1; $l < $total; $l++) {

                $insert1 = new stopover;
                $insert1->s_lat = $lat[$i];
                $insert1->s_lng = $lng[$i];
                $insert1->s_location = $location[$i];
                $insert1->e_lat = $lat[$l];
                $insert1->e_lng = $lng[$l];
                $insert1->e_location = $location[$l];
                $insert1->post_id = $insert->id;
                $ride_id = post_ride::all()->count();
                $ride_id = "R". rand(100, 999) . str_pad($ride_id, 3, "0", STR_PAD_LEFT);
                $insert1->tracking = $ride_id;
                $insert1->save();
            }
        }


        if ($return == 1) {
            for ($i = $total - 1; $i >= 1; $i--) {
                for ($l = $i - 1; $l >= 0; $l--) {
                    $insert1 = new stopover;
                    $insert1->s_lat = $lat[$i];
                    $insert1->s_lng = $lng[$i];
                    $insert1->s_location = $location[$i];
                    $insert1->e_lat = $lat[$l];
                    $insert1->e_lng = $lng[$l];
                    $insert1->e_location = $location[$l];
                    $insert1->post_id = $insert->id;
                    $ride_id = post_ride::all()->count();
                    $ride_id = "R". rand(100, 999) . str_pad($ride_id, 3, "0", STR_PAD_LEFT);
                    $insert1->tracking = $ride_id;
                    $insert1->save();
                }
            }

        }

        Session::flash('message', 'Request ride insert successfully');
        return redirect('post-ride2/' . $insert->id);

    }


    public
    function RidePost2($data)
    {
        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('frontend.post_ride.post_ride2', compact('stopover', 'post'));
    }

    public
    function RidePostPrice(Request $request)
    {

        $stopover = stopover::where('post_id', $request->id)->get();
        $post = post_ride::find($request->id);
        $post->seat = $request->seat;
        $post->save();

        $chks = $request->price;
        $list = 0;
        foreach ($stopover as $stopovers) {
            $insert = stopover::find($stopovers->id);
            $insert->price = $chks[$list];
            $insert->save();
            $list++;
        }

        Session::flash('message', 'Request ride insert successfully');
        return redirect('post-ride3/' . $request->id);
    }

    public
    function RidePost3($data)
    {
        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('frontend.post_ride.post_ride3', compact('stopover', 'post'));
    }

    public
    function RidePostCondition(Request $request)
    {
        $request->merge([
            'condition' => implode(',', (array)$request->get('condition'))
        ]);

        $post = post_ride::find($request->id);
        $post->condition = $request->condition;
        $post->save();

        return redirect('all-ride');
    }

}
