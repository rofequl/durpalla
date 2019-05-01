@extends('backend.layout.app')

@section('content')

    <div class="content">


        <div class="container px-md-0">
            <div class="col-12 mt-3 mx-auto">

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white py-1">
                        Departure time:
                        <i class="fa fa-calendar"
                           aria-hidden="true"></i> {{$post->d_time}} {{$post->d_time2}} {{$post->departure}}
                        @if($post->return != "")<br>
                        Return time:
                        <i class="fa fa-calendar"
                           aria-hidden="true"></i> {{$post->r_time}} {{$post->r_time2}} {{$post->return}}
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row text-uppercase text-center lh-1-1">
                            <div class="col-md-4">Departure</div>
                            <div class="col-md-4">Destination</div>
                            <div class="col-md">kilometers</div>
                            <div class="col-md">price</div>
                            <div class="col-md">Action</div>
                        </div>
                        <hr class="bg-warning">
                        <div class="news-feed-container pb-2">
                            <ul class="list-unstyled">
                                @foreach($stopover as $stopovers)
                                    <?php
                                    $s_location = PostRideAddress($stopovers->post_id, $stopovers->going, 'location');
                                    $e_location = PostRideAddress($stopovers->post_id, $stopovers->target, 'location');
                                    ?>
                                    <li class="border-bottom">
                                        <div class="row text-center my-2">
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$s_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$e_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md p-0">
                                                {{$stopovers->distance}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md reviewStar my-auto">
                                                <div class="price">৳ {{$stopovers->price}}</div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md reviewStar my-auto">
                                                @if(PopularPostCheck($stopovers->tracking))
                                                    <a href="{{route('admin.popular.ride.update','remove='.base64_encode($stopovers->tracking))}}"
                                                       class="btn btn-sm btn-danger">Cancel</a>
                                                @else
                                                    <a href="{{route('admin.popular.ride.update','add='.base64_encode($stopovers->tracking))}}"
                                                       class="btn btn-sm btn-success">Post</a>
                                                @endif

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


@endsection