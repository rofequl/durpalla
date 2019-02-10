@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container">
            <div class="w-100">
                <div class="text-center mx-auto">
                    <h2>Pick a Rider</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
                <div class="row my-5">
                    <div class="col-4 text-center">
                        Ride Date<br>
                        <a href="#" class="genric-btn success medium radius">Today</a>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-5 text-center">
                                <img src="{{asset('dist/img/user1-128x128.jpg')}}"
                                     class="img-fluid rounded-circle w-25">
                                <h6 class="mt-2">View profile/Preview</h6>
                                <a href="#" class="genric-btn primary circle arrow">Select & Continue</a><br>
                                <p class="w-75 mx-auto text-left">
                                    You can chat with your tasker,
                                    adjust task details, or change task
                                    time after booking
                                </p>
                            </div>
                            <div class="col-5">
                                <h3>Lourence P.</h3>
                                <h4>Senior Technician</h4>
                                <p>
                                    5 years of service experience<br>
                                    100% positive
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-4 text-center">
                        Ride Date<br>
                        <a href="#" class="genric-btn success medium radius">Today</a>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-5 text-center">
                                <img src="{{asset('dist/img/user1-128x128.jpg')}}"
                                     class="img-fluid rounded-circle w-25">
                                <h6 class="mt-2">View profile/Preview</h6>
                                <a href="#" class="genric-btn primary circle arrow">Select & Continue</a><br>
                                <p class="w-75 mx-auto text-left">
                                    You can chat with your tasker,
                                    adjust task details, or change task
                                    time after booking
                                </p>
                            </div>
                            <div class="col-5">
                                <h3>Lourence P.</h3>
                                <h4>Senior Technician</h4>
                                <p>
                                    5 years of service experience<br>
                                    100% positive
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection