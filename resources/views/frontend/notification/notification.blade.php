@extends('frontend.layout.app')
@section('content')




    <section class="my-5 overlay">
        <div class="container-fluid">
            <div class="row m-3">
                <div class="w-100 mb-3">
                    <h2>Your Notifications</h2>
                    <hr>
                </div>

                <div class="card w-100">

                    @foreach($notification as $notifications)
                        @if($notifications->status == 0)
                            <div class="card-body" style="background-color: #58f5fc"><a href="{{route('notification.preview',$notifications->id)}}">
                                    Your request ride match {{count(explode(",",$notifications->matching))}}
                                    post {{$notifications->matching}}.
                                </a></div>
                            <hr class="my-0">
                        @else
                            <div class="card-body bg-light">
                                you request ride match two post {{$notifications->matching}}
                            </div>
                            <hr class="my-0">
                        @endif
                    @endforeach

                </div>


            </div>
        </div>
    </section>

@endsection