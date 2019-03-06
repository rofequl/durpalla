<?php

namespace App\Http\Controllers\backend;

use App\post_ride;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function PendingPost($data = false)
    {
        if ($data) {
            $post = post_ride::find($data);
            $stopover = stopover::where('post_id', $data)->get();
            return view('backend.post-ride.ride_profile', compact('stopover', 'post'));
        }
        $ride = post_ride::all();

        $group = [];
        foreach ($ride as $item) {
            if (!in_array($item->departure, $group)) {
                array_push($group, $item->departure);
            }

        }
        $date_sort = function ($a, $b) {
            return strtotime($a) - strtotime($b);
        };
        usort($group, $date_sort);
        return view('backend.post-ride.pending', compact('ride', 'group'));
    }

    public function ApprovePost()
    {
        $ride = post_ride::all();

        $group = [];
        foreach ($ride as $item) {
            if (!in_array($item->departure, $group)) {
                array_push($group, $item->departure);
            }

        }
        $date_sort = function ($a, $b) {
            return strtotime($a) - strtotime($b);
        };
        usort($group, $date_sort);
        return view('backend.post-ride.approve', compact('ride', 'group'));
    }

    public function DisapprovePost()
    {
        $ride = post_ride::all();

        $group = [];
        foreach ($ride as $item) {
            if (!in_array($item->departure, $group)) {
                array_push($group, $item->departure);
            }

        }
        $date_sort = function ($a, $b) {
            return strtotime($a) - strtotime($b);
        };
        usort($group, $date_sort);
        return view('backend.post-ride.disapprove', compact('ride', 'group'));
    }

    public function PendingPostChange(Request $request)
    {
        $insert = post_ride::find($request->b);
        if ($request->a == "add") {
            $insert->status = 1;
            $insert->save();
            return redirect('admin-approve-post');
        } else {
            $insert->status = 2;
            $insert->save();
            return redirect('admin-disapprove-post');
        }
    }
}
