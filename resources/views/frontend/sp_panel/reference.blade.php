@extends('frontend.sp_panel.layout.app')
@section('content')

    <div class="content">

        <div class="card collapse multi-collapse show" id="multiCollapseExample1">
            <div class="card-header">
                Reference
                <button class="btn btn-sm btn-primary pull-right"
                        data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">Edit Reference</button>
            </div>
            <div class="card-body">
                <h3>Reference One</h3>
                <div class="media">
                    <img src="img/about-author.png" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Anwar Hossain</h5>
                        <p>Manager<br>
                        012345678901</p>
                    </div>
                </div>
                <h3>Reference Two</h3>
                <div class="media">
                    <img src="img/about-author.png" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">Anwar Hossain</h5>
                        <p>Manager<br>
                            012345678901</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card collapse multi-collapse" id="multiCollapseExample2">
            <div class="card-header">
                Edit Reference
                <button class="btn btn-sm btn-primary pull-right"
                        data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">View Reference</button>
            </div>
            <div class="card-body">
                <h3>Reference One</h3>
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Profession</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="Profession">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="Number" class="form-control" id="inputPassword" placeholder="Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlFile1">Reference Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
                <h3 class="mt-5">Reference Two</h3>
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Profession</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="Profession">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="Number" class="form-control" id="inputPassword" placeholder="Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlFile1">Reference Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <a href="" class="btn btn-success">
                    Save
                </a>
            </div>
        </div>


    </div>


@endsection