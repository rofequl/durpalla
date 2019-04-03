@extends('frontend.layout.app')
@section('content')


    <section class="pb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xl-8 mx-auto fbf7f7 p-3 border radius">
                    <h2 class="text-center">You want to Log in?</h2>
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

                    <form class="login100-form validate-form contact_form" method="post" action="{{route('sp.login')}}">
                        {{csrf_field()}}
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Phone No.</span>
                            <input class="input100" type="text" name="phone" placeholder="Enter phone number">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Enter password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a href="#" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" value="submit" class="primary-btn text-uppercase">Login</button>
                            <a href="" value="submit" class="primary-btn text-uppercase mx-0 mx-lg-5"><i
                                    class="fab fa-facebook-f mr-2"></i> Login in Facebook
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
