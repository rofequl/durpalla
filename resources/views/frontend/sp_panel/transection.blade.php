@extends('frontend.sp_panel.layout.app')

@section('content')
        <div class="content">
        <h4>Completed transactions</h4>
        <hr>
        Here you can find the list of the transactions you completed on BlaBlaCar (bookings that were manually or automatically approved), as well as any pending or completed refunds. See My Bookings

        <div class="card bg-light mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Transaction date</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Service</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection