<?php

namespace App\Http\Controllers\frontend;

use App\close_account;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App;

class SpAccountController extends Controller
{
    public function Profile(){
        $user = user::where('user_id',Session('userId'))->first();
        return view('frontend.sp_panel.profile.personal_information',compact('user'));
    }

    public function ProfileUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:191',
            'dob' => 'required',
        ]);
        $user = user::where('user_id',Session('userId'))->first();
        $user->name = $request->name;
        $user->dob = $request->dob;
        if($user->phone == ""){
            $user->phone = $request->phone;
        }
        $user->save();

        Session::flash('message', 'Account update successfully');
        return redirect('sp-account-profile');

    }

    public function Photo(){
        return view('frontend.sp_panel.profile.photo');
    }

    public function PhotoStore(Request $request){
        $request->validate([
            'image' => 'required',
        ]);
        $user = user::where('user_id',Session('userId'))->first();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/user', $fileStore3);
            $user->image = $fileStore3;
        }
        $user->save();

        Session::flash('message', 'Photo upload successfully');
        return redirect('sp-account-photo');

    }

    public function SpAccountClose(){
        return view('frontend.sp_panel.profile.account_close');
    }

    public function SpAccountCloseDone(request $request){
        $request->validate([
            'reason' => 'required',
            'recommend' => 'required',
            'improve' => 'required',
        ]);

        $insert = new close_account;
        $insert->reason = $request->reason;
        $insert->recommend = $request->recommend;
        $insert->improve = $request->improve;
        $insert->user_id = Session('userId');
        $insert->save();

        Session::flash('message', 'Account will be close');
        return redirect('sp-account-close');
    }
}
