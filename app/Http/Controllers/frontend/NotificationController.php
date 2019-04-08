<?php

namespace App\Http\Controllers\frontend;

use App\notification;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function notification(){
        $notification = notification::where('user_id',Session('userId'))->get();
        return view('frontend.notification.notification',compact('notification'));
    }

    public function NotificationShow(){
        notification::where('status', 0)->update(['status'=>1]);
    }

    public function NotificationPreview($data){
        $notification = notification::find($data);
        $notifications = explode(",",$notification->matching);
        $rides = stopover::whereIn('tracking',$notifications)->get();
        return view('frontend.notification.notification_preview',compact('rides'));
    }
}
