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


    <hr class="mt-0">
    <section class="mb-5 overlay">
        <div class="container">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Pick a Rider</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-lg-6 px-0 mt-5 mt-lg-0 border p-3 radius fbf7f7">
                    <div class="card rounded mb-3 bg-light">
                        <div class="card-header bg-paste text-white py-1">
                            0 people asking for and offering ride near you
                        </div>
                        <div class="card-body px-2">
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
                            <form id="upload_form" method="post" action="{{route('find.ride')}}">
                                {{csrf_field()}}
                                <div class="input-group mb-3 px-0">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input id="start" type="text" class="form-control"
                                           placeholder="Where do you want to go?"
                                           value="@if(isset($userLoca)) {{$userLoca}} @endif">
                                    <input type="hidden" name="lat" id="lat"
                                           value="@if(isset($userLat)) {{$userLat}} @endif">
                                    <input type="hidden" name="lng" id="lng"
                                           value="@if(isset($userLng)) {{$userLng}} @endif">
                                    <input type="hidden" name="location" id="location"
                                           value="@if(isset($userLoca)) {{$userLoca}} @endif">

                                </div>
                                <div class="input-group mb-3 px-0">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" id="end" class="form-control"
                                           placeholder="Where do you want to go?"
                                           value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                                    <input type="hidden" name="lat2" id="lat2"
                                           value="@if(isset($userLat2)) {{$userLat2}} @endif">
                                    <input type="hidden" name="lng2" id="lng2"
                                           value="@if(isset($userLng2)) {{$userLng2}} @endif">
                                    <input type="hidden" name="location2" id="location2"
                                           value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                                </div>

                                <div class="row mx-1">
                                    <div class="input-group mb-3 col-4 px-0 pr-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"
                                                                                            aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control datepicker" id="after" name="after"
                                               value="@if(isset($after)) {{$after}} @endif"
                                               placeholder="On or After">
                                    </div>
                                    <div class="input-group mb-3 col-4 px-0 pr-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"
                                                                                            aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control datepicker" id="before" name="before"
                                               value="@if(isset($before)) {{$before}} @endif"
                                               placeholder="On or Before">
                                    </div>
                                    <div class="input-group mb-3 col-4 px-0">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"
                                                                                            aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="seat" min="1"
                                               placeholder="1+ seats" value="@if(isset($seat)) {{$seat}} @endif">
                                    </div>
                                    <div class="w-100">
                                        <button class="btn btn-primary float-right">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    @if($show == 2)
                        <div class="mt-5 text-center w-75 mx-auto">
                            <form id="upload_form" method="post" action="{{route('request.ride.post')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="lat" id="lat"
                                       value="@if(isset($userLat)) {{$userLat}} @endif">
                                <input type="hidden" name="lng" id="lng"
                                       value="@if(isset($userLng)) {{$userLng}} @endif">
                                <input type="hidden" name="location" id="location"
                                       value="@if(isset($userLoca)) {{$userLoca}} @endif">
                                <input type="hidden" name="lat2" id="lat2"
                                       value="@if(isset($userLat2)) {{$userLat2}} @endif">
                                <input type="hidden" name="lng2" id="lng2"
                                       value="@if(isset($userLng2)) {{$userLng2}} @endif">
                                <input type="hidden" name="location2" id="location2"
                                       value="@if(isset($userLoca2)) {{$userLoca2}} @endif">
                                <input type="hidden" class="form-control datepicker" id="after" name="after"
                                       value="@if(isset($after)) {{$after}} @endif"
                                       placeholder="On or After">
                                <input type="hidden" class="form-control datepicker" id="before" name="before"
                                       value="@if(isset($before)) {{$before}} @endif"
                                       placeholder="On or Before">
                                <input type="hidden" class="form-control" name="seat" min="1"
                                       placeholder="1+ seats" value="@if(isset($seat)) {{$seat}} @endif">
                                <i class="fa fa-search fa-3x" aria-hidden="true"></i>
                                <p>No rides found passing by</p>
                                <button type="submit" class="btn btn-sm btn-danger radius w-100 my-2">Create a rides request for
                                    driver</button>
                                <p>
                                    Drag the marker to search for a rides in other places, or visit the
                                    homepage to explore rides worldwide.
                                </p>
                            </form>
                        </div>
                    @endif

                </div>
                <div class="col-12 col-lg-6">
                    <div class="card p-3 fbf7f7">
                        <div id="map" style="width: 100%; height: 500px;">

                        </div>
                    </div>
                </div>
            </div>

            @if($show == 1)
                <div class="card mt-5">
                    <div class="card-header bg-paste text-white py-1">
                        <p>Search Details</p>
                    </div>
                    <div class="card-body">
                        <div class="row text-uppercase lh-1-1">
                            <div class="col-md-2">Time</div>
                            <div class="col-md-1"></div>
                            <div class="col-md">Ride</div>
                            <div class="col-md-2">Driver</div>
                            <div class="col-md-2">Condition</div>
                            <div class="col-md-2">Rating & price</div>
                        </div>
                        <hr class="bg-warning">
                        <div class="news-feed-container pb-2">
                            <ul class="list-unstyled">


                                @foreach ($ride as $rides)
                                    @if (distance($rides->s_lat, $rides->s_lng, $userLat, $userLng, "K") < 10 && strtotime($rides->departure) >= strtotime("now") && $rides->seat >= $seat)
                                        <li>
                                            <div class="row text-center">
                                                <div class="col-12 col-sm-4 col-md-2 dateShow">
                                                    <p class="my-0">{{$rides->d_time}}:00 {{$rides->d_time2}}</p>
                                                    <p class="my-0">{{$rides->departure}}</p>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-1">
                                                    <div class="relative">
                                                        <div class="absolute"></div>
                                                        <div class="absolute2"></div>
                                                        <div class="absolute3"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md location text-left">

                                                    <h4>Departure</h4>
                                                    <p>{{$rides->s_location}}</p><br>
                                                    <h4>Destination</h4>
                                                    <p>{{$rides->e_location}}</p>


                                                </div>
                                                <div class="col-12 col-sm-4 col-md-2 p-0">

                                                    <aside class="single_sidebar_widget author_widget text-center lh-1-1">
                                                        <img class="author_img w-25 rounded-circle"
                                                             src="img/blog/author.png" alt=""><br>
                                                        <h5 class="my-0">Charlie Barber</h5>
                                                        <a href="#" class="fs-8 my-0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                        </a><br>
                                                        <a href="#" class="btn btn-success small circle my-1 fs-10">View
                                                            profile/Preview</a>
                                                    </aside>


                                                </div>
                                                <div class="col-12 col-sm-4 col-md-2 my-auto">
                                                    <img src="img/icon/smokeNoSmall.gif">
                                                    <img src="img/icon/bagSizeSmallSmall.gif">
                                                    <img src="img/icon/emailAccessYesSmall.gif">
                                                    <img src="img/icon/phoneAccessYesSmall.gif">
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                    <div class="price">{{$rides->price}}$</div>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            @endif

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