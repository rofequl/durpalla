<?php

namespace App\Http\Controllers\frontend;

use App\car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SpController extends Controller
{
    public function index()
    {
        return view('frontend.sp_panel.index');
    }

    public function Car()
    {
        $car = car::where('user_id',Session('userId'))->get();
        return view('frontend.sp_panel.add_car',compact('car'));
    }

    public function AddCar(Request $request)
    {
        $request->validate([
            'brand' => 'required|max:15',
            'modal' => 'required|max:191',
            'fuel' => 'required',
            'kilometers' => 'required',
        ]);

        $car = new car;
        $car->brand = $request->brand;
        $car->model = $request->modal;
        $car->fuel = $request->fuel;
        $car->kilometers = $request->kilometers;
        $car->user_id = Session('userId');
        $car->save();

        Session::flash('message', 'New car add successfully');
        return redirect('/sp-car');
    }

    public function DeleteCar(Request $request)
    {
        if ($request->Delete) {
            $register_user = car::find($request->Delete);
            $register_user->delete();

            Session::flash('message', 'Car deleted');
            return redirect('/sp-car');
        }
    }
}
