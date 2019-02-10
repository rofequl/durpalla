@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header">
                Request a ride
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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="img/about-author.png" class="mr-3" alt="...">
                        </td>
                        <td>Akram</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection