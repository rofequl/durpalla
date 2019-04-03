@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container postRide-container">

            <h1>Offer a ride</h1>
            <br>
            <form method="post" action="{{route('post.ride2')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="row">
                    <div class="col-lg-6">
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
                        <div class="card">
                            <div class="card-header bg-paste text-white py-1">
                                Price per Co-traveller
                            </div>
                            <div class="card-body bg-light">

                                @foreach($stopover as $stopovers)

                                    <?php
                                    $s_location = PostRideAddress($stopovers->post_id,$stopovers->going,'location');
                                    $e_location = PostRideAddress($stopovers->post_id,$stopovers->target,'location');
                                    $s_lat = PostRideAddress($stopovers->post_id,$stopovers->going,'lat');
                                    $s_lng = PostRideAddress($stopovers->post_id,$stopovers->going,'lng');
                                    $e_lat = PostRideAddress($stopovers->post_id,$stopovers->target,'lat');
                                    $e_lng = PostRideAddress($stopovers->post_id,$stopovers->target,'lng');
                                    ?>

                                    <div class="row">
                                        <div class="col-8">{{$s_location}} <span
                                                    class="lnr lnr-arrow-right"></span> {{$e_location}}</div>
                                        <div class="col-4">

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">৳</span>
                                                </div>
                                                <?php $price = ride_price($s_lat, $s_lng, $e_lat, $e_lng, $post->car_id); ?>
                                                <input type="number" value="{{$price}}" class="form-control" placeholder="00000"
                                                       name="price[]" max="{{$price+100}}" min="{{$price - 100}}" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="card mt-3 p-0 bg-light">
                            <div class="card-body row pb-1">
                                <div class="col-8">Number of seat</div>
                                <div class="col-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"
                                                                                        aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control seat" value="01" name="seat">
                                        <div class="input-group-append">
                                    <span class="input-group-text plus" id="basic-addon1"><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="input-group-append">
                                    <span class="input-group-text minus" id="basic-addon1"><i class="fas fa-minus"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="card p-3">
                            My ride summary
                            <div id="map" style="width: 100%; height: 500px;">
                            </div>
                            <br>
                            <h5>{{$post->s_location}} → {{$post->e_location}}</h5>

                            Departure:
                            {{date("l, F-d", strtotime($post->departure))}}  {{$post->d_time}}:00{{$post->d_time2}}<br>
                            @if($post->return != "")
                                Return ride:
                                {{date("l, F-d", strtotime($post->return))}}  {{$post->r_time}}:00{{$post->r_time2}}<br>
                            @endif
                            Distance:
                            <?php
                            $dist = GetDrivingDistance($post->s_lat, $post->s_lng, $post->e_lat, $post->e_lng);
                            echo $dist['distance'];
                            ?><br>
                            Driving time:
                            {{$dist['time']}}<br>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="mx-auto">
                        <button type="submit" class="genric-btn info circle arrow">Next<span
                                    class="lnr lnr-arrow-right"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </section>



    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 23.777, lng: 90.399
                },
                zoom: 6.5
            });
        }

        $(function(){
            $(".plus").click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $(".seat");
                var value = parseInt($input.val());

                if (value < 12) {
                    value = value + 1;
                }
                else {
                    value =12;
                }

                $input.val(value);
            });

            $(".minus").click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $(".seat");
                var value = parseInt($input.val());

                if (value > 1) {
                    value = value - 1;
                }
                else {
                    value =1;
                }

                $input.val(value);
            });
        });
    </script>



@endsection