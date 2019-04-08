@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">


        Here you can find your History bookings. Recent bookings can be found in your Recent booking.
        <div class="card mt-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-8 border-right">
                        Booking Information
                    </div>
                    <div class="col">
                        Action
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($booking as $bookings)
                        <?php
                        $stopover = getSingleStopover($bookings->tracking);
                        $s_location = PostRideAddress($stopover->post_id, $stopover->going, 'location');
                        $e_location = PostRideAddress($stopover->post_id, $stopover->target, 'location');
                        ?>
                        <div class="col-8 border-right">
                            Departure:{{$s_location}}<br>
                            Destination:{{$e_location}}<br>
                            <i class="far fa-calendar-alt"></i> {{date("l F-d", strtotime($stopover->date))}}
                            - {{$stopover->time}}:{{$stopover->time2}}<br>
                            <i class="fas fa-wheelchair"></i> {{$bookings->seat}} seat - ৳{{$bookings->amount}} cash<br>
                        </div>
                        <div class="col-4">
                            <a href="{{route('booking.preview.index',$bookings->id)}}" type="button"
                               class="btn btn-sm btn-success">View Ride</a>
                            <a href="{{route('current.booking',$bookings->id)}}" type="button"
                               class="btn btn-sm btn-danger">Cancel Ride</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection