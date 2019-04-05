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
                                    <li class="border-bottom">
                                        <div class="row text-center">
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$s_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4 location text-left">
                                                {{$e_location}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 p-0">
                                                <?php  $dist = GetDrivingDistance($s_lat, $s_lng, $e_lat, $e_lng); ?>
                                                {{$dist['distance']}}
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                <div class="price">{{$stopovers->price}}$</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if($post->status == 0)
                            <a href="{{url('admin-pending-post-change'.'?a=add&b='.$post->id)}}"
                               class="btn btn-sm btn-primary">Approve</a>
                            <a href="{{url('admin-pending-post-change'.'?a=del&b='.$post->id)}}"
                               class="btn btn-sm btn-danger">Disapprove</a>
                        @elseif($post->status == 1)
                            <a href="{{url('admin-pending-post-change'.'?a=del&b='.$post->id)}}"
                               class="btn btn-sm btn-danger">Disapprove</a>
                        @else
                            <a href="{{url('admin-pending-post-change'.'?a=add&b='.$post->id)}}"
                               class="btn btn-sm btn-primary">Approve</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


@endsection