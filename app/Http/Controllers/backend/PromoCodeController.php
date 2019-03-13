<?php

namespace App\Http\Controllers\backend;

use App\promo_code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data = false)
    {

        $promo = promo_code::all();
        $data2 = promo_code::find($data);
        if ($data == "ADD"){
            $add = "";
            return view('backend.promo_code',compact('promo','add'));
        }
        if ($data){
            return view('backend.promo_code',compact('promo','data2'));
        }else{
            return view('backend.promo_code',compact('promo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $insert = new promo_code;
        $insert->p_amount = $request->p_amount;
        $insert->h_amount = $request->h_amount;
        $insert->code = $request->code;
        $insert->location = $request->location;
        $insert->lat = $request->lat;
        $insert->lng = $request->lng;
        $insert->r_area = $request->r_area;
        $insert->s_date = $request->s_date;
        $insert->e_date = $request->e_date;
        $insert->save();

        return redirect('promo_code');
    }

    public function Update(Request $request)
    {

        $insert = promo_code::find($request->id);
        $insert->p_amount = $request->p_amount;
        $insert->h_amount = $request->h_amount;
        $insert->code = $request->code;
        $insert->location = $request->location;
        $insert->lat = $request->lat;
        $insert->lng = $request->lng;
        $insert->r_area = $request->r_area;
        $insert->s_date = $request->s_date;
        $insert->e_date = $request->e_date;
        $insert->save();

        return redirect('promo_code');
    }


    public function publish($id)
    {
        $insert = promo_code::find($id);
        if ($insert->publish == 1){
            $insert->publish = 0;
        }else{
            $insert->publish = 1;
        }

        $insert->save();

        return redirect('promo_code');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        $data = promo_code::find($id);
        $data->delete();

        return redirect('promo_code');
    }
}
