@extends('backend.layout.app')

@section('content')


    <div class="content">

        @if(isset($carwas))
            <div class="card card-body shadow border">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 my-2">
                            Brand: {{CarBrandById($carwas->brand_id)}}
                        </div>
                        <div class="col-6 my-2">
                            Model: {{$carwas->model}}
                        </div>
                        <div class="col-6 my-2">
                            User Id: {{$carwas->user_id}}
                        </div>
                        <div class="col-6 my-2">
                            Model Year: {{$carwas->model_year}}
                        </div>
                        <div class="col-6 my-2">
                            Fuel type: {{$carwas->fuel}}
                        </div>
                        <div class="col-6 my-2">
                            Registration Year: {{$carwas->registration_year}}
                        </div>
                        <div class="col-6 my-2">
                            Kilometers run: {{$carwas->kilometers}}
                        </div>
                        <div class="col-8 my-2">
                            <img src="{{asset('storage/car/'.$carwas->car_image1)}}" class="img-thumbnail w-25">
                            <img src="{{asset('storage/car/'.$carwas->car_image2)}}" class="img-thumbnail w-25">
                        </div>
                        <div class="col-6 my-2">

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
                                        <option value="Comfort" {{$carwas->car_type == "Comfort"?'selected':''}}>Comfort</option>
                                        <option value="Luxury" {{$carwas->car_type == "Luxury"?'selected':''}}>Luxury</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 my-2">
                            <button type="submit"
                                    class="btn btn-sm btn-primary">Approve
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                All Pending Car
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>Brand</th>
                        <th>Number Plate</th>
                        <th>Model</th>
                        <th>Fuel</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($car as $cars)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$cars->user_id}}</td>
                            <td>{{CarBrandById($cars->brand_id)}}</td>
                            <td>{{$cars->number_plate}}</td>
                            <td>{{$cars->model}}</td>
                            <td>{{$cars->fuel}}</td>
                            <td>
                                <a href="{{route('admin.pending.car').'/'.$cars->id}}"
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