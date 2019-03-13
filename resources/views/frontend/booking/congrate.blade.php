@extends('frontend.layout.app')
@section('content')

    <section class="my-5 overlay">
        <div class="container text-center">
            <h2 class="text-muted">Congratulation Ride Book</h2>
            <p>You can find all your booking ride <a href="{{route('current.booking')}}">Here</a></p>
        </div>
    </section>

@endsection