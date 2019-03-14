@extends('backend.layout.app')

@section('content')

    <div class="content">

        @if(!isset($id))
            <div class="card mt-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 border-right py-0">
                            <h3 class="my-1">Partial Book Ride time over</h3>
                        </div>
                        <div class="col">
                            <a href="{{route('admin.partial.book','time')}}" class="btn btn-sm btn-primary">Not time
                                over</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($stopover as $stopovers)
                            <?php
                            $s_location = PostRideAddress($stopovers->post_id, $stopovers->going, 'location');
                            $e_location = PostRideAddress($stopovers->post_id, $stopovers->target, 'location');
                            $s_lat = PostRideAddress($stopovers->post_id, $stopovers->going, 'lat');
                            $s_lng = PostRideAddress($stopovers->post_id, $stopovers->going, 'lng');
                            $e_lat = PostRideAddress($stopovers->post_id, $stopovers->target, 'lat');
                            $e_lng = PostRideAddress($stopovers->post_id, $stopovers->target, 'lng');
                            ?>
                            @if(seat($stopovers->going,$stopovers->target,$stopovers->post_id) > 0 && $stopovers->seat > 0)
                                <div class="col-12">
                                    Departure:{{$s_location}}<br>
                                    Destination:{{$e_location}}<br>
                                    <i class="far fa-calendar-alt"></i> {{date("l F-d", strtotime($stopovers->date))}}
                                    - {{$stopovers->time}}:{{$stopovers->time2}}<br>
                                    <hr class="bg-success">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(isset($id))
            <div class="card mt-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 border-right py-0">
                            <h3 class="my-1">Partial Book Ride time not over</h3>
                        </div>
                        <div class="col">
                            <a href="{{route('admin.partial.book')}}" class="btn btn-sm btn-primary">Time
                                over</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($stopover as $stopovers)
                            <?php
                            $s_location = PostRideAddress($stopovers->post_id, $stopovers->going, 'location');
                            $e_location = PostRideAddress($stopovers->post_id, $stopovers->target, 'location');
                            $s_lat = PostRideAddress($stopovers->post_id, $stopovers->going, 'lat');
                            $s_lng = PostRideAddress($stopovers->post_id, $stopovers->going, 'lng');
                            $e_lat = PostRideAddress($stopovers->post_id, $stopovers->target, 'lat');
                            $e_lng = PostRideAddress($stopovers->post_id, $stopovers->target, 'lng');
                            ?>
                            @if(seat($stopovers->going,$stopovers->target,$stopovers->post_id) > 0 && $stopovers->seat > 0)
                                <div class="col-12">
                                    Departure:{{$s_location}}<br>
                                    Destination:{{$e_location}}<br>
                                    <i class="far fa-calendar-alt"></i> {{date("l F-d", strtotime($stopovers->date))}}
                                    - {{$stopovers->time}}:{{$stopovers->time2}}<br>
                                    <hr class="bg-success">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
