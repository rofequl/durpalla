<?php

namespace App\Http\Controllers\backend;

use App\landing_image;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingImageController extends Controller
{
    public function index(){
        $image = landing_image::all();
        return view('backend.dashboard_image',compact('image'));
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

    public function Update(Request $request){
        if ($request->show) {
            $serviceHide = landing_image::where('approve',1)->first();
            if ($serviceHide){
                $serviceHide->approve = 0;
                $serviceHide->save();
            }
            $serviceCategory = landing_image::find($request->show);
            $serviceCategory->approve = 1;
            $serviceCategory->save();
            Session::flash('message', 'Photo Update successfully');
            return redirect('admin-landing-image');
        }
    }
}
