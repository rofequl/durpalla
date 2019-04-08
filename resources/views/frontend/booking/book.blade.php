@extends('frontend.layout.app')
@section('content')

    <section class="my-5 overlay">
        <div class="container">

            <div class="row single-post-area">
                <div class="text-center mb-3 mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
                <div class="col-8">
                    <div class="p-2 border rounded fbf7f7">
                        <div id="map" class="rounded border" style="width: 100%; height: 300px;">

                        </div>


                        @if(isset($show))
                            <h3 class="mt-5 text-muted text-center">Enter your information</h3>
                            @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form class="my-3" method="post" action="{{route('booking.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="tracking" value="{{$singleStopovers->tracking}}">
                                <div class="form-inline">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-car"
                                                                                        aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="single-input form-control border seat" value="01"
                                               name="seat" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text plus" id="basic-addon1"><i
                                                        class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text minus" id="basic-addon1"><i
                                                        class="fas fa-minus"></i></span>
                                        </div>
                                    </div>
                                    @if(!corporateGroup(userInformation(Session('userId'), 'phone')))
                                        <div class="form-group ml-2 input-group-sm w-50 mb-3">
                                            <input type="text"
                                                   class="single-input form-control shadow-none border w-100"
                                                   name="promo" placeholder="Enter Promo Code">
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <textarea class="single-textarea rounded border" name="message"
                                              placeholder="Message"
                                              rows="3"></textarea>
                                </div>
                                <button class="blog_btn border mb-4 rounded text-right">Ride Booking</button>
                            </form>
                        @endif


                        <div class="row">
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list fs-12">
                                        <li><a href="#">{{userInformation($post->user_id,'name')}}<i
                                                        class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{$singleStopovers->date}}<i class="lnr lnr-calendar-full"></i></a>
                                        </li>
                                        <li><a href="#">{{$singleStopovers->time}}:{{$singleStopovers->time2}}<i
                                                        class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">৳ {{$singleStopovers->price}}<i class="lnr lnr-bubble"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">{{seat($singleStopovers->going,$singleStopovers->target,$singleStopovers->post_id,$singleStopovers->date)}}
                                                Seat<i
                                                        class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            $s_location = PostRideAddress($singleStopovers->post_id, $singleStopovers->going, 'location');
                            $e_location = PostRideAddress($singleStopovers->post_id, $singleStopovers->target, 'location');
                            $s_lat = PostRideAddress($singleStopovers->post_id, $singleStopovers->going, 'lat');
                            $s_lng = PostRideAddress($singleStopovers->post_id, $singleStopovers->going, 'lng');
                            $e_lat = PostRideAddress($singleStopovers->post_id, $singleStopovers->target, 'lat');
                            $e_lng = PostRideAddress($singleStopovers->post_id, $singleStopovers->target, 'lng');
                            ?>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h3 class="fs-15">
                                    Departure: {{$s_location}}</h3>
                                <h3 class="fs-15">
                                    Destination: {{$e_location}}</h3>
                                <div class="row mt-4 mb-2">
                                    <div class="col-6">
                                        <h5>Car Information:</h5>
                                        <img src="{{asset('storage/car/'.$car->car_image1)}}"
                                             class="img-thumbnail w-75" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <?php  $dist = GetDrivingDistance($s_lat, $s_lng, $e_lat, $e_lng); ?>


                                            <div class="col-12">
                                                @if(Session::get('userId') != null && Session::get('token') != null && !isset($show) && seat($singleStopovers->going,$singleStopovers->target,$singleStopovers->post_id,$singleStopovers->date) != 0 && Session::get('userId') != getRide($singleStopovers->post_id)->user_id)
                                                    <a href="{{url('booking'.'/'.$singleStopovers->tracking.'/'.'get')}}"
                                                       class="blog_btn border mb-4 rounded float-right">
                                                        Book Now
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-6 text-right">
                                                Distance:
                                            </div>
                                            <div class="col-6">
                                                {{$dist['distance']}}
                                            </div>
                                            <div class="col-6 text-right">
                                                Duration:
                                            </div>
                                            <div class="col-6">
                                                {{$dist['time']}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-bordered table-responsive fs-12 lh-1-4">
                                    <thead>
                                    <tr>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Fuel Type</th>
                                        <th scope="col">Kilometers run</th>
                                        <th scope="col">Car type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{CarBrandById($car->brand_id)}}</td>
                                        <td>{{$car->model}}</td>
                                        <td>{{$car->fuel}}</td>
                                        <td>{{$car->kilometers}}</td>
                                        <td>{{$car->car_type}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <h4>Ride already Booking:</h4>
                                @foreach($booking as $bookings)

                                   Name: {{UserName($bookings->user_id)}}<br>
                                   Seat: {{$bookings->seat}}

                                @endforeach


                            </div>


                        </div>


                    </div>
                </div>
                <div class="col-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">
                            <?php
                            if ($post->driver == 'SP') {
                                $image = userInformation($post->user_id, 'image');
                                $name = userInformation($post->user_id, 'name');
                            } else {
                                $image = asset('storage/resource/' . getResourceById($post->driver)->image);
                                $name = getResourceById($post->driver)->name;
                            }
                            ?>

                            <img class="author_img rounded-circle" src="{{$image}}"
                                 width="100px" height="100px"
                                 alt="">
                            <h4>{{$name}}</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                            </p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Rider Posts</h3>
                            <h3 class="fs-10">03-Jun-2019</h3>
                            <p class="fs-12 ml-3">Departure: Dhaka, Bangladesh.<br>
                                Destination: Narayanganj, Bangladesh.</p>
                            <hr>
                            <h3 class="fs-10">03-Jun-2019</h3>
                            <p class="fs-12 ml-3">Departure: Dhaka, Bangladesh.<br>
                                Destination: Narayanganj, Bangladesh.</p>
                            <hr>
                            <h3 class="fs-10">03-Jun-2019</h3>
                            <p class="fs-12 ml-3">Departure: Dhaka, Bangladesh.<br>
                                Destination: Narayanganj, Bangladesh.</p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script>

        @if(Session::get('userId') == null && Session::get('phone') == null)

        $(document).ready(function () {
            swal({
                title: "You are not Login",
                text: "If you click 'OK' you go login page.",
                type: "warning",
                showCancelButton: true
            }, function () { // Redirect the user | linkURL is href url
                window.location.href = "{{route('sp.login')}}";
            });
        });

        @endif

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 23.777, lng: 90.399
                },
                zoom: 6.5
            });
        }

        $(function () {
            $(".plus").click(function () {
                let input = $(".seat"), value = parseInt(input.val()),
                    seat = {{seat($singleStopovers->going,$singleStopovers->target,$singleStopovers->post_id,$singleStopovers->date)}};
                if (value < seat) value = value + 1;
                else value = seat;
                input.val(value);
            });

            $(".minus").click(function (e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $(".seat");
                var value = parseInt($input.val());

                if (value > 1) {
                    value = value - 1;
                } else {
                    value = 1;
                }

                $input.val(value);
            });
        });
    </script>

@endsection