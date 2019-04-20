@extends('frontend.layout.app')
@section('content')
    <style>
        #img {
            height: 70vh;
            width: 100%;
        }
    </style>
    <!--================ Start Home Banner Area =================-->
    <section class="overlay">
        <img src="{{$landingPage? asset('storage/landing_page/'.$landingPage) : "img/landing_page.jpg"}}" id="img">
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Features Area =================-->
    <section class="mb-5 row ml-0" id="StartFeaturesArea">
        <div class="pageBanner col-12 col-lg-8 ml-lg-5 mt-0">
            <div class="container-fluid">
                <h3 class="text-white my-0 ml-md-5">
                    {{__('file.index1')}}
                </h3>
                <form class="pr-md-5" method="post" action="{{route('all.ride.search')}}">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" id="start" name="address" placeholder="Leaving from..."
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Leaving from...'" required=""
                                       class="single-input circle">
                                <input type="hidden" name="lat" id="lat"
                                       value="@if(isset($userLat)) {{$userLat}} @endif">
                                <input type="hidden" name="lng" id="lng"
                                       value="@if(isset($userLng)) {{$userLng}} @endif">
                                <input type="hidden" name="location" id="location"
                                       value="@if(isset($userLoca)) {{$userLoca}} @endif">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" id="end" name="address" placeholder="Going to..."
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Going to...'" required=""
                                       class="single-input circle">
                                <input type="hidden" name="lat2" id="lat2"
                                       value="@if(isset($userLat2)) {{$userLat2}} @endif">
                                <input type="hidden" name="lng2" id="lng2"
                                       value="@if(isset($userLng2)) {{$userLng2}} @endif">
                                <input type="hidden" name="location2" id="location2"
                                       value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="far fa-clock"></i></div>
                                <input type="text" name="date" placeholder="Travel date"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Travel date'" required=""
                                       class="single-input circle datepicker">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <button type="submit" class="genric-btn info circle mt-2">Find a ride</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!--================ End Features Area =================-->

    <!--================ Start Features Area =================-->
    <section class="mt-5" id="">
        <div class="container border">
            <div class="row counter_wrapper text-center">
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-car-side"></i>
                            <h5>{{__('file.index2')}}</h5>
                            <p>Qualified Drivers</p>

                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-user-circle"></i>
                            <h5>{{__('file.index3')}}</h5>
                            <p>Service Provider</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-map-marked-alt"></i>
                            <h5>{{__('file.index4')}}</h5>
                            <p>Trusted Clients</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-money-bill"></i>
                            <h5>{{__('file.index5')}}</h5>
                            <p>Achievements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Features Area =================-->


    <!--================ Start Video Area =================-->
    <section class="video-sec-area section_gap_top mb-5" id="about">
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


    <!--================ Real people section Start ================-->
    <section class="about-area mt-0 pb-5" id="realPeople">
        <div class="container pt-5">
            <h2 class="text-center text-capitalize">{{__('file.index7')}}</h2>
            <div class="about-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img img-fluid rounded-circle" src="img/people1.jpg"
                                             alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    Using TaskRabbit to have a new bookcase built
                                                    was a great choice! Rick did wonderful work with a job that was much
                                                    bigger than we anticipated.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Biplab Banik</p>
                                                <p>Dhanmondi Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img img-fluid rounded-circle" src="img/people2.jpg"
                                             alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    I finally have expertly installed shelves and additional storage in
                                                    my tiny apartment, all thanks to my Tasker.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Lein Chang</p>
                                                <p>Gulshan 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img img-fluid rounded-circle" src="img/people3.jpg"
                                             alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    I'd been agonizing over how to get my new flat screen mounted to my
                                                    wall. In comes Nick on the same day. He arrived with all the tools
                                                    for the job and was just a super nice guy.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Rea Joe</p>
                                                <p>Gulshan 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img img-fluid rounded-circle" src="img/people4.jpg"
                                             alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    TaskRabbit makes moving into your new apartment a 1 hr job instead
                                                    of 1 day job! Moving my belongings from Manhattan to Queens was
                                                    seamless.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Riardo Pillar</p>
                                                <p>Uttara 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Real people section Start ================-->

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
