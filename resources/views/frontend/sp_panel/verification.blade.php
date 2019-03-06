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
                            Nid Number: {{$verification->nid}}
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Details
                            </button>
                            @if($verification->nid == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->nid_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->nid_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verify</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                            @endif

                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" name="nid" class="form-control w-100" id="inputPassword2"
                                               placeholder="Enter your nid number">
                                    </div>
                                    <button type="submit" name="submit" value="nid" class="btn btn-primary mb-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            Passport: {{$verification->passport}}
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Details
                            </button>
                            @if($verification->passport == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->passport_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->passport_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verify</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                            @endif
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" name="passport" class="form-control w-100"
                                               id="inputPassword2" placeholder="Enter your Passport number">
                                    </div>
                                    <button type="submit" name="submit" value="passport" class="btn btn-primary mb-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Driving Licence: {{$verification->driving}}
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Details
                            </button>
                            @if($verification->driving == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->driving_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->driving_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verify</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                            @endif
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" name="driving" class="form-control w-100"
                                               id="inputPassword2" placeholder="Enter your Driving Licence">
                                    </div>
                                    <button type="submit" name="submit" value="driving" class="btn btn-primary mb-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Email Id: {{$verification->email}}
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Details
                            </button>
                            @if($verification->email == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                            @endif
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">

                                <form action="{{route('sp.verification')}}" method="post" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="email" name="email" class="form-control w-100" id="inputPassword2"
                                               placeholder="Enter your email id">
                                    </div>
                                    <button type="submit" name="submit" value="email" class="btn btn-primary mb-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Phone Number: {{$verification->phone}}
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Details
                            </button>
                            @if($verification->phone == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verify</span>
                            @endif
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group mx-sm-3 mb-2 w-50">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="number" name="phone" class="form-control w-100" id="inputPassword2"
                                               placeholder="Enter your Phone number">
                                    </div>
                                    <button type="submit" name="submit" value="phone" class="btn btn-primary mb-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection