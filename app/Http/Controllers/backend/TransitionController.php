<?php

namespace App\Http\Controllers\backend;

use App\post_ride;
use App\stopover;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransitionController extends Controller
{
    public function Transition(Request $request)
    {
        $postId = [];
        if ($request->userId && $request->userId != "") {
            $post = post_ride::where('status', 1)->where('user_id', $request->userId)->get();
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
        if ($request->tracking && $request->tracking != ""){
        $stopover = stopover::whereIn('post_id', $postId)->where()->get();
    }else if ($request->tracking && $request->tracking != "") {
        $stopover = stopover::whereIn('post_id', $postId)->get();
    } else if ($request->tracking && $request->tracking != "") {
        $stopover = stopover::whereIn('post_id', $postId)->get();
    } else {
        $stopover = stopover::whereIn('post_id', $postId)->get();
    }

        return view('backend.transition', compact('stopover'));
    }

    public function TransitionUpdate(Request $request)
    {
        $stopover = stopover::find($request->id);
        $stopover->status = 3;
        $stopover->save();

        return redirect('admin-transition');
    }
}
