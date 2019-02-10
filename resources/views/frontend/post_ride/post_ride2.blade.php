@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container postRide-container">

            <h1>Offer a ride</h1>


            <br>
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-white">
                            Price per Co-traveller
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-8">Dhaka <span class="lnr lnr-arrow-right"></span> Dhaka</div>
                                <div class="col-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="00000"
                                               aria-label="Username"
                                               aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">Dhaka <span class="lnr lnr-arrow-right"></span> Comilla Cantonment
                                </div>
                                <div class="col-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="00000"
                                               aria-label="Username"
                                               aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">Dhaka <span class="lnr lnr-arrow-right"></span> Chittaganj</div>
                                <div class="col-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="00000"
                                               aria-label="Username"
                                               aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
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
                                    <input type="text" class="form-control" placeholder="00" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-white">
                            Options
                        </div>
                        <div class="card-body bg-light">
                            <h5>Max. 2 in the back seats</h5>
                            Guarantee max. 2 people in the back of the car (preferred by co-travellers)
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header bg-white">
                            Ride details
                        </div>
                        <div class="card-body bg-light">
                            Anything to add about your ride?<br>
                            <textarea rows="5" class="form-control"
                                      placeholder="Flexible about where and when to meet? Not taking the motorway? Got limited space in your boot? Keep passengers in the loop."></textarea>
                            Please do not add your contact details here. Interested co-travellers will receive your
                            phone number individually (See our guidelines)
                            <br>
                            Publish the same ride comment for the departure and the return
                        </div>
                    </div>

                </div>

                <div class="col-lg-5">
                    <div class="card p-3">
                        My ride summary

                        <div id="map" style="width: 100%; height: 500px;">

                        </div>
                        <br>
                        <h5>Loddaputti → Kozhikode</h5>

                        Departure:
                        Wed 13 Feb - 15:00<br>
                        Return ride:
                        Fri 15 Feb - 15:00<br>


                        Distance:
                        1698 Km<br>
                        Driving time:
                        35h 10m<br>
                        CO2 emissions:
                        362 Kg<br>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="mx-auto">
                    <a href="#" class="mr-4"><span
                                class="lnr lnr-arrow-left"></span> back </a><a href="{{route('postRide3')}}" class="genric-btn info circle arrow">Next<span
                                class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>

        </div>
    </section>







@endsection