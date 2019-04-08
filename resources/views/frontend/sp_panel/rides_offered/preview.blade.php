@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">

        <div class="container px-md-0">
            <div class="col-12 col-lg-12 mt-3 mx-auto px-0">

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
                                    $s_lat = PostRideAddress($stopovers->post_id,$stopovers->going,'lat');
                                    $s_lng = PostRideAddress($stopovers->post_id,$stopovers->going,'lng');
                                    $e_lat = PostRideAddress($stopovers->post_id,$stopovers->target,'lat');
                                    $e_lng = PostRideAddress($stopovers->post_id,$stopovers->target,'lng');
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
                                                <?php echo distance($s_lat, $s_lng, $e_lat, $e_lng, "K") . " Km"; ?>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                <div class="price">{{$stopovers->price}}৳</div>
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
    </div>


@endsection