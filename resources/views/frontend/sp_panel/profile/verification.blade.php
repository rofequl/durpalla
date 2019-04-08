@extends('frontend.sp_panel.profile.layout.app')

@section('content')

    <div class="content">
        <h3>Verification</h3>
        <hr>
        <p>Verify your profile to become a trusted member of our community and easily find others to travel with!</p>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Error</span>
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Alert</span>
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            Nid Number: {{$verification->nid}}<br>
                            @if($verification->nid_image1)<img src="{{asset('storage/nid/'.$verification->nid_image1)}}" class="img-thumbnail img-size-64">@endif
                            @if($verification->nid_image2)<img src="{{asset('storage/nid/'.$verification->nid_image2)}}" class="img-thumbnail img-size-64">@endif
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Details
                            </button>
                            @if($verification->nid == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->nid_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->nid_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verified</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verified</span>
                            @endif

                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-row align-items-center">
                                        <div class="col-6">
                                            <label for="inputPassword2" class="sr-only">Password</label>
                                            <input type="number" name="nid" class="form-control" id="inputPassword2"
                                                   placeholder="Enter your nid number">
                                        </div>
                                        <div class="col-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="nidImage1" id="inputGroupFile01"
                                                       aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">NID Front Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="nidImage2" id="inputGroupFile02"
                                                       aria-describedby="inputGroupFileAddon02">
                                                <label class="custom-file-label" for="inputGroupFile02">NID Back Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <button type="submit" name="submit" value="nid" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            Passport: {{$verification->passport}}<br>
                            @if($verification->passport_image1) <img src="{{asset('storage/passport/'.$verification->passport_image1)}}" class="img-thumbnail img-size-64">@endif
                            @if($verification->passport_image2) <img src="{{asset('storage/passport/'.$verification->passport_image2)}}" class="img-thumbnail img-size-64">@endif
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Details
                            </button>
                            @if($verification->passport == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->passport_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->passport_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verified</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verified</span>
                            @endif
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-row align-items-center">
                                        <div class="col-6">
                                            <label for="inputPassword2" class="sr-only">Passport</label>
                                            <input type="number" name="passport" class="form-control" id="inputPassword2"
                                                   placeholder="Enter your Passport number">
                                        </div>
                                        <div class="col-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="passportImage1" id="inputGroupFile03"
                                                       aria-describedby="inputGroupFileAddon03">
                                                <label class="custom-file-label" for="inputGroupFile03">Passport Front Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="passportImage2" id="inputGroupFile04"
                                                       aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Passport Back Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <button type="submit" name="submit" value="passport" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            Driving Licence: {{$verification->driving}}<br>
                            @if($verification->driving_image1) <img src="{{asset('storage/driving/'.$verification->driving_image1)}}" class="img-thumbnail img-size-64">@endif
                            @if($verification->driving_image2) <img src="{{asset('storage/driving/'.$verification->driving_image2)}}" class="img-thumbnail img-size-64">@endif
                            <button class="btn btn-sm pull-right" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Details
                            </button>
                            @if($verification->driving == "")
                                <span class="badge badge-pill badge-warning pull-right m-1 mr-5">Please Enter</span>
                            @elseif($verification->driving_status == 0)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Pending..</span>
                            @elseif($verification->driving_status == 2)
                                <span class="badge badge-pill badge-danger pull-right m-1 mr-5">Not Verified</span>
                            @else
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verified</span>
                            @endif
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{route('sp.verification')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-row align-items-center">
                                        <div class="col-6">
                                            <label for="inputPassword2" class="sr-only">Passport</label>
                                            <input type="number" name="driving" class="form-control" id="inputPassword2"
                                                   placeholder="Enter your Driving Licence">
                                        </div>
                                        <div class="col-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="drivingImage1" id="inputGroupFile05"
                                                       aria-describedby="inputGroupFileAddon05">
                                                <label class="custom-file-label" for="inputGroupFile05">Driving Front Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input w-25" name="drivingImage2" id="inputGroupFile06"
                                                       aria-describedby="inputGroupFileAddon06">
                                                <label class="custom-file-label" for="inputGroupFile06">Driving Back Image</label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <button type="submit" name="submit" value="driving" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
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
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verified</span>
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
                                <span class="badge badge-pill badge-success pull-right m-1 mr-5">Verified</span>
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