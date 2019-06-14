@extends('frontend.layout.app')
@section('content')


    <section class="pb-5 py-4" id="section1">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
                    <h2 class="text-center Helvetica-Bold text-black">Join Us</h2>
                    <form class="form-signin" method="post" action="{{route('sp.login')}}">
                        {{csrf_field()}}
                        <p class="text-black fs-12 my-3"><img src="{{asset('PNG/Shape2.png')}}" class="mr-5" alt="" width="15" height="25"
                                                   align="left"> Continue with Your Phone</p>
                        <button type="button" class="btn btn-outline-secondary"><img src="{{asset('PNG/Layer17.png')}}"
                                                                                     width="25px" height="25px">
                            facebook
                        </button>
                        <button type="button" class="btn btn-outline-secondary float-right"><img
                                    src="{{asset('PNG/Layer18.png')}}" width="25px" height="25px"> Google
                        </button>
                        <p class="my-3 text-center text-black fs-18">Or</p>
                        <p class="mb-3 text-center text-black fs-18 Helvetica-Bold">Use Phone Number</p>
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
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="number" id="inputEmail" name="phone" class="form-control shadow-none" placeholder="Phone Number"
                               required
                               autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control shadow-none"
                               placeholder="Password" required>
                        <div class="checkbox mb-3">
                            <label class="forget-password">
                                <a href="{{route('forgot.password')}}" class="text-black">Forget your password?</a>
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block border-0" style="background-color: #6f7283"
                                type="submit">Log in
                        </button>
                        <p class="mt-3 mb-3 text-black fs-17">New to Durpalla? Create account now</p>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
