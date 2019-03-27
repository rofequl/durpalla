<?php

namespace App\Http\Controllers\frontend;

use App\post_ride;
use App\post_ride_address;
use App\stopover;
use App\verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PostController extends Controller
{

    public function RidePostAddress($lat, $lng, $location, $serial, $post){
        $insert = new post_ride_address;
        $insert->lat = $lat;
        $insert->lng = $lng;
        $insert->location = $location;
        $insert->serial = $serial;
        $insert->post_id = $post;
        $insert->save();
    }

    public function RidePost(Request $request)
    {

        if (Session::get('userId') == null && Session::get('phone') == null) {
            Session::flash('message', 'Submit this form Login first.');
            return redirect('post-ride');
        }

        $validation = verification::where('user_id',Session('userId'))->first();

        if ($validation->nid_status != 1 && $validation->passport_status != 1 && $validation->driving_status != 1) {
            Session::flash('message', 'Submit this form verifications NID, Passport and Driving licence.');
            return redirect('post-ride');
        }

        $request->validate([
            'location' => 'required',
            'location2' => 'required',
            'departure' => 'required',
            'car' => 'required',
        ]);

        $serial = 1;
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
        $insert->driver = $request->driver;
        $insert->user_id = Session('userId');
        $insert->save();

        $this->RidePostAddress($request->lat, $request->lng, $request->location, $serial, $insert->id);
        $serial++;


        if ($request->alocation != null) {
            $this->RidePostAddress($request->alat, $request->alng, $request->alocation, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation1 != null) {
            $this->RidePostAddress($request->alat1, $request->alng1, $request->alocation1, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation2 != null) {
            $this->RidePostAddress($request->alat2, $request->alng2, $request->alocation2, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation3 != null) {
            $this->RidePostAddress($request->alat3, $request->alng3, $request->alocation3, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation4 != null) {
            $this->RidePostAddress($request->alat4, $request->alng4, $request->alocation4, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation5 != null) {
            $this->RidePostAddress($request->alat5, $request->alng5, $request->alocation5, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation6 != null) {
            $this->RidePostAddress($request->alat6, $request->alng6, $request->alocation6, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation7 != null) {
            $this->RidePostAddress($request->alat7, $request->alng7, $request->alocation7, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation8 != null) {
            $this->RidePostAddress($request->alat8, $request->alng8, $request->alocation8, $serial, $insert->id);
            $serial++;
        }

        if ($request->alocation9 != null) {
            $this->RidePostAddress($request->alat9, $request->alng9, $request->alocation9, $serial, $insert->id);
            $serial++;
        }

        $this->RidePostAddress($request->lat2, $request->lng2, $request->location2, $serial, $insert->id);

        $postCode = [];

        $ride = post_ride_address::where('post_id',$insert->id)->get();
        foreach ($ride as $rides){
            array_push($postCode, $rides->serial);
        }


        $total = count($postCode);
        for ($i = 0; $i < $total; $i++) {
            if ($i == $total - 1) {
                break;
            }
            for ($l = $i + 1; $l < $total; $l++) {

                $insert1 = new stopover;
                $insert1->going = $postCode[$i];
                $insert1->target = $postCode[$l];
                $insert1->post_id = $insert->id;
                $insert1->date = $request->departure;
                $insert1->time = $request->d_time;
                $insert1->time2 = $request->d_time2;
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
                    $insert1->going = $postCode[$i];
                    $insert1->target = $postCode[$l];
                    $insert1->post_id = $insert->id;
                    $insert1->date = $request->return;
                    $insert1->time = $request->r_time;
                    $insert1->time2 = $request->r_time2;
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

    public function RidePost2($data)
    {
        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('frontend.post_ride.post_ride2', compact('stopover', 'post'));
    }

    public function RidePostPrice(Request $request)
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

    public function RidePost3($data)
    {
        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('frontend.post_ride.post_ride3', compact('stopover', 'post'));
    }

    public function RidePostCondition(Request $request)
    {
        $request->merge([
            'condition' => implode(',', (array)$request->get('condition'))
        ]);

        $post = post_ride::find($request->id);
        $post->condition = $request->condition;
        $post->save();

        return redirect('all-ride');
    }

    public function upcomingRideIndex(){
        $post = post_ride::where('user_id',Session('userId'))->where('status',1)->get();
        return view('frontend.sp_panel.rides_offered.upcoming_ride',compact('post'));
    }

    public function upcomingRidePreview($data){
        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('frontend.sp_panel.rides_offered.preview', compact('stopover', 'post'));
    }

    public function upcomingRideCancel($data){
        $insert = post_ride::find($data);
            $insert->status = 3;
            $insert->save();
            return redirect('upcoming-ride');
    }

    public function ArchivedRideIndex(){
        $post = post_ride::where('user_id',Session('userId'))->get();
        return view('frontend.sp_panel.rides_offered.archived_rides',compact('post'));
    }

}
