@extends('backend.layout.app')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header">
                Booking
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Departure City</th>
                        <th>Destination City</th>
                        <th>Passenger</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td>Anwar</td>
                        <td>50$</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td>Anwar</td>
                        <td>50$</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td>Anwar</td>
                        <td>50$</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection