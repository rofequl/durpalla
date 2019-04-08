@extends('frontend.sp_panel.layout.app')

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

        <div class="card">
            <div class="card-header">
                Resource list
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add
                    more resource
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" cellspacing="0" id="DataTable">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>National Id</th>
                        <th>National Id Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($resource as $resources)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$resources->name}}</td>
                            <td>{{$resources->phone}}</td>
                            <td>
                                <img src="{{asset('storage/resource/'.$resources->image)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                            </td>
                            <td>{{$resources->national_id}}</td>
                            <td>
                                <img src="{{asset('storage/resource/'.$resources->nid_image1)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                                <img src="{{asset('storage/resource/'.$resources->nid_image2)}}"
                                     class="img-thumbnail" width="70px" alt="...">
                            </td>
                            <td>
                                <a href="{{route('resource.delete',$resources->id)}}"
                                   class="btn btn-sm btn-danger delete">Delete</a>
                            </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Car Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('resource.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-3 col-form-label">Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Enter Resource Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Phone Number:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">User Image:</label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="image" placeholder="User Image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">National Id:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="national_id" id="nationalId"
                                       placeholder="National Id Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">National Id Front Image:</label>
                            <div class="col-md-9">
                                <input type="file" name="nid_image1" id="phone" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">National Id Back Image:</label>
                            <div class="col-md-9">
                                <input type="file" name="nid_image2" id="phone" placeholder="Enter Phone Number">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Resource</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection