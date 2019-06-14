<?php

namespace App\Http\Controllers\frontend;

use App\booking;
use App\booking_cancel;
use App\corporate;
use App\promo_code;
use App\ride_setting;
use App\user_rating;
use PHPUnit\Util\RegularExpression;
use Session;
use App\car;
use App\post_ride;
use App\stopover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function Index($data, $data2 = false)
    {
        $singleStopovers = stopover::where('tracking', $data)->first();
        $booking = booking::where('tracking',$singleStopovers->tracking)->where('status',1)->get();
        $post = post_ride::where('id', $singleStopovers->post_id)->first();
        $car = car::where('user_id', $post->user_id)->where('id', $post->car_id)->first();
        if ($data2) {
            if (Session::get('userId') == null && Session::get('token') == null) {
                Session::flash('message', 'Submit this form Login first.');
                return redirect('login');
            }
            $show = 2;
            return view('frontend.booking.book', compact('singleStopovers', 'post', 'car', 'show','booking'));

        }
        return view('frontend.booking.book', compact('singleStopovers', 'post', 'car','booking'));

    }

    public function PreviewIndex()
    {
        return view('frontend.booking.preview');
    }


    public function Store(Request $request)
    {
        $stopovers = stopover::where('tracking', $request->tracking)->first();
        $seat = $request->seat;
        $message = $request->message;
        $promo = $request->promo;
        $price2 = 0;
        $corporatePrice = 0;
        $userInfo = corporateGroup(userInformation(Session('userId'), 'phone'));
        if ($userInfo) {
            $corporate = corporate::find($userInfo->corporate_id);
            $corporatePrice = (($corporate->discount / 100) * ($stopovers->price * $seat));
        }
        $s_lat = PostRideAddress($stopovers->post_id, $stopovers->going, 'lat');
        $s_lng = PostRideAddress($stopovers->post_id, $stopovers->going, 'lng');
        $e_lat = PostRideAddress($stopovers->post_id, $stopovers->target, 'lat');
        $e_lng = PostRideAddress($stopovers->post_id, $stopovers->target, 'lng');
        if ($request->promo != "") {
            $code = promo_code::where('code', $request->promo)->first();
            if ($code) {
                if (strtotime($stopovers->date) >= strtotime($code->s_date) && strtotime($stopovers->date) <= strtotime($code->e_date)) {
                    $distance = distance($code->lat, $code->lng, $s_lat, $s_lng, "K");
                    $distance2 = distance($code->lat, $code->lng, $e_lat, $e_lng, "K");
                    if ($distance < 25 && $distance2 > $code->r_area) {
                        $price = (($code->p_amount / 100) * ($stopovers->price * $seat));
                        if ($price <= $code->h_amount) {
                            $price2 = $price;
                        } else {
                            $price2 = $code->h_amount;
                        }
                        return view('frontend.booking.preview', compact('seat', 'message', 'code', 'stopovers', 'price2', 'promo', 'corporatePrice'));
                    } else {
                        Session::flash('message', 'Ride Distance');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('message', 'Promo Code Date Over');
                    return redirect()->back();
                }
            } else {
                Session::flash('message', 'Invalid Promo Code');
                return redirect()->back();
            }
        }
        return view('frontend.booking.preview', compact('seat', 'message', 'stopovers', 'price2', 'promo', 'corporatePrice'));
    }

    public function PreviewStore(Request $request)
    {
        $insert = new booking;
        $insert->user_id = Session('userId');
        $insert->tracking = $request->tracking;
        $insert->seat = $request->seat;
        $insert->message = $request->message;
        $insert->promo_code = $request->promo_code;
        $insert->discount = $request->discount;
        $insert->fine = $request->fine;
        $insert->corporate = $request->corporate;
        $insert->amount = $request->amount;
        $insert->save();

        $insert2 = stopover::where('tracking', $request->tracking)->first();
        $seat = $insert2->seat;
        $seat += $request->seat;
        $insert2->seat = $seat;
        $amount = $insert2->payment;
        $amount += $request->amount;
        $insert2->payment = $amount;
        $insert2->save();

        if ($request->fine > 0) {
            $cancel = booking_cancel::where('user_id', Session('userId'))->where('paid', 0)->first();
            $cancel->paid = 1;
            $cancel->save();
        }

        return redirect('booking-congrate');
    }

    public function congrate()
    {
        return view('frontend.booking.congrate');
    }


    public function CurrentBooking($data = false)
    {
        $booking = booking::where('user_id', Session('userId'))->where('status', 1)->get();
        foreach($booking as $bookings){
            $stopover = stopover::where('tracking',$bookings->tracking)->first();
            if ($stopover->status != 0){
                $insert = booking::find($bookings->id);
                $insert->status = 2;
                $insert->save();
            }
        }
        $booking = booking::where('user_id', Session('userId'))->where('status', 1)->get();
        $cancel = "";
        if ($data) {
            $bookingsingle = booking::find($data);
            return view('frontend.sp_panel.booking.current_book', compact('booking', 'cancel', 'bookingsingle'));
        } else {
            return view('frontend.sp_panel.booking.current_book', compact('booking'));
        }


    }

    public function BookingPreviewIndex($id)
    {
        $booking = booking::find($id);
        $stopovers = stopover::where('tracking', $booking->tracking)->first();
        return view('frontend.sp_panel.booking.preview', compact('stopovers', 'booking'));
    }


    public function CurrentBookingCancel(Request $request)
    {
        $money = ride_setting::first();
        $post2 = stopover::where('tracking', $request->tracking)->first();
        $post = strtotime($post2->date) - time();
        $hours = round($post / 3600);
        $insert = new booking_cancel;
        $insert->user_id = Session('userId');
        $insert->tracking = $request->tracking;
        $insert->reason = $request->reason;
        $insert->message = $request->message;
        if ($hours < 6) {
            $price = ($post2->price / 100) * $money->fine_6h;
        } elseif ($hours < 12) {
            $price = ($post2->price / 100) * $money->fine_12h;
        } else {
            $price = ($post2->price / 100) * $money->fine_12_upper;
        }
        $insert->charge = ceil($price);
        $insert->save();

        $booking = booking::where('user_id', Session('userId'))->where('tracking', $request->tracking)->first();
        $booking->status = 0;
        $booking->save();

        $stopover = stopover::where('tracking',$booking->tracking)->first();
        $seat = $stopover->seat - $booking->seat;
        $stopover->seat = $seat;
        $stopover->save();

        return redirect('current-booking');

    }

    public function HistoryBooking($data = false)
    {
        $booking = booking::where('user_id', Session('userId'))->where('status', 2)->get();
        $cancel = "";
        if ($data) {
            $bookingsingle = booking::find($data);
            return view('frontend.sp_panel.booking.current_book', compact('booking', 'cancel', 'bookingsingle'));
        } else {
            return view('frontend.sp_panel.booking.current_book', compact('booking'));
        }


    }
    public function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }
    public function DriverRating(Request $request)
    {
        $rating = explode("_",base64_decode($request->rating));
        $stopover = stopover::where('tracking',$rating[0])->first();
        $driver = post_ride::find($stopover->post_id)->user_id;
        $check = user_rating::where('tracking',$rating[0])->first();
        if ($check){
            $rate = json_decode($check->rating,true);
            $rate = $this->array_push_assoc($rate, Session('userId'), $rating[1]);
            $check->rating = json_encode($rate);
            $check->save();
            return redirect()->back();
        }else{
            $existing = array(Session('userId')=>$rating[1]);
            $insert = new user_rating;
            $insert->user_id = $driver;
            $insert->tracking = $rating[0];
            $insert->rating = json_encode($existing);
            $insert->save();
            return redirect()->back();
        }
    }

}
