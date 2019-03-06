<?php


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
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&key=AIzaSyCMfl6pAmNv3T6PoDRy7ESSJRZLLSFf2jI";
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

function getRide($column)
{
    $query = DB::table('post_rides')
        ->where('departure', '=', $column)
        ->get();
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
        ->where('post_id', '=', $column)
        ->get();
    return $query;
}

function car($column)
{
    $query = DB::table('cars')
        ->where('user_id', '=', $column)
        ->get();
    return $query;
}

function ride_price($lat1, $lon1, $lat2, $lon2)
{
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $km = $miles * 1.609344;

    $query = DB::table('ride_settings')->first();

    if ($query){
        if ($km > $query->km_1st){
            $price = (($km - $query->km_1st) * $query->price2) + ($query->km_1st * $query->price);
            return number_format((float)$price, 2, '.', '');
        }else{
            $price = $km * $query->price;
            return number_format((float)$price, 2, '.', '');
        }
    }else{
        return 00;
    }

}