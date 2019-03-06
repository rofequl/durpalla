@extends('backend.layout.app')

@section('content')


    <div class="content">

        @if(isset($carwas))
            <div class="card card-body shadow border">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 my-2">
                            Brand: {{$carwas->brand}}
                        </div>
                        <div class="col-6 my-2">
                            Model: {{$carwas->model}}
                        </div>
                        <div class="col-6 my-2">
                            Fuel type: {{$carwas->fuel}}
                        </div>
                        <div class="col-6 my-2">
                            Kilometers run: {{$carwas->kilometers}}
                        </div>
                    </div>
                    <form method="post" class="row" action="{{url('admin-pending-car-Approve')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$carwas->id}}">
                        <div class="col-6 my-2">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Car type:</label>
                                <div class="col-sm-8">
                                    <select class="form-control-sm form-control" name="type">
                                        <option value="Standard">Standard</option>
                                        <option value="Premier">Premier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 my-2">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            <a href="{{url('admin-approve-car-pending'.'?id='.$carwas->id)}}" class="btn btn-sm btn-danger">Pending</a>
                        </div>
                    </form>

                </div>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                All Approve Car
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($car as $cars)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$cars->user_id}}</td>
                            <td>{{$cars->brand}}</td>
                            <td>{{$cars->brand}}</td>
                            <td>{{$cars->model}}</td>
                            <td>
                                <a href="{{route('admin.approve.car').'/'.$cars->id}}"
                                   class="btn btn-sm btn-success">View</a>

                            </td>
                        </tr>
                        <?php $listNum++; ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection