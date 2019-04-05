<?php

namespace App\Http\Controllers\frontend;

use App\car;
use App\car_brand;
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
        $car_brand = car_brand::get();
        return view('frontend.sp_panel.add_car',compact('car','car_brand'));
    }

    public function AddCar(Request $request)
    {
        $request->validate([
            'brand' => 'required|max:15',
            'modal' => 'required|max:191',
            'fuel' => 'required',
            'car_image' => 'required',
            'kilometers' => 'required',
            'regYear' => 'required',
            'modelYear' => 'required',
        ]);

        $car = new car;
        $car->brand_id = $request->brand;
        $car->model = $request->modal;
        if ($request->hasFile('car_image')) {
            $extension = $request->file('car_image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('car_image')->storeAs('public/car', $fileStore3);
            $car->car_image = $fileStore3;
        }
        $car->fuel = $request->fuel;
        $car->kilometers = $request->kilometers;
        $car->registration_year = $request->regYear;
        $car->model_year = $request->modelYear;
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
