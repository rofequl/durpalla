@extends('backend.layout.app')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header">
                Transection
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Service</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>200</td>
                        <td>100</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>200</td>
                        <td>100</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection