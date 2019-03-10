<?php

namespace App\Http\Controllers\frontend;

use App\promo_code;
use Session;
use App\car;
use App\post_ride;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function Index($data,$data2 = false)
    {
        $singleStopovers = stopover::where('tracking',$data)->first();
        $post = post_ride::where('id',$singleStopovers->post_id)->first();
        $car = car::where('user_id',$post->user_id)->where('id',$post->car_id)->first();
        if ($data2){
            if (Session::get('userId') == null && Session::get('phone') == null) {
                Session::flash('message', 'Submit this form Login first.');
                return redirect('login');
            }
            $show = 2;
            return view('frontend.booking.book',compact('singleStopovers','post','car','show'));

        }
        return view('frontend.booking.book',compact('singleStopovers','post','car'));

    }

    public function PreviewIndex()
    {
        return view('frontend.booking.preview');
    }


    public function Store(Request $request)
    {
        $stopovers = stopover::where('tracking',$request->tracking)->first();
        $seat = $request->seat;
        $message = $request->message;
        if ($request->promo != ""){
            $code = promo_code::where('code',$request->promo)->first();
            if ($code){
                return view('frontend.booking.preview',compact('seat','message','code','stopovers'));
            }else{
                Session::flash('message', 'Invalid Promo Code');
                return redirect()->back();
            }
        }
        return view('frontend.booking.preview',compact('seat','message','stopovers'));
    }

    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
