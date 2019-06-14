<?php

namespace App\Http\Controllers;

use App\landing_image;
use App\popular_ride;
use App\stopover;
use App\user;
use App\verification;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DateTime;

class homeController extends Controller
{
    public function homepage()
    {

        $landingPage = landing_image::where('approve', 1)->first();
        if ($landingPage) {
            $landingPage = $landingPage->image;
        } else {
            $landingPage = false;
        }

        $popular = popular_ride::limit(3)->get();
        $rides = stopover::where('date', '>=', date("m/d/Y"))->limit(10)->get();
        return view('frontend.index', compact('landingPage', 'rides','popular'));
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

                if ($request->remember_me) {
                    setcookie('userId', $admin->user_id, time() + (86400 * 30), "/");
                    setcookie('token', $admin->token, time() + (86400 * 30), "/");
                    Session::put('token', $admin->token);
                    Session::put('userId', $admin->user_id);
                } else {
                    Session::put('token', $admin->token);
                    Session::put('userId', $admin->user_id);
                }
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
            'day' => 'required|max:191',
            'month' => 'required|max:191',
            'year' => 'required|max:191',
            'gender' => 'required|',
            'password' => 'required|max:20|min:6',
        ]);

        $userId = time();

        $phone = '0' . $request->phone;

        $user = new user;
        $user->phone = $phone;
        $user->name = $request->name;
        $user->day = $request->day;
        $user->month = $request->month;
        $user->year = $request->year;
        $user->user_id = $userId;
        $user->gender = $request->gender;
        $user->image = \URL::to('') . '/images/admin.jpg';
        $user->password = Hash::make($request->password);
        $user->token = $request->_token;
        $user->save();

        Session::put('token', $request->_token);
        Session::put('userId', $userId);
        return redirect('/');
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
        if (!\Session::has('locale')) {
            \Session::put('locale', $request->lng);
        } else {
            Session::put('locale', $request->lng);
        }

        return Redirect::back();
    }

    public function ForgotPassword()
    {
        return view('frontend.log_in.forget_password');
    }

    public function ForgotPasswordPost(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:15',
        ]);
        $search = user::where('phone',$request->phone)->first();
        if (!empty($search)) {
            $search = user::where('phone',$request->phone)->select('name','phone')->first();
            return view('frontend.log_in.forget_password',compact('search'));
        }else{
            $request->session()->flash('message', 'Phone not match');
            return view('frontend.log_in.forget_password');
        }
    }

    public function ForgotPasswordChange(Request $request)
    {
        $request->validate([
            'password' => 'required|max:20|min:6',
            'retype_password' => 'required|max:20|min:6',
        ]);
        if ($request->password != $request->retype_password){
            $request->session()->flash('message', 'Retype password are not same');
            return view('frontend.log_in.forget_password');
        }
        $search = user::where('phone',$request->phone)->first();
        if (!empty($search)) {
            $search->password = Hash::make($request->password);
            $request->session()->flash('message', 'Password change successfully');
            return redirect('/login');
        }else{
            $request->session()->flash('message', 'Phone not match');
            return view('frontend.log_in.forget_password');
        }
    }

    public function LogoutUser()
    {
        Session::forget('token');
        Session::forget('userId');
        setcookie('userId', '', time() - 3600);
        setcookie('token', '', time() - 3600);
        return redirect('/');

    }
}
