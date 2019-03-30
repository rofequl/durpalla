@extends('frontend.layout.app')
@section('content')
<style>
    a{
        color: #777777;
    }
</style>

    <section class="mb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto border p-3 fbf7f7">
                    <h2>How do you want to sign up?</h2>
                    <section class="about-area mt-0">
                        <div class="about-inner">
                            <a href="{{route('signup.facebook')}}"><div class="single-success p-3 hov-pointer">
                                    Continue with Facebook
                                <i class="fas fa-angle-right float-right fs-20 mt-1"></i>
                            </div></a>
                            <a href="{{route('sp.registration1')}}"><div class="single-success p-3 hov-pointer">
                                    Sign up with my phone
                                    <i class="fas fa-angle-right float-right fs-20 mt-1"></i>
                                </div></a>
                        </div>
                    </section>
                    <br><br>
                    <p class="font-weight-bold my-0">Already a member? <span class="text-primary hov-pointer">Log in</span></p>

                    <p class="my-0 fs-10">By continuing , you accept our <span class="text-primary hov-pointer">T&Cs</span> and
                        <span class="text-primary hov-pointer">Privacy Policy.</span></p>
                </div>
            </div>
        </div>
    </section>


@endsection