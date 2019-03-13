@extends('backend.layout.app')

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

        <div class="card border shadow">
            <div class="card-header">
                Member Add Corporate Group

            </div>
            <div class="card-body">
                <form class="form-inline" method="post" action="{{route('corporate.group.Store')}}">
                    {{csrf_field()}}
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only"></label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <select class="form-control" name="corporate">
                            @foreach($corporate as $corporates)
                               <option value="{{$corporates->id}}">{{$corporates->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add Corporate Group</button>
                </form>
            </div>
        </div>
    </div>


@endsection