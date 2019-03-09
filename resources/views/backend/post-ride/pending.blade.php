@extends('backend.layout.app')

@section('content')

    <div class="content">


        <div class="card shadow">
            <div class="card-header bg-success text-white">
                All Pending Ride
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
                    @foreach ($group as $groups)
                        @foreach (getRide($groups) as $rides)
                            @if($rides->status == 0)
                                <tr>
                                    <td>
                                        <p class="my-0 fs-12 lh-1-2">{{date("l F-d", strtotime($groups))}}</p>
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

                                    </td>
                                    <td>
                                        <a href="{{route('admin.pending.post').'/'.$rides->id}}" class="btn btn-sm btn-success my-1 fs-6">View
                                            ride</a>
                                    </td>
                                </tr>

                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection