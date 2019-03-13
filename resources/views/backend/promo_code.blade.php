@extends('backend.layout.app')

@section('content')

    <div class="content">

        @if(isset($add))
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        Add Promo Code Information
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('promo_code.store')}}">
                            {{csrf_field()}}
                            <div class="modal-body">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"></label>
                                        <input type="number" class="form-control" name="p_amount" id=""
                                               placeholder="Percent">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4"></label>
                                        <input type="number" class="form-control" name="h_amount" id=""
                                               placeholder="Highest Amount">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="start" type="text" class="form-control"
                                               placeholder="Where do you want to go?">
                                        <input type="hidden" name="lat" id="lat">
                                        <input type="hidden" name="lng" id="lng">
                                        <input type="hidden" name="location" id="location">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"></label>
                                        <input type="number" class="form-control" id="" name="r_area"
                                               placeholder="Radius form center area">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"></label>
                                        <input type="text" class="form-control" id="" name="code" placeholder="Code">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"></label>
                                        <input type="text" class="form-control datepicker" name="s_date" id=""
                                               placeholder="Start Date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4"></label>
                                        <input type="text" class="form-control datepicker" name="e_date" id=""
                                               placeholder="End Date">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="{{route('promo_code.index')}}" type="button" class="btn btn-secondary">Close
                                </a>
                                <button type="submit" class="btn btn-primary">Add Promo Code</button>
                            </div>
                        </form>
                    </div>
                </div>
        @endif

        @if(isset($data2))
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Update Promo Code
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('promo_code.store')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$data2->id}}">
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="number" class="form-control" name="p_amount"
                                           value="{{$data2->p_amount}}"
                                           placeholder="Percent Amount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"></label>
                                    <input type="number" class="form-control" name="h_amount"
                                           value="{{$data2->h_amount}}"
                                           placeholder="Highest Amount">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input id="start" type="text" class="form-control"
                                           placeholder="Where do you want to go?" value="{{$data2->location}}">
                                    <input type="hidden" name="lat" id="lat" value="{{$data2->lat}}">
                                    <input type="hidden" name="lng" id="lng" value="{{$data2->lng}}">
                                    <input type="hidden" name="location" id="location" value="{{$data2->location}}">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="number" class="form-control" value="{{$data2->r_area}}" name="r_area"
                                           placeholder="Radius form center area">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="text" class="form-control" value="{{$data2->code}}" name="code"
                                           placeholder="Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"></label>
                                    <input type="text" class="form-control datepicker" name="s_date"
                                           value="{{$data2->s_date}}"
                                           placeholder="Start Date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"></label>
                                    <input type="text" class="form-control datepicker" name="e_date"
                                           value="{{$data2->e_date}}"
                                           placeholder="End Date">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Promo Code</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Promo Code
                <a href="{{route('promo_code.index','ADD')}}" class="btn btn-sm btn-primary pull-right">Add
                    Promo Code
                </a>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Percent Amount</th>
                        <th>Highest Amount</th>
                        <th>Code</th>
                        <th>Center Area</th>
                        <th>Radius form Center Area</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($promo as $promos)
                        <tr>

                            <td>{{$promos->p_amount}}</td>
                            <td>{{$promos->h_amount}}</td>
                            <td>{{$promos->code}}</td>
                            <td>{{$promos->location}}</td>
                            <td>{{$promos->r_area}}</td>
                            <td>{{$promos->s_date}}</td>
                            <td>{{$promos->e_date}}</td>
                            <td>
                                @if($promos->publish == 0)
                                    <a href="{{route('promo_code.publish',$promos->id)}}"
                                       class="btn btn-sm btn-primary fs-10">Publish</a>
                                @else
                                    <a href="{{route('promo_code.publish',$promos->id)}}"
                                       class="btn btn-sm btn-secondary">Not Publish</a>
                                @endif
                                <a href="{{route('promo_code.index',$promos->id)}}"
                                   class="btn btn-sm btn-success my-2">Edit</a>
                                <a href="{{route('promo_code.destroy',$promos->id)}}"
                                   class="btn btn-sm btn-danger delete">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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