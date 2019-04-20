<?php

namespace App\Http\Controllers\frontend;

use App\post_ride;
use App\stopover;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransitionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Transition()
    {
        $postId = [];
        $post = post_ride::where('user_id', Session('userId'))->where('status', 1)->get();
        foreach ($post as $posts) {
            array_push($postId, $posts->id);
        }
        $stopover = stopover::whereIn('post_id', $postId)->whereNotIn('status',[2,4])->get();

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

            }else if ($now->gte($tomorrow) && $now->gte($tomorrow)){
                $update = stopover::find($stopovers->id);
                $update->status = 2;
                $update->save();
            }
        }
        $stopover = stopover::whereIn('post_id', $postId)->get();

        return view('frontend.sp_panel.transition', compact('stopover'));
    }
}
