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
            top: 10px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }

        div.absolute2 {
            position: absolute;
            top: 20px;
            left: 10px;
            height: 54px;
            border: 1px solid #73AD21;
        }

        div.absolute3 {
            position: absolute;
            top: 72px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }
    </style>f


    <section class="my-5 overlay">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
            </div>
            <div class="col-lg-10 mx-auto">

                @foreach ($group as $groups)
                    <div class="card mt-3">
                        <div class="card-header bg-paste text-white py-1">
                            <p class="text-capitalize">{{date("l F-d", strtotime($groups))}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row text-uppercase text-center lh-1-1">
                                <div class="col-md-2">Time</div>
                                <div class="col-md-1"></div>
                                <div class="col-md">Ride</div>
                                <div class="col-md-2">Driver</div>
                                <div class="col-md-2">Condition</div>
                                <div class="col-md-2">Rating & price</div>
                            </div>
                            <hr class="bg-warning">
                            <div class="news-feed-container pb-2">
                                <ul class="list-unstyled">

                                    @foreach (getRide($groups) as $rides)
                                        @foreach (getStopoverRide($rides->id) as $ride)
                                            <li>
                                                <div class="row text-center">
                                                    <div class="col-12 col-sm-4 col-md-2 dateShow lh-1-3">
                                                        <p class="my-0">{{$rides->d_time}}:00 {{$rides->d_time2}}</p>
                                                        <?php $dist = GetDrivingDistance($ride->s_lat, $ride->s_lng, $ride->e_lat, $ride->e_lng); ?>
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
                                                    <div class="col-11 col-sm-4 col-md location text-left">

                                                        <h4>Departure</h4>
                                                        <p>{{$ride->s_location}}</p><br>
                                                        <h4>Destination</h4>
                                                        {{$ride->e_location}}
                                                        <p></p>


                                                    </div>
                                                    <div class="col-12 col-sm-4 col-md-2 p-0">

                                                        <aside class="single_sidebar_widget author_widget text-center lh-1-1">
                                                            <img class="author_img w-25 rounded-circle"
                                                                 src="img/blog/author.png" alt=""><br>
                                                            <h5 class="my-0">Charlie Barber</h5>
                                                            <a href="#" class="fs-8 my-0">
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            </a><br>
                                                            <a href="#" class="btn btn-success small circle my-1 fs-10">View
                                                                profile/Preview</a>
                                                        </aside>


                                                    </div>
                                                    <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                        <?php
                                                        $data = explode(",", $rides->condition)
                                                        ?>
                                                        @if(in_array(1,$data))<img
                                                                src="{{asset('img/icon/smokeNoSmall.gif')}}">@endif
                                                        @if(in_array(2,$data))<img
                                                                src="{{asset('img/icon/bagSizeSmallSmall.gif')}}">@endif
                                                        @if(in_array(3,$data))<img
                                                                src="{{asset('img/icon/emailAccessYesSmall.gif')}}">@endif
                                                        @if(in_array(4,$data))<img
                                                                src="{{asset('img/icon/phoneAccessYesSmall.gif')}}">@endif
                                                    </div>
                                                    <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                        <div class="price">{{$ride->price}}$</div>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>





@endsection