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
                    @foreach ($ride as $rides)
                                <tr>
                                    <td>
                                        <p class="my-0 fs-12 lh-1-2">{{date("l F-d", strtotime($rides->departure))}}</p>
                                        <p class="my-0 fs-12 lh-1-2">{{$rides->d_time}}:00 {{$rides->d_time2}}</p>
                                        <p class="my-0 fs-12 lh-1-2">Distance: {{$rides->distance}}</p>
                                        <p class="my-0 fs-12 lh-1-2">Duration: {{$rides->duration}}</p>
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

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection