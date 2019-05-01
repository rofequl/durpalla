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
    </style>


    <section class="my-5 overlay">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="w-100 text-center mb-3 mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
                <div class="row text-center mb-3 mx-auto">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-10 mx-auto">


                </div>
                <div class="col-lg-10 mx-auto">



                            <div class="card mt-3">
                                <div class="card-header bg-paste text-white py-1">
                                    <p class="text-capitalize"></p>
                                </div>
                                <div class="card-body">
                                    <div class="row text-uppercase text-center lh-1-1">
                                        <div class="col-md-2">Time</div>
                                        <div class="col-md">Ride</div>
                                        <div class="col-md-2">Driver</div>
                                        <div class="col-md-2">Price $ Seat</div>
                                        <div class="col-md-2">Condition</div>
                                        <div class="col-md-2">Rating</div>
                                    </div>
                                    <hr class="bg-warning">
                                    <div class="news-feed-container pb-2">
                                        <ul class="list-unstyled">

                                            @foreach ($popular as $populars)
                                                <?php $ride = getSingleStopover($populars->tracking); ?>
                                                @if(getRide($ride->post_id)->status == 1)
                                                    @if(empty($tracking) || in_array($ride->tracking, $tracking))
                                                        <?php
                                                        $s_location = explode(",", PostRideAddress($ride->post_id, $ride->going, 'location'));
                                                        $e_location = explode(",", PostRideAddress($ride->post_id, $ride->target, 'location'));
                                                        ?>

                                                        <li onclick="location.href='{{route('popular.ride.Show',$ride->tracking)}}';">

                                                            <div class="row text-center">
                                                                <div class="col-12 col-sm-4 col-md-2 dateShow lh-1-3 my-auto text-left text-justify">
                                                                    <p class="my-0">Time: {{$ride->time}}
                                                                        :00 {{$ride->time2}}</p>
                                                                    <p class="my-0">Distance: {{$ride->distance}}</p>
                                                                    <p class="my-0">Duration: {{$ride->duration}}</p>
                                                                </div>
                                                                <div style="width: 10px">
                                                                    <div class="relative">
                                                                        <div class="absolute"></div>
                                                                        <div class="absolute2"></div>
                                                                        <div class="absolute3"></div>
                                                                    </div>
                                                                </div>
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
                                                                <div class="col-12 col-sm-4 col-md-2 p-0">

                                                                    <aside class="single_sidebar_widget author_widget text-center lh-1-1">
                                                                        <img class="author_img rounded-circle"
                                                                             width="60px" height="60px"
                                                                             src="{{userInformation(getRide($ride->post_id)->user_id,'image')}}"
                                                                             alt=""><br>
                                                                        <h5 class="my-0">{{userInformation(getRide($ride->post_id)->user_id,'name')}}</h5>
                                                                        <a href="#" class="fs-8 my-0">
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </a><br>
                                                                        <a href="#"
                                                                           class="btn btn-success small circle my-1 fs-10">View
                                                                            profile/Preview</a>
                                                                    </aside>


                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                                    <div class="price my-2 text-bold fs-18 text-black">
                                                                        ৳ {{$ride->price}}</div>
                                                                    @if(seat($ride->going,$ride->target,$ride->post_id,$ride->date) > 0)
                                                                        @for($i=1;$i<=getRide($ride->post_id)->seat;$i++)
                                                                            @if($i > getRide($ride->post_id)->seat - seat($ride->going,$ride->target,$ride->post_id,$ride->date))
                                                                                <span class="fa-2x fas fa-male checked"
                                                                                      data-toggle="tooltip"
                                                                                      data-placement="bottom"></span>
                                                                            @else
                                                                                <span class="fa-2x fas fa-male"
                                                                                      data-toggle="tooltip"
                                                                                      data-placement="bottom"></span>
                                                                            @endif
                                                                        @endfor
                                                                    @else
                                                                        {{"Booked"}}
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                                    <?php
                                                                    $data = explode(",", getRide($ride->post_id)->condition);
                                                                    ?>
                                                                    @if(in_array(1,$data))<img
                                                                            src="{{asset('img/icon/smokeNoSmall.gif')}}">@endif
                                                                    @if(in_array(2,$data))<img
                                                                            src="{{asset('img/icon/bagSizeSmallSmall.gif')}}">@endif
                                                                    @if(in_array(3,$data))<img
                                                                            src="{{asset('img/icon/emailAccessYesSmall.gif')}}">@endif
                                                                    @if(in_array(4,$data))<img
                                                                            src="{{asset('img/icon/phoneAccessYesSmall.gif')}}">@endif
                                                                    <p class="text-bold fs-14"><b
                                                                                class="text-muted">{{getCarById(getRide($ride->post_id)->car_id,'car_type')}}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <p class="lh-1-1">(04)</p>
                                                                    <button class="btn small circle btn-primary my-1 fs-10">
                                                                        Select & Continue
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </li>

                                                    @endif
                                                @endif
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>




                </div>
            </div>
        </div>
    </section>
    <div id="map">

    </div>


@endsection