@extends('backend.layout.app')

@section('content')


    <div class="content">

        <div class="card">
            <div class="card-header">
                Request Ride
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Image</th>
                        <th>Passenger</th>
                        <th>Departure City</th>
                        <th>Destination City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="{{asset('img/about-author.png')}}" class="mr-3" alt="...">
                        </td>
                        <td>Akram</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td><button class="btn btn-sm btn-primary">Approve</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <img src="{{asset('img/about-author.png')}}" class="mr-3" alt="...">
                        </td>
                        <td>Akram</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td><button class="btn btn-sm btn-primary">Approve</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <img src="{{asset('img/about-author.png')}}" class="mr-3" alt="...">
                        </td>
                        <td>Akram</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td><button class="btn btn-sm btn-primary">Approve</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection