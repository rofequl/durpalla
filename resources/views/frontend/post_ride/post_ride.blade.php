@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container postRide-container">

            <h1>Offer a ride on your next long journey</h1>


            <br>
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-white">
                            Pick-up and drop-off points
                        </div>
                        <div class="card-body bg-light">
                            <label for="basic-url">Pick-up</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                       placeholder="Your departure point (address, city, station...)">
                            </div>
                            <label for="basic-url">Drop-off</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                       placeholder="Your arrival point (address, city, station...)">
                            </div>
                            <h4 class="my-0 mt-5">
                                Stopovers <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </h4>
                            <label for="basic-url">Now add your stopover points - offering to pick up and drop off
                                co-travellers along the way is a sure way to fill your car.</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-circle-o"
                                                                                        aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                       placeholder="Your arrival point (address, city, station...)">
                            </div>

                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header bg-white">
                            Date and time
                        </div>
                        <div class="card-body bg-light">
                            <label for="basic-url">Departure date:</label>
                            <div class="form-inline">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar-alt"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="basic-url"
                                           aria-describedby="basic-addon3">
                                </div>
                                <div style="margin-top: -17px;" class="d-inline-flex">
                                    <select class="form-control border mx-2">
                                        <option></option>
                                    </select>:
                                    <select class="form-control mx-2">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <label for="basic-url">Return date:</label>
                            <div class="form-inline">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-calendar-alt"
                                                                                        aria-hidden="true"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="basic-url"
                                           aria-describedby="basic-addon3">
                                </div>
                                <div style="margin-top: -17px;" class="d-inline-flex">
                                    <select class="form-control border mx-2">
                                        <option></option>
                                    </select>:
                                    <select class="form-control mx-2">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card p-3">
                        My ride summary

                        <div id="map" style="width: 100%; height: 500px;">

                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="mx-auto">
                    <a href="{{route('postRide2')}}" class="genric-btn info circle arrow">Next<span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>

            {{--
        <div class="w-50 mt-3 mx-auto">
            <a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a> to to see your saved rides.
            <div class="bg-light border p-2 mt-2 typography">


                <h2 class="typo-list ">Post a Ride</h2>
                <div class="form-group form-inline">
                    <label for="formGroupExampleInput">Date and time of ride: </label><br>
                    <input type="date" class="form-control mx-2">
                    <select class="mx-2" id="">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
                <div class="form-group input-group-sm">
                    <label for="formGroupExampleInput2">Departure city</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">menu</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">text field</label>
                </div>
                <div class="form-group input-group-sm">
                    <label for="formGroupExampleInput2">Destination city</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">menu</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">text field</label>
                </div>
                <br>
                <br>
                <div class="w-100 text-center">
                    <a href="{{route('postRide2')}}" class="genric-btn info circle arrow">Next<span class="lnr lnr-arrow-right"></span></a>

                </div>


            </div>
        </div>
            --}}

        </div>

    </section>







@endsection