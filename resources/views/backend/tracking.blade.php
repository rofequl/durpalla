@extends('backend.layout.app')

@section('content')

    <div class="content">


        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Tracking Ride Id: {{$ride->tracking}}
            </div>
            <div class="card-body">
                <div class="row border-bottom">
                    <div class="col-3">Time</div>
                    <div class="col-3">Ride</div>
                    <div class="col-3">Driver</div>
                    <div class="col-3">Action</div>
                </div>
                <div class="row py-2">
                    <div class="col-3">
                        <p class="my-0 fs-12 lh-1-2">{{date("l F-d", strtotime($postRide->departure))}}</p>
                        <p class="my-0 fs-12 lh-1-2">{{$postRide->d_time}}:00 {{$postRide->d_time2}}</p>
                        <?php $dist = GetDrivingDistance($ride->s_lat, $ride->s_lng, $ride->e_lat, $ride->e_lng); ?>
                        <p class="my-0 fs-12 lh-1-2">Distance: {{$dist['distance']}}</p>
                        <p class="my-0 fs-12 lh-1-2">Duration: {{$dist['time']}}</p>
                    </div>
                    <div class="col-3">
                        <h6>Departure</h6>
                        <p class="fs-12 lh-1-2">{{$ride->s_location}}</p>
                        <h6>Destination</h6>
                        <p class="fs-12 lh-1-2">{{$ride->e_location}}</p>
                    </div>
                    <div class="col-3">
                        <h5 class="my-0">Charlie Barber</h5>
                    </div>
                    <div class="col-3">
                        <a href="" class="btn btn-sm btn-success my-1 fs-6">Complain</a>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection