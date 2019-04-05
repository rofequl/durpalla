<?php

namespace App\Http\Controllers\backend;

use App\close_account;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpAccountController extends Controller
{
    public function SpAccountClose(){
        $cancel = close_account::all();
        return view('backend.close_account',compact('cancel'));
    }

    public function SpAccountCloseDone(request $request){
       if ($request->cancel){
            $insert = user::where('user_id',$request->cancel)->first();
            $insert->status = 1;
            $insert->save();
       }else{
           $insert = user::where('user_id',$request->cancel)->first();
           $insert->status = 2;
           $insert->save();
       }
       return redirect('admin-sp-account-close');
    }

    public function SpAccountCloseList(){
        $cancel = close_account::all();
        return view('backend.close_account_list',compact('cancel'));
    }
}
