@extends('frontend.sp_panel.layout.app')

@section('content')

    <div class="content">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{$error}}
                </div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif

        If you will want to close your account, please tell us a bit more and help us improve our service.
        <div class="card mt-2">
            <div class="card-body">
                <form method="post" action="{{route('sp.account.close.done')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Reason:</label>
                        <select class="form-control" name="reason" id="exampleFormControlSelect1">
                            <option>Choose</option>
                            <option value="1">1</option>
                        </select>                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Would you recommended Durpalla?</label>
                        <select class="form-control" name="recommend" id="exampleFormControlSelect1">
                            <option>Choose</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">What could we improve?</label>
                        <textarea class="form-control" name="improve" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Close my account</button>
                </form>
            </div>
        </div>
    </div>


@endsection