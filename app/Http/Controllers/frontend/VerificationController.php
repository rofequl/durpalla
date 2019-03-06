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
        return view('frontend.sp_panel.verification', compact('verification'));
    }

    public function SpVerificationPost(Request $request)
    {
        $verification = verification::where('user_id', Session('userId'))->first();
        if ($request->submit == "nid") {
            $verification->nid = $request->nid;
            $verification->save();
        } elseif ($request->submit == "passport") {
            $verification->passport = $request->passport;
            $verification->save();
        } elseif ($request->submit == "driving") {
            $verification->driving = $request->driving;
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
