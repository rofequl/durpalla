<?php

namespace App\Http\Controllers\backend;

use App\car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function PendingCar($data = false){
        $car = car::where('status',0)->get();
        if($data){
            $carwas = car::find($data);
            return view('backend.car.pending',compact('car','carwas'));
        }else{
            return view('backend.car.pending',compact('car'));
        }

    }

    public function PendingCarApprove(Request $request){
        $carwas = car::find($request->id);
        $carwas->car_type = $request->type;
        $carwas->status = 1;
        $carwas->save();

        return redirect('admin-pending-car');
    }

    public function ApproveCar($data = false){
        $car = car::where('status',1)->get();
        if($data){
            $carwas = car::find($data);
            return view('backend.car.approve',compact('car','carwas'));
        }else{
            return view('backend.car.approve',compact('car'));
        }

    }

    public function ApproveCarPending(Request $request){
        $carwas = car::find($request->id);
        $carwas->status = 0;
        $carwas->save();

        return redirect('admin-approve-car');
    }

}
