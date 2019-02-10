@extends('frontend.layout.app')
@section('content')


    <section class="bg-light mb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form class="login100-form validate-form contact_form">
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Phone No.</span>
                            <input class="input100" type="text" name="username" placeholder="Enter phone number">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pass" placeholder="Enter password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection