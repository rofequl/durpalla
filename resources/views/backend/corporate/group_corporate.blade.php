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
                Member Add Corporate Group

            </div>
            <div class="card-body">
                <form class="form-inline" method="post" action="{{route('corporate.group.Store')}}">
                    {{csrf_field()}}
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only"></label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <select class="form-control" name="corporate">
                            @foreach($corporate as $corporates)
                               <option value="{{$corporates->id}}">{{$corporates->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add Corporate Group</button>
                </form>
            </div>
        </div>

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
                            <th>Phone</th>
                            <th>Company Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($corporate_group as $corporate_groups)
                            <tr>
                                <td>{{$corporate_groups->phone}}</td>
                                <td>{{CorporateById($corporate_groups->id)->name}}</td>
                                <td>
                                    <a href="{{route('corporate.group.delete',$corporate_groups->id)}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

    </div>


@endsection