@extends('backend.layout.app')

@section('content')

    <div class="content">
        <h1 class="link-muted">User close account List</h1>
        <div class="card">
            <div class="card-body">

                @foreach($cancel as $cancels)
                    @if(userInformation($cancels->user_id, 'status') == 1)
                        <div class="m-2">
                            <p class="float-right" style="font-size: 13px;">
                            </p>
                            <h4>User Information:</h4>
                            <p>Name: {{userInformation($cancels->user_id, 'name')}}</p>
                            <p>Phone: {{userInformation($cancels->user_id, 'phone')}}</p>
                            <p>User Id: {{userInformation($cancels->user_id, 'user_id')}}</p>
                            <h4>Reason: <span class="text-muted">{{$cancels->reason}}</span></h4>
                            <h4>Would you recommended Durpalla? <span class="text-muted">{{$cancels->recommend}}</span></h4>
                            <h4>What could we improve?</h4>
                            <p>{{$cancels->improve}}</p>
                        </div><hr>
                    @endif
                @endforeach


            </div>
        </div>
    </div>


@endsection
