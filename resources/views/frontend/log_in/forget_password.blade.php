@extends('frontend.layout.app')
@section('content')


    <section class="pb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xl-8 mx-auto fbf7f7 p-3 border radius">
                    @if(isset($search))
                        <h2 class="text-center">{{$search->name}}, enter your new password</h2>
                    @else
                        <h2 class="text-center">Forgot Password?</h2>
                    @endif
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
                    @if(isset($search))
                        <form class="login100-form validate-form contact_form" method="post"
                              action="{{route('forgot.password.change')}}">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$search->phone}}" name="phone">
                            <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="New password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="retype_password" placeholder="Retype password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="flex-sb-m w-full p-b-30">
                                <div class="contact100-form-checkbox">

                                </div>
                                <div>
                                    <a href="#" class="txt1">
                                        Log In ?
                                    </a>
                                </div>
                            </div>

                            <div class="container-login100-form-btn">
                                <button type="submit" value="submit" class="primary-btn text-uppercase">Submit</button>
                            </div>
                        </form>
                    @else
                        <form class="login100-form validate-form contact_form" method="post"
                              action="{{route('forgot.password')}}">
                            {{csrf_field()}}
                            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                                <span class="label-input100">Phone No.</span>
                                <input class="input100" type="text" name="phone" placeholder="Enter phone number">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="flex-sb-m w-full p-b-30">
                                <div class="contact100-form-checkbox">

                                </div>
                                <div>
                                    <a href="#" class="txt1">
                                        Log In ?
                                    </a>
                                </div>
                            </div>

                            <div class="container-login100-form-btn">
                                <button type="submit" value="submit" class="primary-btn text-uppercase">Submit</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection
