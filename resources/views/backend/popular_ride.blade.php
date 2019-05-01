@extends('backend.layout.app')

@section('content')

    <div class="content">


        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Select popular ride
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Time</th>
                        <th>Ride</th>
                        <th>Driver</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ride as $rides)
                        <tr>
                            <td>
                                <p class="my-0 fs-12 lh-1-2">{{date("l F-d", strtotime($rides->departure))}}</p>
                                <p class="my-0 fs-12 lh-1-2">{{$rides->d_time}}:00 {{$rides->d_time2}}</p>
                                <?php $dist = GetDrivingDistance($rides->s_lat, $rides->s_lng, $rides->e_lat, $rides->e_lng); ?>
                                <p class="my-0 fs-12 lh-1-2">Distance: {{$dist['distance']}}</p>
                                <p class="my-0 fs-12 lh-1-2">Duration: {{$dist['time']}}</p>
                            </td>
                            <td>
                                <h6>Departure</h6>
                                <p class="fs-12 lh-1-2">{{$rides->s_location}}</p>
                                <h6>Destination</h6>
                                <p class="fs-12 lh-1-2">{{$rides->e_location}}</p>
                            </td>
                            <td>
                                <aside class="text-center">
                                    <img class="author_img rounded-circle"
                                         width="60px" height="60px"
                                         src="{{userInformation($rides->user_id,'image')}}"
                                         alt=""><br>
                                    <h5 class="my-0 py-0">{{userInformation($rides->user_id,'name')}}</h5>
                                    <a href="#" class="fs-8 my-0">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </a><br>
                                    <a href="#"
                                       class="btn btn-sm btn-success my-1">View
                                        profile/Preview</a>
                                </aside>
                            </td>
                            <td>
                                <a href="{{route('admin.popular.ride.profile',$rides->id)}}" class="btn btn-sm btn-success my-1 fs-6">View
                                    ride</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection