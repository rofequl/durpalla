<?php

namespace App\Http\Controllers\backend;

use App\booking;
use App\popular_ride;
use App\post_ride;
use App\ride_setting;
use App\stopover;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransitionController extends Controller
{
    public function Transition(Request $request)
    {

        if ($request->userId && $request->userId != "") {
            $userId = $request->userId;
        } else {
            $userId = "";
        }

        if ($request->tracking && $request->tracking != "") {
            $tracking = $request->tracking;
        } else {
            $tracking = "";
        }

        if ($request->filter && $request->filter == 4) {
            $filter = 4;
        } elseif ($request->filter && $request->filter != "") {
            $filter = $request->filter;
        } else {
            $filter = "";
        }

        $postId = [];
        if ($userId != "") {
            $post = post_ride::where('status', 1)->where('user_id', $userId)->get();
        } else {
            $post = post_ride::where('status', 1)->get();
        }

        foreach ($post as $posts) {
            array_push($postId, $posts->id);
        }
        $stopover = stopover::whereIn('post_id', $postId)->whereNotIn('status', [2, 3])->get();

        foreach ($stopover as $stopovers) {
            $timezone = 'Asia/Dhaka';
            $input = $stopovers->date . ' ' . $stopovers->time . ' ' . $stopovers->time2;
            $date = Carbon::createFromFormat('m/d/Y h A', $input, 'Asia/Dhaka');
            $today = Carbon::parse($date, $timezone);
            $input = $stopovers->edate . ' ' . $stopovers->etime . ' ' . $stopovers->etime2;
            $date = Carbon::createFromFormat('m/d/Y h A', $input, 'Asia/Dhaka');
            $tomorrow = Carbon::parse($date, $timezone);
            $now = Carbon::now($timezone);
            if ($now->gte($today) && $now->lte($tomorrow)) {
                $update = stopover::find($stopovers->id);
                $update->status = 1;
                $update->save();

            } else if ($now->gte($tomorrow) && $now->gte($tomorrow)) {
                $update = stopover::find($stopovers->id);
                $update->status = 2;
                $update->save();
            }

        }


        if ($tracking != "" && $filter != "") {
            $stopover = stopover::whereIn('post_id', $postId)->where('tracking', $tracking)->where('status', $filter)->get();
        } elseif ($tracking != "") {
            $stopover = stopover::whereIn('post_id', $postId)->where('tracking', $tracking)->get();
        } elseif ($filter == 4) {
            $stopover = stopover::whereIn('post_id', $postId)->where('status', 0)->get();
        } elseif ($filter != "") {
            $stopover = stopover::whereIn('post_id', $postId)->where('status', $filter)->get();
        } else {
            $stopover = stopover::whereIn('post_id', $postId)->get();
        }

        $setting = ride_setting::all()->pluck('commission')->first();
        return view('backend.transition', compact('stopover', 'userId', 'tracking', 'filter', 'setting'));
    }

    public function TransitionUpdate(Request $request)
    {
        $stopover = stopover::find($request->id);
        $stopover->status = 3;
        $stopover->save();

        return redirect('admin-transition');
    }

    public function PopularRide(Request $request)
    {
        $ride = post_ride::where('status', 1)->get();
        return view('backend.popular_ride', compact('ride'));
    }

    public function PendingPostProfile($data)
    {

        $post = post_ride::find($data);
        $stopover = stopover::where('post_id', $data)->get();
        return view('backend.popular_ride2', compact('stopover', 'post'));

    }

    public function PendingPostUpdate(Request $request)
    {
        if ($request->add) {
            $insert = new popular_ride;
            $insert->tracking = base64_decode($request->add);
            $insert->save();
            return redirect()->back();
        } else if ($request->remove) {
            popular_ride::where('tracking',base64_decode($request->remove))->delete();
            return redirect()->back();
        }

    }

}
