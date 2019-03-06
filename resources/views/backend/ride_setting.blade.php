@extends('backend.layout.app')

@section('content')

    <div class="content">
        <h2>Ride Setting</h2>
        <div class="collapse" id="collapseExample">
            <div class="card">
                <div class="card-header">
                    Edit Ride
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.ride.setting')}}">
                        {{csrf_field()}}
                        Find a ride KM search:<input type="number" value="{{$data->search}}" name="search" class="form-control"
                                                     placeholder="Enter Km to search find ride"><br>
                        <h3 class="text-hov-white mt-5">Standard Car:</h3>
                        First <input type="number" value="{{$data->km_1st}}" name="km1" class="form-control" placeholder="Enter first Km"> Km price <input
                                type="number" value="{{$data->price}}" name="price1" class="form-control" placeholder="First Km Price"><br>
                        Second per Km price <input
                                type="number" value="{{$data->price2}}" name="price2" class="form-control" placeholder="Second Km Price">

                        <h3 class="text-hov-white mt-5">Premier Car:</h3>
                        First <input type="number" value="{{$data->pkm_1st}}" name="pkm1" class="form-control" placeholder="Enter first Km"> Km price <input
                                type="number" value="{{$data->pprice}}" name="pprice1" class="form-control" placeholder="First Km Price"><br>
                        Second per Km price <input
                                type="number" value="{{$data->pprice2}}" name="pprice2" class="form-control" placeholder="Second Km Price">
                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                        <button type="button" class="btn btn-warning m-2" data-toggle="collapse" data-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">Close</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-primary float-right" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">Edit
                </button>
            </div>
            <div class="card-body">
                Find a ride Km search:{{$data->search}}<br>
                <h3 class="text-hov-white mt-5">Standard Car:</h3>
                First {{$data->km_1st}} Km, Per Km price: {{$data->price}}$<br>
                Second per Km price: {{$data->price2}}$

                <h3 class="text-hov-white mt-5">Premier Car:</h3>
                First {{$data->pkm_1st}} Km, Per Km price: {{$data->pprice}}$<br>
                Second per Km price: {{$data->pprice2}}$
            </div>
        </div>
    </div>


@endsection