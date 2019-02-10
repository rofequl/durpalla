@extends('frontend.sp_panel.layout.app')

@section('content')
    <div class="content">

        Your personal information
        <hr>
        <div class="card bg-light">
            <div class="card-body">
                <form class="text-right">
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10 text-left">
                            Male
                        </div>
                    </div>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Name</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="Akram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Company Name</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="Akram Ltd.">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Email</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="akram@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Mobile Number</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="019123456789">
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">National Id Number</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" value="4359123456789">
                        </div>
                    </div>
                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">Bio</legend>
                        <div class="col-sm-10 text-left">
                            <textarea class="w-100" rows="4" cols="50" placeholder="Example: " I'm a student at Dhaka University, and I often visit
                            friends in Dhaka. I love photography and rock music.""></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10 text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection