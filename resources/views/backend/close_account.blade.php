@extends('backend.layout.app')

@section('content')

    <div class="content">
        <h1 class="link-muted">User want to close account</h1>
        <div class="card">
            <div class="card-body">

                @foreach($cancel as $cancels)
                    @if(userInformation($cancels->user_id, 'status') == 0)
                        <div class="m-2">
                            <p class="float-right" style="font-size: 13px;">1 second ago
                                <a href="{{route('admin.sp.account.close.done','cancel='.$cancels->user_id)}}" class="btn btn-sm btn-danger ml-2">Close Account</a>
                                <a href="{{route('admin.sp.account.close.done')}}" class="btn btn-sm btn-warning ml-2">Cancel</a>
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
