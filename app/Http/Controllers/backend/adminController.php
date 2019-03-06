<?php

namespace App\Http\Controllers\backend;

use App\admin_panel;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function home()
    {
        $data = admin_panel::all()->count();
        if ($data > 0) {
            if (Session::get('email') != null) {
                return redirect('/dashboard');
            } else {
                return view('backend.login');
            }
        } else {
            return view('backend.register');
        }
    }

    public function LoginCheck(Request $request)
    {
        $admin = admin_panel::where('email', $request->email)
            ->first();

        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('email', $request->email);
                Session::put('name', $admin->name);
                return redirect('/dashboard');
            } else {
                $request->session()->flash('login_error', 'password not match');
                return redirect('/admin');
            }
        } else {
            $request->session()->flash('login_error', 'User name not match');
            return redirect('/admin');
        }
    }

    public function AdminUserRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:16',
        ]);
        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator)
                ->withInput();
        } else {
            $register_user = new admin_panel;
            $register_user->name = $request->name;
            $register_user->email = $request->email;
            $register_user->password = Hash::make($request->password);
            $register_user->save();
        }
        Session::put('name', $request->name);
        Session::put('email', $request->email);
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        return view('backend.index');
    }


    public function Logout()
    {
        Session::forget('email');
        Session::flush();
        return redirect('/admin');
    }
}
