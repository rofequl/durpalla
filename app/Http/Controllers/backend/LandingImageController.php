<?php

namespace App\Http\Controllers\backend;

use App\landing_image;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingImageController extends Controller
{
    public function index(){
        return view('backend.dashboard_image');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required',
        ]);
        $user = new landing_image;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/landing_page', $fileStore3);
            $user->image = $fileStore3;
        }
        $user->save();

        Session::flash('message', 'Photo upload successfully');
        return redirect('admin-landing-image');

    }
}
