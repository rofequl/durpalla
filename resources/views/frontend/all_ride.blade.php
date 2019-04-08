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

        div.relative {
            position: relative;
            width: 28px;
            height: 70px;
            border: 0;
        }

        div.absolute {
            position: absolute;
            top: 10px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }

        div.absolute2 {
            position: absolute;
            top: 20px;
            left: 10px;
            height: 54px;
            border: 1px solid #73AD21;
        }

        div.absolute3 {
            position: absolute;
            top: 72px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }
    </style>


    <section class="my-5 overlay">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="w-100 text-center mb-3 mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
                <div class="row text-center mb-3 mx-auto">
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
                </div>
                <div class="col-lg-10 mx-auto">
                    <form method="post" action="{{route('all.ride.search')}}" class="form-inline">
                        {{csrf_field()}}
                        <div class="input-group mx-2">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"
                                                                                aria-hidden="true"></i></span>
                            </div>
                            <input id="start" type="text" class="form-control shadow-none"
                                   placeholder="Departure"
                                   value="@if(isset($userLoca)) {{$userLoca}} @endif">
                            <input type="hidden" name="lat" id="lat"
                                   value="@if(isset($userLat)) {{$userLat}} @endif">
                            <input type="hidden" name="lng" id="lng"
                                   value="@if(isset($userLng)) {{$userLng}} @endif">
                            <input type="hidden" name="location" id="location"
                                   value="@if(isset($userLoca)) {{$userLoca}} @endif">
                        </div>
                        <div class="input-group mx-2">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"
                                                                                aria-hidden="true"></i></span>
                            </div>
                            <input type="text" id="end" class="form-control shadow-none"
                                   placeholder="Destination"
                                   value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                            <input type="hidden" name="lat2" id="lat2"
                                   value="@if(isset($userLat2)) {{$userLat2}} @endif">
                            <input type="hidden" name="lng2" id="lng2"
                                   value="@if(isset($userLng2)) {{$userLng2}} @endif">
                            <input type="hidden" name="location2" id="location2"
                                   value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                        </div>
                        <div class="form-group mx-2">
                            <select name="date">
                                <option value="">Select Date</option>
                                @foreach ($group as $groups)
                                    <option {{$rideDate == $groups? "selected":""}}>{{$groups}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mx-2">
                            <button type="submit" class="btn btn-primary float-right">Search</button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-10 mx-auto">

                    @foreach ($group as $groups)
                        @if($rideDate == "" || $groups == $rideDate)

                            <div class="card mt-3">
                                <div class="card-header bg-paste text-white py-1">
                                    <p class="text-capitalize">{{date("l F-d", strtotime($groups))}}</p>
                                </div>
                                <div class="card-body">
                                    <div class="row text-uppercase text-center lh-1-1">
                                        <div class="col-md-2">Time</div>
                                        <div class="col-md">Ride</div>
                                        <div class="col-md-2">Driver</div>
                                        <div class="col-md-2">Price $ Seat</div>
                                        <div class="col-md-2">Condition</div>
                                        <div class="col-md-2">Rating</div>
                                    </div>
                                    <hr class="bg-warning">
                                    <div class="news-feed-container pb-2">
                                        <ul class="list-unstyled">

                                            @foreach (getStopoverRide($groups) as $ride)
                                                @if(getRide($ride->post_id)->status == 1)
                                                    @if(empty($tracking) || in_array($ride->tracking, $tracking))
                                                        <?php
                                                        $s_location = explode(",", PostRideAddress($ride->post_id, $ride->going, 'location'));
                                                        $e_location = explode(",", PostRideAddress($ride->post_id, $ride->target, 'location'));
                                                        $s_lat = PostRideAddress($ride->post_id, $ride->going, 'lat');
                                                        $s_lng = PostRideAddress($ride->post_id, $ride->going, 'lng');
                                                        $e_lat = PostRideAddress($ride->post_id, $ride->target, 'lat');
                                                        $e_lng = PostRideAddress($ride->post_id, $ride->target, 'lng');
                                                        ?>

                                                        <li onclick="location.href='{{route('booking.index',$ride->tracking)}}';">

                                                            <div class="row text-center">
                                                                <div class="col-12 col-sm-4 col-md-2 dateShow lh-1-3 my-auto text-left text-justify">
                                                                    <p class="my-0">Time: {{$ride->time}}
                                                                        :00 {{$ride->time2}}</p>
                                                                    <?php  $dist = GetDrivingDistance($s_lat, $s_lng, $e_lat, $e_lng); ?>
                                                                    <p class="my-0">Distance: {{$dist['distance']}}</p>
                                                                    <p class="my-0">Duration: {{$dist['time']}}</p>
                                                                </div>
                                                                <div style="width: 10px">
                                                                    <div class="relative">
                                                                        <div class="absolute"></div>
                                                                        <div class="absolute2"></div>
                                                                        <div class="absolute3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-11 col-sm-4 col-md location text-left">
                                                                    <h4 class="fs-13">@for($x = count($s_location)-2; $x < count($s_location); $x++)
                                                                            {{$s_location[$x].','}}
                                                                        @endfor</h4>
                                                                    <p>@for($x = 0; $x < count($s_location)-2; $x++)
                                                                            {{$s_location[$x].','}}
                                                                        @endfor</p>

                                                                    <h4 class="fs-13">@for($x = count($e_location)-2; $x < count($e_location); $x++)
                                                                            {{$e_location[$x].','}}
                                                                        @endfor</h4>
                                                                    <p class="mb-0">@for($x = 0; $x < count($e_location)-2; $x++)
                                                                            {{$e_location[$x].','}}
                                                                        @endfor</p>

                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 p-0">

                                                                    <aside class="single_sidebar_widget author_widget text-center lh-1-1">
                                                                        <img class="author_img rounded-circle"
                                                                             width="60px" height="60px"
                                                                             src="{{userInformation(getRide($ride->post_id)->user_id,'image')}}"
                                                                             alt=""><br>
                                                                        <h5 class="my-0">{{userInformation(getRide($ride->post_id)->user_id,'name')}}</h5>
                                                                        <a href="#" class="fs-8 my-0">
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </a><br>
                                                                        <a href="#"
                                                                           class="btn btn-success small circle my-1 fs-10">View
                                                                            profile/Preview</a>
                                                                    </aside>


                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                                    <div class="price my-2 text-bold fs-18 text-black">
                                                                        ৳ {{$ride->price}}</div>
                                                                    @if(seat($ride->going,$ride->target,$ride->post_id,$ride->date) > 0)
                                                                        @for($i=1;$i<=getRide($ride->post_id)->seat;$i++)
                                                                            @if($i > getRide($ride->post_id)->seat - seat($ride->going,$ride->target,$ride->post_id,$ride->date))
                                                                                <span class="fa-2x fas fa-male checked"
                                                                                      data-toggle="tooltip"
                                                                                      data-placement="bottom"></span>
                                                                            @else
                                                                                <span class="fa-2x fas fa-male"
                                                                                      data-toggle="tooltip"
                                                                                      data-placement="bottom"></span>
                                                                            @endif
                                                                        @endfor
                                                                    @else
                                                                        {{"Booked"}}
                                                                    @endif
                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                                    <?php
                                                                    $data = explode(",", getRide($ride->post_id)->condition);
                                                                    ?>
                                                                    @if(in_array(1,$data))<img
                                                                            src="{{asset('img/icon/smokeNoSmall.gif')}}">@endif
                                                                    @if(in_array(2,$data))<img
                                                                            src="{{asset('img/icon/bagSizeSmallSmall.gif')}}">@endif
                                                                    @if(in_array(3,$data))<img
                                                                            src="{{asset('img/icon/emailAccessYesSmall.gif')}}">@endif
                                                                    @if(in_array(4,$data))<img
                                                                            src="{{asset('img/icon/phoneAccessYesSmall.gif')}}">@endif
                                                                    <p class="text-bold fs-14"><b
                                                                                class="text-muted">{{getCarById(getRide($ride->post_id)->car_id,'car_type')}}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <p class="lh-1-1">(04)</p>
                                                                    <button class="btn small circle btn-primary my-1 fs-10">
                                                                        Select & Continue
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </li>

                                                    @endif
                                                @endif
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </section>
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
    </script>

@endsection