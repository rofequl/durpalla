@extends('frontend.layout.app')
@section('content')

    <section class="my-5 overlay">
        <div class="container">
            <div class="card card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row fs-12 lh-1-4">
                            <div class="col-3">
                                <h5 class="my-0">Passenger</h5>
                            </div>
                            <div class="col-9 border-left">
                                Name: Akash Ahmed<br>
                                Phone: 356437589746<br>
                                Address: Dhaka, Bangladesh;
                            </div>
                        </div>
                        <div class="row fs-12 lh-1-4 mt-3">
                            <div class="col-3">
                                <h5 class="my-0">Driver</h5>
                            </div>
                            <div class="col-9 border-left">
                                Name: Akash Ahmed<br>
                                Phone: 356437589746<br>
                                Address: Dhaka, Bangladesh;
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row fs-12 lh-1-4">
                            <div class="col-6 text-right">
                                Tracking Code:<br>
                                Date:<br>
                                Time:<br>
                                Payment Method:
                            </div>
                            <div class="col-6 text-left">
                                {{$stopovers->tracking}}<br>
                                {{$stopovers->date}}<br>
                                {{$stopovers->time}}:{{$stopovers->time2}}<br>
                                Cash on hand<br>

                                <div class="text-center p-1 border rounded">
                                    Amount Due<br>
                                    <p class="text-bold">150$</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <table class="table mt-5 table-bordered">
                    <thead class="bg-light">
                    <tr>
                        <th class="col-4">Description</th>
                        <th class="col">Seat</th>
                        <th class="col">price</th>
                        <th class="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Departure: {{PostRideAddress($stopovers->post_id, $stopovers->going, 'location')}}<br>
                            Destination: {{PostRideAddress($stopovers->post_id, $stopovers->target, 'location')}}
                        </td>
                        <td>
                            {{$seat}}
                        </td>
                        <td>
                            {{$stopovers->price}}$
                        </td>
                        <td>
                            {{$seat * $stopovers->price}}$
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="border">
                            Discount<br>
                            Corporate<br>
                            Tax<br>
                        </td>
                        <td>
                            00<br>
                            00<br>
                            00<br>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="bg-light border">
                            Total
                        </td>
                        <td class="bg-light">
                           00
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection