@extends('backend.layout.app')

@section('content')

    <div class="content">


        <div class="card shadow">
            <div class="card-header bg-success text-white">
                All Verification Approve User
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>NID</th>
                        <th>Passport</th>
                        <th>Driving Licence</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($verification as $verifications)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$verifications->user_id}}</td>
                            <td>@if($verifications->nid_status == 1) {{$verifications->nid}} @endif</td>
                            <td>@if($verifications->passport_status == 1) {{$verifications->passport}} @endif</td>
                            <td>@if($verifications->driving_status == 1) {{$verifications->driving}} @endif</td>
                        </tr>
                        <?php $listNum++; ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection