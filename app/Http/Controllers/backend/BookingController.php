<?php

namespace App\Http\Controllers\backend;

use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{

    public function CompleteBook($id = false)
    {
        if ($id == "time") {
            $stopover = stopover::where('date','>',date("m/d/Y"))->get();
            return view('backend.booking.complete_book',compact('stopover','id'));
        }else{
            $stopover = stopover::where('date','<',date("m/d/Y"))->get();
            return view('backend.booking.complete_book',compact('stopover'));
        }

    }

    public function PartialBook($id = false)
    {
        if ($id == "time") {
            $stopover = stopover::where('date','>',date("m/d/Y"))->get();
            return view('backend.booking.partial_book',compact('stopover','id'));
        }else{
            $stopover = stopover::where('date','<',date("m/d/Y"))->get();
            return view('backend.booking.partial_book',compact('stopover'));
        }

    }

    public function NotBook($id = false)
    {
        if ($id == "time") {
            $stopover = stopover::where('date','>',date("m/d/Y"))->get();
            return view('backend.booking.not_book',compact('stopover','id'));
        }else{
            $stopover = stopover::where('date','<',date("m/d/Y"))->get();
            return view('backend.booking.not_book',compact('stopover'));
        }
    }


    public function OngoingBook()
    {
            $stopover = stopover::where('date','=',date("m/d/Y"))->get();
            return view('backend.booking.ongoing_book',compact('stopover'));
    }


    public function CompleteRide()
    {
        $stopover = stopover::where('date','<',date("m/d/Y"))->get();
        return view('backend.booking.complete_ride',compact('stopover'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
