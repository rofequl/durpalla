@extends('backend.layout.app')

@section('content')

    <div class="content">
        <h3 class="my-1">Post ride activaty</h3>
        Here you can find your upcoming ride post.
        <form class="mt-2" method="get" action="{{route('admin.transition')}}">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" name="userId" value="{{$userId}}" class="form-control mb-2" id="inlineFormInput" placeholder="User Id">
                </div>
                <div class="col-auto">
                    <input type="text" name="tracking" value="{{$tracking}}" class="form-control mb-2" id="inlineFormInput" placeholder="Ride Tracking No">
                </div>
                <div class="col-auto">
                    <select class="custom-select mb-2" name="filter" id="inlineFormCustomSelect">
                        <option selected value="">Choose...</option>
                        <option value="4">Upcoming</option>
                        <option value="1">Ongoing</option>
                        <option value="2">End Ride</option>
                        <option value="3">Complete Ride</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
            </div>
        </form>
        <div class="card mt-2">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-6">
                        Ride Information
                    </div>
                    <div class="col border-left">
                        Collection
                    </div>
                    <div class="col border-left">
                        Commission
                    </div>
                    <div class="col border-left">
                        Net Profit
                    </div>
                    <div class="col border-left">
                        Status
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                @foreach($stopover as $stopovers)
                    <?php
                    $s_location = explode(",", PostRideAddress($stopovers->post_id, $stopovers->going, 'location'));
                    $e_location = explode(",", PostRideAddress($stopovers->post_id, $stopovers->target, 'location'));
                    ?>
                    <div class="row border-bottom">
                        <div class="col-2 text-left">
                            <i class="far fa-calendar-alt"></i> {{date("l F-d", strtotime($stopovers->date))}}
                            <br> {{$stopovers->time}}:{{$stopovers->time2}}<br>
                            <i class="fas fa-wheelchair"></i> {{$stopovers->seat}} seat<br>
                            Tracking: {{$stopovers->tracking}}

                        </div>
                        <div class="col-4 text-left">
                            <h4 class="my-0">@for($x = count($s_location)-2; $x < count($s_location); $x++)
                                    {{$s_location[$x].','}}
                                @endfor</h4>
                            <p>@for($x = 0; $x < count($s_location)-2; $x++)
                                    {{$s_location[$x].','}}
                                @endfor</p>

                            <h4 class="my-0">@for($x = count($e_location)-2; $x < count($e_location); $x++)
                                    {{$e_location[$x].','}}
                                @endfor</h4>
                            <p class="mb-0">@for($x = 0; $x < count($e_location)-2; $x++)
                                    {{$e_location[$x].','}}
                                @endfor</p>
                        </div>
                        <div class="col border-left">
                            {{$stopovers->payment}}
                        </div>
                        <div class="col">
                            {{($stopovers->payment*$setting)/100}}
                        </div>
                        <div class="col">
                            {{$stopovers->payment-(($stopovers->payment*$setting)/100)}}
                        </div>
                        <div class="col">
                            @if($stopovers->status == 0)
                                <span class="badge badge-primary">Upcoming Ride</span>
                            @elseif($stopovers->status == 1)
                                <span class="badge badge-info">Ride Ongoing</span>
                            @else
                                @if($stopovers->status == 2)
                                    <span class="badge badge-success">Ride End</span>
                                    <a href="{{route('admin.transition.update','id='.$stopovers->id)}}" class="btn btn-sm btn-primary my-2">Rider Payment</a>
                                @else
                                    <span class="badge badge-success">Complete Ride</span>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection