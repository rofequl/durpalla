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
    </style>

    <section class="mb-5 overlay">
        <div class="container px-md-0">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
            </div>
            <div class="col-12 col-lg-8 mt-3 mx-auto px-0">

                <div class="card mt-3">
                    <div class="card-header bg-paste text-white py-1">
                        Departure time:
                        <i class="fa fa-calendar"
                           aria-hidden="true"></i> {{$post->d_time}} {{$post->d_time2}} {{$post->departure}}
                        @if($post->return != "")
                            Return time:
                            <i class="fa fa-calendar"
                               aria-hidden="true"></i> {{$post->r_time}} {{$post->r_time2}} {{$post->return}}
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row text-uppercase lh-1-1">
                            <div class="col-md-4">Departure</div>
                            <div class="col-md-4">Destination</div>
                            <div class="col-md-2">kilometers</div>
                            <div class="col-md-2">price</div>
                        </div>
                        <hr class="bg-warning">
                        <div class="news-feed-container pb-2">
                            <ul class="list-unstyled">
                                @foreach($stopover as $stopovers)
                                    <?php
                                    $s_location = PostRideAddress($stopovers->post_id,$stopovers->going,'location');
                                    $e_location = PostRideAddress($stopovers->post_id,$stopovers->target,'location');
                                    ?>
                                    <li>
                                        <div class="row text-center">
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$s_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$e_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 p-0">
                                                    {{$stopovers->distance}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                <div class="price">৳ {{$stopovers->price}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <form method="post" action="{{route('post.ride3')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <div class="row">
                                <div class="col-3">Travel Condition</div>
                                <div class="col-9">
                                    <div class="single-element-widget">
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="condition[]"
                                                       id="inlineCheckbox1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1"><img
                                                            src="{{asset('img/icon/smokeNoSmall.gif')}}">
                                                    Non-smoking</label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="condition[]"
                                                       id="inlineCheckbox1" value="2">
                                                <label class="form-check-label" for="inlineCheckbox1"><img
                                                            src="{{asset('img/icon/phoneAccessYesSmall.gif')}}"> Access to
                                                    driver's phone number</label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="condition[]"
                                                       id="inlineCheckbox1" value="3">
                                                <label class="form-check-label" for="inlineCheckbox1"><img
                                                            src="{{asset('img/icon/airConditionerYesSmall.gif')}}"> Air
                                                    conditioning</label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="condition[]"
                                                       id="inlineCheckbox1" value="4">
                                                <label class="form-check-label" for="inlineCheckbox1"><img
                                                            src="{{asset('img/icon/bagSizeSmallSmall.gif')}}"> Trunk space:
                                                    backpack size only</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="w-100 text-center">
                                <button type="submit" class="genric-btn info circle arrow">Complete
                                    <span class="lnr lnr-arrow-right"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>







@endsection