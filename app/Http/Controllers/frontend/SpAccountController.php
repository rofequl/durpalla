<?php

namespace App\Http\Controllers\frontend;

use App\close_account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SpAccountController extends Controller
{
    public function SpAccountClose(){
        return view('frontend.sp_panel.close_account.account_close');
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
        $insert->save();

        Session::flash('message', 'Account will be close');
        return redirect('sp-account-close');
    }
}
