<?php

namespace App\Http\Controllers;

use App\landing_image;
use App\user;
use App\verification;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App;
use Illuminate\Support\Facades\Config;

class homeController extends Controller
{
    public function homepage(){
        $landingPage = landing_image::where('approve',0)->first();
        if($landingPage){
            $landingPage =  $landingPage->image;
        }else{
            $landingPage =  false;
        }
        return view('frontend.index',compact('landingPage'));
    }

    public function UserLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:15',
            'password' => 'required|max:20|min:6',
        ]);
        $admin = user::where('phone', $request->phone)
            ->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('phone', $request->phone);
                Session::put('userId', $admin->user_id);
                return redirect('/');
            } else {
                $request->session()->flash('message', 'password not match');
                return redirect('/login');
            }
        } else {
            $request->session()->flash('message', 'Phone not match');
            return redirect('/login');
        }

    }

    public function UserRegister(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:15',
            'name' => 'required|max:191',
            'dob' => 'required',
            'gender' => 'required',
            'password' => 'required|max:20|min:6',
        ]);

        $userId = time();

        $user = new user;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->user_id = $userId;
        $user->gender = $request->gender;
        $user->image = "admin.jpg";
        $user->password = Hash::make($request->password);
        $user->save();

        Session::put('phone', $request->phone);
        Session::put('userId', $userId);
        return redirect('/sp-panel');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $reg_user = user::where('facebook_id', $user->getId())->first();

        if ($reg_user) {
            echo "Already Sign up";
        } else {
            $userId = time();

            $usernew = new user;
            $usernew->name = $user->getName();
            $usernew->user_id = $userId;
            $usernew->image = $user->getAvatar();
            $usernew->facebook_id = $user->getId();
            $usernew->save();

            $verification = new verification;
            $verification->user_id = $userId;
            $verification->email = $user->getEmail();
            $verification->save();

            Session::put('userId', $userId);
            return redirect('/sp-panel');
        }

    }


    public function language(Request $request)
    {
        if(!\Session::has('locale'))
        {
            \Session::put('locale', $request->lng);
        }else{
            Session::put('locale', $request->lng);
        }

        return Redirect::back();
    }

    public function LogoutUser()
    {
        Session::forget('phone');
        Session::forget('userId');
        return redirect('/');

    }
}
