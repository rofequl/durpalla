<?php

namespace App\Http\Controllers\backend;

use App\ride_setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RideSettingController extends Controller
{
    public function RideSetting(){
        $data = ride_setting::all();
        if ($data->count()>0){
            $data = ride_setting::all()->first();
        }else{
            $insert = new ride_setting;
            $insert->search = 0;
            $insert->save();
            return redirect('ride-setting');
        }
        $data = ride_setting::all()->first();
        return view('backend.ride_setting',compact('data'));
    }

    public function RideSettingPost(Request $request){
        $data = ride_setting::all();
        if ($data->count()>0){
            $insert = ride_setting::all()->first();
        }else{
            $insert = new ride_setting;
        }

        $insert->search = $request->search;
        $insert->fine = $request->fine;
        $insert->km_1st = $request->km1;
        $insert->price = $request->price1;
        $insert->price2 = $request->price2;
        $insert->pkm_1st = $request->pkm1;
        $insert->pprice = $request->pprice1;
        $insert->pprice2 = $request->pprice2;

        $insert->save();

        return redirect('ride-setting');
    }
}
