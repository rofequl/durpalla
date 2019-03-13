<?php

namespace App\Http\Controllers\backend;

use App\corporate;
use App\corporate_group;
use App\user;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CorporateController extends Controller
{

    public function Index()
    {
        $corporate = corporate::all();
        return view('backend.corporate.add-corporate',compact('corporate'));
    }


    public function IndexGroup()
    {
        $corporate = corporate::all();
        return view('backend.corporate.group_corporate',compact('corporate'));
    }

    public function Store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'address' => 'required|max:50',
            'c_phone' => 'required|max:15',
            'c_name' => 'required|max:50',
            'discount' => 'required|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = new corporate;
        $insert->name = $request->name;
        $insert->address = $request->address;
        $insert->c_name = $request->c_name;
        $insert->c_phone = $request->c_phone;
        $insert->discount = $request->discount;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/corporate', $fileStore3);
            $insert->logo = $fileStore3;
        }
        $insert->save();

        Session::flash('message', 'Corporate Add Successfully');
        return redirect('corporate');
    }

    public function StoreGroup(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:15',
        ]);

        $user = user::where('phone',$request->phone)->first();
        $group = corporate_group::where('phone',$request->phone)->first();
        if ($user){
            if ($group){
                $group->phone = $request->phone;
                $group->corporate_id = $request->corporate;
                $group->save();

                Session::flash('message', 'Member Update Corporate Group Successfully');
                return redirect('corporate-group');
            }else{
                $insert = new corporate_group;
                $insert->phone = $request->phone;
                $insert->corporate_id = $request->corporate;
                $insert->save();

                Session::flash('message', 'Member Add Corporate Group Successfully');
                return redirect('corporate-group');
            }
        }else{
            Session::flash('message', 'Invalid Phone Number');
            return redirect('corporate-group');
        }

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
