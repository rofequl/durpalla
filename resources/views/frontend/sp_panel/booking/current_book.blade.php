@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">

        @if(isset($cancel))
            <div class="card mb-5">
                <div class="card-header py-0">
                    <h3 class="my-1">Are you sure you want to cancel this booking?</h3>
                </div>

                <form method="post" action="{{route('current.booking.cancel')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="tracking" value="{{$bookingsingle->tracking}}">
                    <div class="card-body">
                        Please tell us the reason for deleting your ride. It'll help us improve our service.
                        <select name="reason" class="form-control shadow-none my-2">
                            <option>pick one</option>
                            <option value="1">pick one</option>
                            <option value="2">pick one</option>

                        </select>
                        <textarea name="message" class="form-control shadow-none"
                                  placeholder="Please provide details(this only)"></textarea>
                        Your cancel rate is record
                    </div>
                    <div class="p-2 px-2 border-top">
                        <button type="submit" class="btn btn-sm btn-warning mx-2">Cancel</button>
                        <a href="{{route('current.booking')}}" class="btn btn-sm btn-light border">Don't Cancel</a>
                    </div>
                </form>
            </div>
        @endif

        Here you can find your current bookings. Past bookings can be found in your booking history.
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
                            <i class="fas fa-wheelchair"></i> {{$bookings->seat}} seat - ${{$bookings->amount}} cash<br>
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