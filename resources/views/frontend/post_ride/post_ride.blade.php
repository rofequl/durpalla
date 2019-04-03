@extends('frontend.layout.app')
@section('content')

    <style>
        .display-none {
            display: none;
        }
    </style>

    <section class="mb-5 overlay">
        <div class="container postRide-container">
            <div class="row mt-5">
                <div class="col-lg-6 border p-3 radius fbf7f7">
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
                    <div class="row mt-3">
                        <div class="text-center mx-auto">
                            <h2>Offer a ride on your next long journey</h2>
                            <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                        </div>
                    </div>
                    <form method="post" id="upload_form" action="{{route('post.ride')}}">
                        {{csrf_field()}}
                        <div class="card">
                            <div class="card-header bg-paste text-white py-1">
                                Pick-up and drop-off points
                            </div>
                            <div class="card-body bg-light">
                                <label for="basic-url">Pick-up</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control shadow-none" id="start" name="start"
                                           placeholder="Your departure point (address, city, station...)" autofocus>
                                    <input type="hidden" name="lat" id="lat">
                                    <input type="hidden" name="lng" id="lng">
                                    <input type="hidden" name="location" id="location">
                                </div>
                                <label for="basic-url">Drop-off</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="end" name="end"
                                           placeholder="Your arrival point (address, city, station...)">
                                    <input type="hidden" name="lat2" id="lat2">
                                    <input type="hidden" name="lng2" id="lng2">
                                    <input type="hidden" name="location2" id="location2">
                                </div>
                                @if(Session::get('userId') != null && Session::get('token') != null)
                                    <label for="basic-url">Car selection</label>
                                    <div class="input-group mb-3">
                                        <select name="car">
                                            @foreach(car(Session::get('userId')) as $categorys)
                                                <option value="{{$categorys->id}}">{{$categorys->model}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if(Session::get('userId') != null && Session::get('token') != null)
                                    <label for="basic-url">Driver selection</label>
                                    <div class="input-group mb-3">
                                        <select name="driver">
                                            <option value="SP" selected>{{userInformation(Session::get('userId'),'name')}}</option>
                                            @foreach(resource(Session::get('userId')) as $categorys)
                                                <option value="{{$categorys->id}}">{{$categorys->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <h4 class="my-0 mt-5">
                                    Stopovers <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </h4>
                                <label for="basic-url">Now add your stopover points - offering to pick up and drop off
                                    co-travellers along the way is a sure way to fill your car.</label>
                                <div class="input-group mb-3" style="width:89%">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control shadow-none" id="stopmap"
                                           placeholder="Your arrival point (address, city, station...)"
                                           onkeyup="inputAddress('getinput1')">
                                    <input type="hidden" name="alat" id="alat">
                                    <input type="hidden" name="alng" id="alng">
                                    <input type="hidden" name="alocation" id="alocation">
                                </div>
                                <div class="form-inline w-100 display-none getinput1">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap1"
                                               onkeyup="inputAddress('getinput2')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat1" id="alat1">
                                        <input type="hidden" name="alng1" id="alng1">
                                        <input type="hidden" name="alocation1" id="alocation1">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" onclick="AddressHide('getinput1','alocation1')"
                                            style="margin-top: -4px"><i
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput2">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap2"
                                               onkeyup="inputAddress('getinput3')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat2" id="alat2">
                                        <input type="hidden" name="alng2" id="alng2">
                                        <input type="hidden" name="alocation2" id="alocation2">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput2','alocation2')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput3">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap3"
                                               onkeyup="inputAddress('getinput4')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat3" id="alat3">
                                        <input type="hidden" name="alng3" id="alng3">
                                        <input type="hidden" name="alocation3" id="alocation3">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput3','alocation3')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput4">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap4"
                                               onkeyup="inputAddress('getinput5')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat4" id="alat4">
                                        <input type="hidden" name="alng4" id="alng4">
                                        <input type="hidden" name="alocation4" id="alocation4">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput4','alocation4')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput5">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap5"
                                               onkeyup="inputAddress('getinput6')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat5" id="alat5">
                                        <input type="hidden" name="alng5" id="alng5">
                                        <input type="hidden" name="alocation5" id="alocation5">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput5','alocation5')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput6">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap6"
                                               onkeyup="inputAddress('getinput7')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat6" id="alat6">
                                        <input type="hidden" name="alng6" id="alng6">
                                        <input type="hidden" name="alocation6" id="alocation6">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput6','alocation6')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput7">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap7"
                                               onkeyup="inputAddress('getinput8')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat7" id="alat7">
                                        <input type="hidden" name="alng7" id="alng7">
                                        <input type="hidden" name="alocation7" id="alocation7">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput7','alocation7')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput8">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap8"
                                               onkeyup="inputAddress('getinput9')"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat8" id="alat8">
                                        <input type="hidden" name="alng8" id="alng8">
                                        <input type="hidden" name="alocation8" id="alocation8">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput8','alocation8')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="form-inline w-100 display-none getinput9">
                                    <div class="input-group mb-1 passDisplayBlockdiv" style="width:89%">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-circle-o"
                                                                      aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control shadow-none" id="stopmap9"
                                               placeholder="Your arrival point (address, city, station...)">
                                        <input type="hidden" name="alat9" id="alat9">
                                        <input type="hidden" name="alng9" id="alng9">
                                        <input type="hidden" name="alocation9" id="alocation9">
                                    </div>
                                    <button class="btn btn-danger fs-16 p-1 mx-2 shadow-none"
                                            title="Remove Input" id="inputAddressHide" style="margin-top: -4px"><i
                                                onclick="AddressHide('getinput9','alocation9')"
                                                class="fas fa-minus-circle"></i></button>
                                </div>

                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-header bg-paste text-white py-1">
                                Date and time
                            </div>
                            <div class="card-body bg-light">
                                <label for="basic-url">Departure date:</label>
                                <div class="row" style="width: auto">
                                    <div class="col-7 input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar-alt"
                                                                                        aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control datepicker" name="departure"
                                               id="basicurl"
                                        >
                                    </div>
                                    <div class="col-5 d-inline-flex">
                                        <select name="d_time" class="mx-2">
                                            @for($i=1;$i<=12;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>:
                                        <select name="d_time2" class="mx-2">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: none" id="returndate">
                                    <label for="basic-url">Return date:</label>
                                    <div class="row">
                                        <div class="col-7 input-group mb-3">
                                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar-alt"
                                                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="basicurl2"
                                                   name="return">
                                        </div>
                                        <div class="col-5 d-inline-flex">
                                            <select name="r_time" class="mx-2">
                                                @for($i=1;$i<=12;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>:
                                            <select name="r_time2" class="mx-2">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="ckb1">
                                    <label class="form-check-label" for="ckb1">Round trip</label>
                                </div>

                            </div>
                        </div>


                        <div class="row mt-3 p-3">
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary fs-12 circle arrow">Post my request<span
                                            class="lnr lnr-arrow-right"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card p-3 fbf7f7">
                        My ride summary

                        <div id="map" style="width: 100%; height: 500px;">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>

        @if(Session::get('userId') == null && Session::get('token') == null)

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
            var input = (document.getElementById('start'));
            var input2 = (document.getElementById('end'));
            var input3 = (document.getElementById('stopmap'));
            var input4 = (document.getElementById('stopmap1'));
            var input5 = (document.getElementById('stopmap2'));
            var input6 = (document.getElementById('stopmap3'));
            var input7 = (document.getElementById('stopmap4'));
            var input8 = (document.getElementById('stopmap5'));
            var input9 = (document.getElementById('stopmap6'));
            var input10 = (document.getElementById('stopmap7'));
            var input11 = (document.getElementById('stopmap8'));
            var input12 = (document.getElementById('stopmap9'));


            var autocomplete = new google.maps.places.Autocomplete(input);
            var autocomplete2 = new google.maps.places.Autocomplete(input2);
            var autocomplete3 = new google.maps.places.Autocomplete(input3);
            var autocomplete4 = new google.maps.places.Autocomplete(input4);
            var autocomplete5 = new google.maps.places.Autocomplete(input5);
            var autocomplete6 = new google.maps.places.Autocomplete(input6);
            var autocomplete7 = new google.maps.places.Autocomplete(input7);
            var autocomplete8 = new google.maps.places.Autocomplete(input8);
            var autocomplete9 = new google.maps.places.Autocomplete(input9);
            var autocomplete10 = new google.maps.places.Autocomplete(input10);
            var autocomplete11 = new google.maps.places.Autocomplete(input11);
            var autocomplete12 = new google.maps.places.Autocomplete(input12);
            autocomplete.bindTo('bounds', map);
            autocomplete2.bindTo('bounds', map);
            autocomplete3.bindTo('bounds', map);
            autocomplete4.bindTo('bounds', map);
            autocomplete5.bindTo('bounds', map);
            autocomplete6.bindTo('bounds', map);
            autocomplete7.bindTo('bounds', map);
            autocomplete8.bindTo('bounds', map);
            autocomplete9.bindTo('bounds', map);
            autocomplete10.bindTo('bounds', map);
            autocomplete11.bindTo('bounds', map);
            autocomplete12.bindTo('bounds', map);

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

            autocomplete3.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete3.getPlace();

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
                $("#alat").val(item_Lat);
                $("#alng").val(item_Lng);
                $("#alocation").val(item_Location);


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

            autocomplete4.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete4.getPlace();

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
                $("#alat1").val(item_Lat);
                $("#alng1").val(item_Lng);
                $("#alocation1").val(item_Location);


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

            autocomplete5.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete5.getPlace();

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
                $("#alat2").val(item_Lat);
                $("#alng2").val(item_Lng);
                $("#alocation2").val(item_Location);


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

            autocomplete6.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete6.getPlace();

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
                $("#alat3").val(item_Lat);
                $("#alng3").val(item_Lng);
                $("#alocation3").val(item_Location);


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

            autocomplete7.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete7.getPlace();

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
                $("#alat4").val(item_Lat);
                $("#alng4").val(item_Lng);
                $("#alocation4").val(item_Location);


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

            autocomplete8.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete8.getPlace();

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
                $("#alat5").val(item_Lat);
                $("#alng5").val(item_Lng);
                $("#alocation5").val(item_Location);


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

            autocomplete9.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete9.getPlace();

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
                $("#alat6").val(item_Lat);
                $("#alng6").val(item_Lng);
                $("#alocation6").val(item_Location);


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

            autocomplete10.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete10.getPlace();

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
                $("#alat7").val(item_Lat);
                $("#alng7").val(item_Lng);
                $("#alocation7").val(item_Location);


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

            autocomplete11.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete11.getPlace();

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
                $("#alat8").val(item_Lat);
                $("#alng8").val(item_Lng);
                $("#alocation8").val(item_Location);


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

            autocomplete12.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete12.getPlace();

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
                $("#alat9").val(item_Lat);
                $("#alng9").val(item_Lng);
                $("#alocation9").val(item_Location);


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
                if ($('#start').val() == "" || $('#end').val() == "" || $('#basicurl').val() == "") {
                    event.preventDefault();
                }
            });
        });

        $('#ckb1').bind('change', function () {

            if ($(this).is(':checked'))
                $('#returndate').show();
            else
                $('#returndate').hide();
            $('#basicurl2').val('');

        });

        function inputAddress(data) {
            $("." + data).css({"display": "flex"});
        }

        function AddressHide(data, data2) {
            $("." + data).css({"display": "none"});
            $("#" + data2).val('');
        }
    </script>






@endsection