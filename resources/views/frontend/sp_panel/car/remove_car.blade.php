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
                Sp Remove Car list
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" cellspacing="0" id="DataTable">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Number Plate</th>
                            <th>Image Front</th>
                            <th>Image Back</th>
                            <th>Fuel type</th>
                            <th>Kilometers run</th>
                            <th>Car type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($car as $cars)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{CarBrandById($cars->brand_id)}}</td>
                                <td>{{$cars->model}}</td>
                                <td>{{$cars->number_plate}}</td>
                                <td><img src="{{asset('storage/car/'.$cars->car_image1)}}" class="img-thumbnail img-size-64">
                                </td>
                                <td><img src="{{asset('storage/car/'.$cars->car_image2)}}" class="img-thumbnail img-size-64">
                                </td>
                                <td>{{$cars->fuel}}</td>
                                <td>{{$cars->kilometers}}</td>
                                <td>{{$cars->car_type}}</td>
                                <td>
                                    <a href="{{url('sp-restore-car?Delete='.$cars->id)}}"
                                       class="btn btn-sm btn-primary delete">Restore</a>

                                </td>
                            </tr>
                            <?php $listNum++; ?>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection