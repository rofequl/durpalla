@extends('frontend.layout.app')
@section('content')
    <style>
        #img {
            height: 65vh;
            width: 100%;
        }
    </style>
    <!--================ Start Home Banner Area =================-->
    <section class="overlay">
        <img src="{{$landingPage? asset('storage/landing_page/'.$landingPage) : "img/landing_page.jpg"}}" id="img">
        <div class="card card-body AnyEvery ml-md-5">
            <form method="post" action="{{route('all.ride.search')}}" autocomplete="off">
                {{csrf_field()}}
                <h4 class="Helvetica-Bold">Anywhere to Everywhere</h4>
                <div class="row m-l-0">
                    <div style="width: 10px">
                        <div class="relative">
                            <div class="absolute"></div>
                            <div class="absolute2"></div>
                            <div class="absolute3"></div>
                        </div>
                    </div>
                    <div class="col" style="margin-left: -25px">
                        <input type="text" name="address" id="start" class="AnyEveryInput mb-2" placeholder="Leaving From">
                        <input type="hidden" name="lat" id="lat"
                               value="@if(isset($userLat)) {{$userLat}} @endif">
                        <input type="hidden" name="lng" id="lng"
                               value="@if(isset($userLng)) {{$userLng}} @endif">
                        <input type="hidden" name="location" id="location"
                               value="@if(isset($userLoca)) {{$userLoca}} @endif">
                        <input type="text" name="address" id="end" class="AnyEveryInput" placeholder="Going to">
                        <input type="hidden" name="lat2" id="lat2"
                               value="@if(isset($userLat2)) {{$userLat2}} @endif">
                        <input type="hidden" name="lng2" id="lng2"
                               value="@if(isset($userLng2)) {{$userLng2}} @endif">
                        <input type="hidden" name="location2" id="location2"
                               value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                    </div>
                </div>
                <p class="mb-0">Date and time</p>
                <div class="form-inline">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="form-group">
                        <input type="text" name="date" id="datePicker" readonly class="form-control-plaintext datepicker" style="outline: 0"
                               placeholder="06/11/2019">
                    </div>
                    <button type="submit" class="btn btn-light btn-pill border"><i class="fas fa-search mr-2"></i> Search</button>
                </div>
            </form>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Popular Rides Area =================-->
    <section id="PopularRide">
        <div class="container-fluid p-3">
            <h3 class="text-center text-white my-3 Helvetica-Bold">Popular Rides</h3>
            <div class="row justify-content-center">
                @foreach ($popular as $populars)
                    <?php $ride = getSingleStopover($populars->tracking); ?>
                    @if(getRide($ride->post_id)->status == 1)
                        @if(empty($tracking) || in_array($ride->tracking, $tracking))
                            <?php
                            $s_location = explode(",", PostRideAddress($ride->post_id, $ride->going, 'location'));
                            $e_location = explode(",", PostRideAddress($ride->post_id, $ride->target, 'location'));
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 bg-white rounded mx-2">
                                <i class="far fa-circle"></i>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-7">
                    <p class="mt-3"><a href="{{route('popular.ride')}}" class="text-white fs-12">Click to see all Popular
                            rides</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Features Area =================-->


    <!--================ Long distance ride section Start ================-->
    <section class="about-area mt-0 pb-5" id="longDistance">
        <div class="container pt-5">
            <div class="about-inner">
                <div class="row justify-content-center">
                    <div class="col-md-8 row">
                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="BackDiv">
                                <img src="{{asset('PNG/LONG DISTANCE RIDE SHARING/Layer 7.png')}}">
                            </div>
                            <h4 class="text-center mb-0">Sign up for free</h4>
                            <p class="text-center">Qualified Drivers</p>
                        </div>
                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="BackDiv">
                                <img src="{{asset('PNG/LONG DISTANCE RIDE SHARING/Layer 5.png')}}">
                            </div>
                            <h4 class="text-center mb-0">Daily commute</h4>
                            <p class="text-center">Service Provider</p>
                        </div>
                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="BackDiv">
                                <img src="{{asset('PNG/LONG DISTANCE RIDE SHARING/Layer 8.png')}}">
                            </div>
                            <h4 class="text-center mb-0">Long distance</h4>
                            <p class="text-center"></p>
                        </div>
                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="BackDiv">
                                <img src="{{asset('PNG/LONG DISTANCE RIDE SHARING/Layer 6.png')}}">
                            </div>
                            <h4 class="text-center mb-0">Online payment</h4>
                            <p class="text-center"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Long distance ride section Start ================-->


    <!--================ Start Video Area =================-->
    <section class="video-sec-area section_gap_top mb-5 pt-0" id="about">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-7 video-right mt-0">
                    <p class="driver-prompt ml-4">
                        Driver?<span><a href="#"> Post your ride now!</a></span></p>
                    <div class="news-feed-container pb-2">
                        <ul class="list-unstyled" id="ulLatestNews">

                            @foreach($rides as $ride)
                                <?php
                                $s_location = explode(",", PostRideAddress($ride->post_id, $ride->going, 'location'));
                                $e_location = explode(",", PostRideAddress($ride->post_id, $ride->target, 'location'));
                                $s_lat = PostRideAddress($ride->post_id, $ride->going, 'lat');
                                $s_lng = PostRideAddress($ride->post_id, $ride->going, 'lng');
                                $e_lat = PostRideAddress($ride->post_id, $ride->target, 'lat');
                                $e_lng = PostRideAddress($ride->post_id, $ride->target, 'lng');
                                ?>
                                <li onclick="location.href='{{route('booking.index',$ride->tracking)}}';">
                                    <div class="row">
                                        <div class="col-2 dateShow">
                                            <div class="dateShowS1">{{date("M", strtotime($ride->date))}}</div>
                                            <div class="dateShowS2">{{date("d", strtotime($ride->date))}}</div>
                                        </div>
                                        <div class="col-4 location">
                                            <h4 class="fs-13">@for($x = count($s_location)-2; $x < count($s_location); $x++)
                                                    {{$s_location[$x].','}}
                                                @endfor</h4>
                                            <p>@for($x = 0; $x < count($s_location)-2; $x++)
                                                    {{$s_location[$x].','}}
                                                @endfor</p>
                                        </div>
                                        <div class="col-4 location">
                                            <h4 class="fs-13">@for($x = count($e_location)-2; $x < count($e_location); $x++)
                                                    {{$e_location[$x].','}}
                                                @endfor</h4>
                                            <p class="mb-0">@for($x = 0; $x < count($e_location)-2; $x++)
                                                    {{$e_location[$x].','}}
                                                @endfor</p>
                                        </div>
                                        <div class="col-2 reviewStar">
                                            <div class="price"> ৳ {{$ride->price}}</div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                </div>
                <div class="col-lg-4 video-left overlay">
                    <div class="video-inner justify-content-center align-items-center d-flex">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End video Area =================-->


    <!--================ Join the family section Start ================-->
    <section class="about-area mt-0 pb-5" id="JoinFamily">
        <div class="container pt-5">
            <h2 class="text-center text-capitalize text-bold mb-4 Helvetica-Bold">Join the family!</h2>
            <p class="text-center mx-md-5 text-black fs-16">Contribute to a worldwide network of long distance ride
                sharing.We're Climbers, environment lists,
                surfers, poets, adventures backpackers and wanderlast driven individual working toward a world where
                travel anywhere is possible, sustainable and friendly.</p>
            <div class="about-inner">
                <div class="row justify-content-center m-0 JoinFamilyDiv">
                    <div class="col-lg-6 col-md-6 mb-3">

                    </div>
                    <div class="col-lg-6 col-md-6 JoinFamilyDiv2 mb-0">
                        <p>Current Network Map - 176 trips available - click on them or scroll down for more</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Join the family section Start ================-->

    <!--================ Start CTA Area =================-->
    <div class="cta-area section_gap overlay my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4">{{__('file.index6')}}</h1>
                    <a href="#" class="genric-btn white-border circle m-1">Download in Appstore</a>
                    <a href="#" class="genric-btn white-border circle my-2">Download in Google Play</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->


    <div id="map">

    </div>
    <script>

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 23.777, lng: 90.399
                },
                zoom: 6.5
            });
            var input = (document.getElementById('start'));
            var input2 = (document.getElementById('end'));


            var autocomplete = new google.maps.places.Autocomplete(input);
            var autocomplete2 = new google.maps.places.Autocomplete(input2);
            autocomplete.bindTo('bounds', map);
            autocomplete2.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var item_Lat = place.geometry.location.lat()
                var item_Lng = place.geometry.location.lng()
                var item_Location = place.formatted_address;
                //alert("Lat= " + item_Lat + "_____Lang=" + item_Lng + "_____Location=" + item_Location);
                $("#lat").val(item_Lat);
                $("#lng").val(item_Lng);
                $("#location").val(item_Location);


                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                infowindow.open(map, marker);
            });

            autocomplete2.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete2.getPlace();

                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var item_Lat = place.geometry.location.lat()
                var item_Lng = place.geometry.location.lng()
                var item_Location = place.formatted_address;
                //alert("Lat= " + item_Lat + "_____Lang=" + item_Lng + "_____Location=" + item_Location);
                $("#lat2").val(item_Lat);
                $("#lng2").val(item_Lng);
                $("#location2").val(item_Location);


                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                radioButton.addEventListener('click', function () {
                    autocomplete.setTypes(types);
                });
            }

            setupClickListener('changetype-all', []);
            setupClickListener('changetype-address', ['address']);
            setupClickListener('changetype-establishment', ['establishment']);
            setupClickListener('changetype-geocode', ['geocode']);

            document.getElementById('use-strict-bounds')
                .addEventListener('click', function () {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                });
        }

        $(document).ready(function () {
            $('#upload_form').on('submit', function () {
                if ($('#start').val() == "" || $('#end').val() == "" || $('#after').val() == "") {
                    event.preventDefault();
                }
            });
        });

        $(document).ready(function () {
            function run() {
                $("#ulLatestNews li:first").slideUp(1000, function () {
                    $(this).appendTo($("#ulLatestNews")).slideDown();
                });
            }

            var timer = setInterval(run, 2000);
            $('#ulLatestNews').hover(function (ev) {
                clearInterval(timer);
            }, function (ev) {
                timer = setInterval(run, 2000);
            });
        });
    </script>

@endsection
