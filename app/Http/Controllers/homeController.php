<?php

namespace App\Http\Controllers;

use App\user;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    public function UserLogin(Request $request){
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
                return redirect('/sp-panel');
            } else {
                $request->session()->flash('message', 'password not match');
                return redirect('/login');
            }
        } else {
            $request->session()->flash('message', 'Phone not match');
            return redirect('/login');
        }

    }

    public function UserRegister(Request $request){
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
        $user->password = Hash::make($request->password);
        $user->save();

        Session::put('phone', $request->phone);
        Session::put('userId', $userId);
        return redirect('/sp-panel');
    }

    public function LogoutUser(){
        Session::forget('phone');
        Session::forget('userId');
        Session::flush();
        return redirect('/');

    }
}
