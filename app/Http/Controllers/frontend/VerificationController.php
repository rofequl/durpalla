<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\verification;

class VerificationController extends Controller
{
    public function SpVerification()
    {

        $verification = verification::where('user_id', Session('userId'))->first();
        if (!$verification) {
            $verification = new verification;
            $verification->user_id = Session('userId');
            $verification->save();
        }
        return view('frontend.sp_panel.profile.verification', compact('verification'));
    }

    public function SpVerificationPost(Request $request)
    {
        $verification = verification::where('user_id', Session('userId'))->first();
        if ($request->submit == "nid") {

            $request->validate([
                'nid' => 'required',
                'nidImage1' => 'required',
                'nidImage2' => 'required',
            ]);
            $verification->nid = $request->nid;
            if ($request->hasFile('nidImage1')) {
                $extension = $request->file('nidImage1')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('nidImage1')->storeAs('public/nid', $fileStore3);
                $verification->nid_image1 = $fileStore3;
            }
            if ($request->hasFile('nidImage2')) {
                $extension = $request->file('nidImage2')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('nidImage2')->storeAs('public/nid', $fileStore3);
                $verification->nid_image2 = $fileStore3;
            }
            $verification->nid_status = 0;
            $verification->save();
        } elseif ($request->submit == "passport") {
            $request->validate([
                'passport' => 'required',
                'passportImage1' => 'required',
                'passportImage2' => 'required',
            ]);
            $verification->passport = $request->passport;
            if ($request->hasFile('passportImage1')) {
                $extension = $request->file('passportImage1')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('passportImage1')->storeAs('public/passport', $fileStore3);
                $verification->passport_image1 = $fileStore3;
            }
            if ($request->hasFile('passportImage2')) {
                $extension = $request->file('passportImage2')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('passportImage2')->storeAs('public/passport', $fileStore3);
                $verification->passport_image2 = $fileStore3;
            }
            $verification->passport_status = 0;
            $verification->save();
        } elseif ($request->submit == "driving") {
            $request->validate([
                'driving' => 'required',
                'drivingImage1' => 'required',
                'drivingImage2' => 'required',
            ]);
            $verification->driving = $request->driving;
            if ($request->hasFile('drivingImage1')) {
                $extension = $request->file('drivingImage1')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('drivingImage1')->storeAs('public/driving', $fileStore3);
                $verification->driving_image1 = $fileStore3;
            }
            if ($request->hasFile('drivingImage2')) {
                $extension = $request->file('drivingImage2')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('drivingImage2')->storeAs('public/driving', $fileStore3);
                $verification->driving_image2 = $fileStore3;
            }
            $verification->driving_status = 0;
            $verification->save();
        } elseif ($request->submit == "email") {
            $verification->email = $request->email;
            $verification->save();
        } elseif ($request->submit == "phone") {
            $verification->phone = $request->phone;
            $verification->save();
        } else {
            echo "Something Wrong";
        }

        return redirect('sp-verification');
    }
}
