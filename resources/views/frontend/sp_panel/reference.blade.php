@extends('frontend.sp_panel.layout.app')
@section('content')

    <div class="content">
        <h3 class="my-1">Reference</h3>
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
        <div class="card collapse multi-collapse show" id="multiCollapseExample1">
            <div class="card-header">
                At least two Reference
                <button class="btn btn-sm btn-primary pull-right"
                        data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">Add Reference
                </button>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">profession</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($refer as $refers)
                        <tr>
                            <td>{{$refers->name}}</td>
                            <td>{{$refers->profession}}</td>
                            <td>{{$refers->phone}}</td>
                            <td>{{$refers->address}}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="card collapse multi-collapse" id="multiCollapseExample2">
            <div class="card-header">
                Edit Reference
                <button class="btn btn-sm btn-primary pull-right"
                        data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1 multiCollapseExample2">View Reference
                </button>
            </div>
            <div class="card-body">
                <h3>Reference One</h3>
                <form method="post" action="{{route('sp.reference.add')}}">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="staticEmail"
                                   placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Profession</label>
                        <div class="col-sm-10">
                            <input type="text" name="profession" class="form-control" id="inputPassword"
                                   placeholder="Profession">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="Number" name="number" class="form-control" id="inputPassword"
                                   placeholder="Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" id="inputPassword"
                                   placeholder="Address">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </form>
            </div>
        </div>


    </div>


@endsection