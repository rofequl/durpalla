@extends('frontend.layout.app')
@section('content')
    <style>
        .news-feed-container {
            float: none;
            clear: none;
            width: 100%;
            height: auto;
            font-size: 12px;
            overflow: hidden;
            border-top: 0;
            border-bottom: 0;
        }

        div.relative {
            position: relative;
            width: 28px;
            height: 70px;
            border: 0;
        }

        div.absolute {
            position: absolute;
            top: 4px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }

        div.absolute2 {
            position: absolute;
            top: 14px;
            left: 10px;
            height: 36px;
            border: 1px solid #73AD21;
        }

        div.absolute3 {
            position: absolute;
            top: 50px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }
    </style>

    <hr class="mt-0">
    <section class="mb-5 overlay">
        <div class="container">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Post a Request. <span class="text-primary">Get Alerts.</span></h2>
                    <p>We'll notify you via email of every long distance rideshare that passes by you and your
                        destination. Post your information for drivers to see.<span
                                class="font-weight-bold">Try it out!</span></p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">

                    <div class="card col-12 col-md-9 px-0 mt-3">
                        <div class="card-header bg-paste text-white py-1">
                            <p class="text-capitalize">Request Ride</p>
                        </div>
                        <div class="card-body">
                            <div class="row text-uppercase lh-1-1">
                                <div class="col-md-3">Time</div>
                                <div class="col-md">Ride</div>
                                <div class="col-md-2 text-center">Seat</div>
                            </div>
                            <hr class="bg-warning">
                            <div class="news-feed-container pb-2">
                                <ul class="list-unstyled">
                                    @foreach($ride as $rides)
                                    <li>
                                        <div class="row text-center">
                                            <div class="col-12 col-sm-4 col-md-3 dateShow lh-1-3 my-auto text-left text-justify">
                                                <p class="my-0">After: {{$rides->after}}</p>
                                                <p class="my-0">Before: {{$rides->before}}</p>
                                                <?php  $dist = GetDrivingDistance($rides->s_lat, $rides->s_lng, $rides->e_lat, $rides->e_lng); ?>
                                                <p class="my-0">Distance: {{$dist['distance']}}</p>
                                                <p class="my-0">Duration: {{$dist['time']}}</p>
                                            </div>
                                            <div style="width: 10px">
                                                <div class="relative">
                                                    <div class="absolute"></div>
                                                    <div class="absolute2"></div>
                                                    <div class="absolute3"></div>
                                                </div>
                                            </div>
                                            <?php
                                            $s_location = explode(",", $rides->s_location);
                                            $e_location = explode(",", $rides->e_location);
                                            ?>
                                            <div class="col-11 col-sm-4 col-md location text-left">
                                                <h4 class="fs-13">@for($x = count($s_location)-2; $x < count($s_location); $x++)
                                                        {{$s_location[$x].','}}
                                                    @endfor</h4>
                                                <p>@for($x = 0; $x < count($s_location)-2; $x++)
                                                        {{$s_location[$x].','}}
                                                    @endfor</p>

                                                <h4 class="fs-13">@for($x = count($e_location)-2; $x < count($e_location); $x++)
                                                        {{$e_location[$x].','}}
                                                    @endfor</h4>
                                                <p class="mb-0">@for($x = 0; $x < count($e_location)-2; $x++)
                                                        {{$e_location[$x].','}}
                                                    @endfor</p>

                                            </div>

                                            <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                    @for($i=1;$i<=$rides->seat;$i++)
                                                            <span class="fa-2x fas fa-male checked"
                                                                  data-toggle="tooltip"
                                                                  data-placement="bottom"></span>
                                                    @endfor
                                            </div>

                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>


    <script>
    </script>







@endsection