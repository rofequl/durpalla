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
        $ride = post_ride::where('status',0)->get();

        return view('backend.post-ride.pending', compact('ride'));
    }

    public function ApprovePost()
    {
        $ride = post_ride::where('status',1)->get();

        return view('backend.post-ride.approve', compact('ride'));
    }

    public function DisapprovePost()
    {
        $ride = post_ride::where('status',2)->get();

        return view('backend.post-ride.disapprove', compact('ride'));
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
