@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">
        Here you can find your current bookings. Past bookings can be found in your booking history.
        <div class="card mt-2">
            <div class="card-header">
                <div class="row">
                    <div class="col border-right">
                        Dhaka <i class="fas fa-arrow-right"></i> Delhi
                    </div>
                    <div class="col">
                        Cancelled
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col border-right">
                        <i class="far fa-calendar-alt"></i> Fri 01 Feb - 15:20<br>
                        <i class="fas fa-wheelchair"></i> 2 seat - $4400 cash<br>
                        <i class="fas fa-user"></i> Siddhartho
                    </div>
                    <div class="col">
                        you booking request expired
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection