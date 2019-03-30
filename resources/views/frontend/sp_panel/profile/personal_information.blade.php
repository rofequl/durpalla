@extends('frontend.sp_panel.profile.layout.app')

@section('content')

    <div class="content">
        <style>
            .user-information td {
                width: 150px;
                margin: 10px 0;
            }
        </style>
        <h3>Your personal information</h3>
        <hr>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Error</span>
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                @if(session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Alert</span>
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <form method="post" action="{{route('sp.account.profile.update')}}">
                    {{csrf_field()}}
                    <div class="row mb-4">
                        <div class="col-6 col-md-3 text-right">Gender:</div>
                        <div class="col-6 ml-2">{{$user->gender}}</div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 col-md-3 text-right">Name:</div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <input name="name" type="text" value="{{$user->name}}" class="form-control"
                                       aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 col-md-3 text-right">Date of Birth:</div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <input name="dob" type="text" value="{{$user->dob}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 col-md-3 text-right">Email:</div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <input type="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 col-md-3 text-right">Phone:</div>
                        <div class="col-6">
                            <div class="input-group input-group-sm mb-3 col-md-6">
                                <input name="phone" type="text" value="{{$user->phone}}"
                                       class="form-control" {{$user->phone ? 'readonly':''}}>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 col-md-3 text-right"></div>
                        <div class="col-6">
                            <button class="btn btn-sm btn-primary ml-2 px-5">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection