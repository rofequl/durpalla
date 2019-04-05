<?php


use App\notification;
use App\request_ride;
use App\ride_setting;
use App\stopover;

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return number_format((float)($miles * 1.609344), 1, '.', '');
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function GetDrivingDistance($lat1, $long1, $lat2, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&key=AIzaSyCMfl6pAmNv3T6PoDRy7ESSJRZLLSFf2jI";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}

function PostRideAddress($column, $column2, $column3)
{
    $query = DB::table('post_ride_addresses')
        ->where('post_id', '=', $column)
        ->where('serial', '=', $column2)
        ->pluck($column3)
        ->first();
    return $query;
}

function getRide($column)
{
    $query = DB::table('post_rides')
        ->where('id', '=', $column)
        ->first();
    return $query;
}

function UserName($column)
{
    $query = DB::table('users')
        ->where('user_id', '=', $column)
        ->pluck('name')
        ->first();
    return $query;
}

function getStopoverRide($column)
{
    $query = DB::table('stopovers')
        ->where('date', '=', $column)
        ->get();
    return $query;
}

function getSingleStopover($column)
{
    $query = DB::table('stopovers')
        ->where('tracking', '=', $column)
        ->first();
    return $query;
}

function car($column)
{
    $query = DB::table('cars')
        ->where('user_id', '=', $column)
        ->where('status', '=', 1)
        ->get();
    return $query;
}

function getCarById($column, $column2)
{
    $query = DB::table('cars')->where('id', $column)->pluck($column2)->first();
    return $query;
}

function resource($column)
{
    $query = DB::table('resources')
        ->where('user_id', '=', $column)
        ->get();
    return $query;
}

function getResourceById($column)
{
    $query = DB::table('resources')
        ->find($column);
    return $query;
}

function userInformation($column, $column2)
{
    $query = DB::table('users')
        ->where('user_id', '=', $column)
        ->pluck($column2)
        ->first();
    return $query;
}

function seat($going, $target, $post, $date)
{
    $query = DB::table('post_ride_addresses')->where('post_id', $post)->get();
    $seat = DB::table('post_rides')->where('id', $post)->pluck('seat')->first();
    $date1 = DB::table('post_rides')->where('id', $post)->where('departure', $date)->first();

    if ($date1) {
        foreach ($query as $querys) {
            if ($querys->serial < $going) {
                $seat -= DB::table('stopovers')->where('post_id', $post)->where('date', $date)->where('going', $querys->serial)->where('target', '>', $going)->sum('stopovers.seat');
            } elseif ($querys->serial == $going) {
                $seat -= DB::table('stopovers')->where('post_id', $post)->where('date', $date)->where('going', $going)->where('target', '>=', $target)->sum('stopovers.seat');
            } else {
                $seat -= DB::table('stopovers')->where('post_id', $post)->where('date', $date)->where('going', '>=', $querys->serial)->where('target', '<=', $target)->sum('stopovers.seat');
            }
        }
        return $seat;
    } else {
//        foreach ($query as $querys){
//            if ($querys->serial < $going){
//
//            }elseif ($querys->serial == $going){
//                $seat -= DB::table('stopovers')->where('post_id', $post)->where('date', $date)->where('going', $going)->where('target','<=',$target)->sum('stopovers.seat');
//            }else{
//                $seat -= DB::table('stopovers')->where('post_id', $post)->where('going','>=', $querys->serial)->where('target','<=',$target)->sum('stopovers.seat');
//            }
//        }
        return 0;
    }


}

function ride_price($lat1, $lon1, $lat2, $lon2, $car)
{
    //$km = distance($lat1, $lon1, $lat2, $lon2, 'K');
    $dist = GetDrivingDistance($lat1, $lon1, $lat2, $lon2);

    $km = number_format((float)($dist['distance']), 1, '.', '');

    $query = DB::table('ride_settings')->first();

    $query2 = DB::table('cars')
        ->find($car);

    if ($query) {
        if ($query2->car_type == "Comfort") {
            if ($km > $query->km_1st) {
                $price = (($km - $query->km_1st) * $query->price2) + ($query->km_1st * $query->price);
                return ceil($price);
            } else {
                $price = $km * $query->price;
                return ceil($price);
            }
        } else {
            if ($km > $query->km_1st) {
                $price = (($km - $query->pkm_1st) * $query->pprice2) + ($query->pkm_1st * $query->pprice);
                return ceil($price);
            } else {
                $price = $km * $query->price;
                return ceil($price);
            }
        }
    } else {
        return 00;
    }
}

function corporateGroup($column)
{
    $query = DB::table('corporate_groups')
        ->where('phone', '=', $column)
        ->first();
    return $query;
}

function BookingCancel($column)
{
    $query = DB::table('booking_cancels')
        ->where('user_id', '=', $column)
        ->where('paid', '=', 0)
        ->sum('booking_cancels.charge');
    return $query;
}

function CarBrandById($id)
{
    $query = DB::table('car_brands')->find($id);
    return $query->brand_name;
}

function CorporateCheckById($id)
{
    $query = DB::table('corporate_groups')->where('phone', $id)->first();
    if ($query) {
        return $query->corporate_id;
    }
    return false;

}

function CorporateById($id = false)
{
    if ($id) {
        $query = DB::table('corporates')->find($id);
    } else {
        $query = DB::table('corporates')->find($id);
    }
    return $query;
}

function notificationAdd()
{
    $requests = request_ride::where('user_id', Session('userId'))->get();
    $ride = stopover::where('date', '>=', date("m/d/Y"))->get();
    $satting = ride_setting::first();
    if ($satting) {
        $satting = $satting->search;
    } else {
        $satting = 10;
    }

    foreach ($requests as $request) {
        $tracking = [];
        foreach ($ride as $item) {
            $s_lat = PostRideAddress($item->post_id, $item->going, 'lat');
            $s_lng = PostRideAddress($item->post_id, $item->going, 'lng');
            $e_lat = PostRideAddress($item->post_id, $item->target, 'lat');
            $e_lng = PostRideAddress($item->post_id, $item->target, 'lng');
            if (distance($s_lat, $s_lng, $request->s_lat, $request->s_lng, "K") < $satting) {
                if (distance($e_lat, $e_lng, $request->e_lat, $request->e_lng, "K") < $satting) {
                    array_push($tracking, $item->tracking);
                }
            }
        }

        if (sizeof($tracking) > 0){
            $notification_check = notification::where('user_post', $request->id)->where('user_id',Session('userId')) ->first();
            if ($notification_check) {
                $notification_check->matching = implode(",",$tracking);
                $notification_check->save();
            } else {
                $notification = new notification;
                $notification->type = 'request';
                $notification->user_post = $request->id;
                $notification->matching = implode(",",$tracking);
                $notification->user_id = Session('userId');
                $notification->save();
            }
        }
    }


}

function notification()
{
    notificationAdd();
    $notification_check = notification::where('user_id',Session('userId'))->where('status', 0)->get();
    return $notification_check->count();

}

