@extends('backend.layout.app')

@section('content')


    <div class="content">

        <div class="card card-body shadow">
            <h4 class="card-title box-title">Verification Pending</h4>
            <div class="card-content">
                <div class="todo-list">
                    <div class="tdl-holder">
                        <div class="tdl-content">
                            <ul>
                                @foreach($verification as $verifications)

                                    @if($verifications->nid_status == 0 && $verifications->nid != "")
                                        <li>
                                            <label>
                                                <span>{{UserName($verifications->user_id)}} insert NID no {{$verifications->nid}}</span>
                                                <a href="{{url('admin-pending-verification-change'.'?a=nid&b=del&c='.$verifications->id)}}"
                                                   class="fa fa-times mx-3 text-danger"></a>
                                                <a href="{{url('admin-pending-verification-change'.'?a=nid&b=add&c='.$verifications->id)}}"
                                                   class="fa fa-check text-success"></a>
                                            </label>
                                        </li>
                                    @endif
                                    @if($verifications->passport_status == 0 && $verifications->passport != "")
                                        <li>
                                            <label>
                                                <span>{{UserName($verifications->user_id)}} insert Passport no {{$verifications->passport}}</span>
                                                <a href="{{url('admin-pending-verification-change'.'?a=pas&b=del&c='.$verifications->id)}}"
                                                   class="fa fa-times mx-3 text-danger"></a>
                                                <a href="{{url('admin-pending-verification-change'.'?a=pas&b=add&c='.$verifications->id)}}"
                                                   class="fa fa-check text-success"></a>
                                            </label>
                                        </li>
                                    @endif
                                    @if($verifications->driving_status == 0 && $verifications->driving != "")
                                        <li>
                                            <label>
                                                <span>{{UserName($verifications->user_id)}} insert Driving Licence {{$verifications->driving}}</span>
                                                <a href="{{url('admin-pending-verification-change'.'?a=dri&b=del&c='.$verifications->id)}}"
                                                   class="fa fa-times mx-3 text-danger"></a>
                                                <a href="{{url('admin-pending-verification-change'.'?a=dri&b=add&c='.$verifications->id)}}"
                                                   class="fa fa-check text-success"></a>
                                            </label>
                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection