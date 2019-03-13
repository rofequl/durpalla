@extends('backend.layout.app')

@section('content')


    <div class="content">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{$error}}
                </div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card border shadow">
            <div class="card-header">
                Corporate list
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add
                   Corporate
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered" cellspacing="0" id="DataTable">
                    <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Contact person Name</th>
                        <th>Contact person Number</th>
                        <th>Company Logo</th>
                        <th>Discount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($corporate as $corporates)
                        <tr>
                            <td>{{$corporates->name}}</td>
                            <td>{{$corporates->address}}</td>
                            <td>{{$corporates->c_name}}</td>
                            <td>{{$corporates->c_phone}}</td>
                            <td>{{$corporates->logo}}</td>
                            <td>{{$corporates->discount}}%</td>

                        </tr>
                        <?php $listNum++; ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Corporate Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('corporate.Store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-3 col-form-label">Company Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Enter Company Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Company Address:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" placeholder="Enter Company Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Company Logo:</label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="image" placeholder="Company Image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Contact person Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="c_name" id="nationalId"
                                       placeholder="Contact person Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Contact person Number:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="c_phone" id="nationalId"
                                       placeholder="Contact person Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Discount:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="discount" id="nationalId"
                                       placeholder="Discount">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Corporate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection