@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header">
                Sp Verification Menu
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            Nid Number: 472354885376
                                <button class="btn btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Details
                                </button>
                            <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" class="form-control w-100" id="inputPassword2" placeholder="Enter your nid number">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            Passport: 472354885376
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Details
                            </button>
                            <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verify</span>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" class="form-control w-100" id="inputPassword2" placeholder="Enter your Passport number">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Driving Licence:
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Details
                            </button>
                            <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" class="form-control w-100" id="inputPassword2" placeholder="Enter your Driving Licence">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Email Id:
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Details
                            </button>
                            <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">

                                <form action="" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="email" class="form-control w-100" id="inputPassword2" placeholder="Enter your email id">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Phone Number:
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Details
                            </button>
                            <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" class="form-control w-100" id="inputPassword2" placeholder="Enter your Phone number">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection