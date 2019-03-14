@extends('backend.layout.app')

@section('content')

    <div class="content">


            <div class="card mt-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 border-right py-0">
                            <h3 class="my-1">Ongoing ride</h3>
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
                                <div class="col-12">
                                    Departure:{{$s_location}}<br>
                                    Destination:{{$e_location}}<br>
                                    <i class="far fa-calendar-alt"></i> {{date("l F-d", strtotime($stopovers->date))}}
                                    - {{$stopovers->time}}:{{$stopovers->time2}}<br>
                                    <hr class="bg-success">
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>


    </div>
@endsection
