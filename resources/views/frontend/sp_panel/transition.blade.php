@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
        <h3 class="my-1">Post ride activaty</h3>
        Here you can find your upcoming ride post.
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
                            <i class="fas fa-wheelchair"></i> {{$stopovers->seat}} seat
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
                            000
                        </div>
                        <div class="col">
                            000
                        </div>
                        <div class="col">
                            000
                        </div>
                        <div class="col">
                            @if($stopovers->status == 0)
                                <span class="badge badge-primary">Upcoming Ride</span>
                            @elseif($stopovers->status == 1)
                                <span class="badge badge-info">Ride Ongoing</span>
                            @else
                                @if($stopovers->status == 2)
                                    <span class="badge badge-success">Ride End</span>
                                    <span class="badge badge-warning">Not Paid</span>
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