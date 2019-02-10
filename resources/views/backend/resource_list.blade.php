@extends('backend.layout.app')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header">
                Resource List
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>National Id</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Akram</td>
                        <td>01234567890</td>
                        <td>9812763450987</td>
                        <td><button class="btn btn-sm btn-primary">View</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection