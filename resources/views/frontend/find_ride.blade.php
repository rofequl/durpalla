@extends('frontend.layout.app')
@section('content')




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
                <div class="col-12 col-lg-7 px-0 mt-5 mt-lg-0 border p-3 radius fbf7f7">
                    <div class="card rounded mb-3 bg-light">
                        <div class="card-header bg-paste text-white py-1">
                            0 people asking for and offering ride near you
                        </div>
                        <div class="card-body px-2">


                            <div class="input-group mb-3 px-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="" aria-label="Username"
                                       aria-describedby="basic-addon1" value="Jhigatola, Dhaka 1205, Bangladesh">
                            </div>
                            <div class="input-group mb-3 px-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Where do you want to go?"
                                       aria-label="Username"
                                       aria-describedby="basic-addon1">
                            </div>

                            <form class="row mx-1">
                                <div class="input-group mb-3 col-4 px-0 pr-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="On or After"
                                           aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3 col-4 px-0 pr-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="On or Before"
                                           aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3 col-4 px-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="1+ seats" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                            </form>


                        </div>
                    </div>

                    <div class="mt-5 text-center w-75 mx-auto">
                        <i class="fa fa-search fa-3x" aria-hidden="true"></i>
                        <p>No rides found passing by</p>
                        <a href="#" class="btn btn-sm btn-danger radius w-100 my-2">Create a rides request for driver</a>
                        <p>
                            Drag the marker to search for a rides in other places, or visit the
                            homepage to explore rides worldwide.
                        </p>
                    </div>

                </div>
                <div class="col-12 col-lg-5">
                    <div class="card p-3 fbf7f7">
                        <div id="map" style="width: 100%; height: 500px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection