@extends('frontend.layout.app')
@section('content')


    <section class="pb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto bg-light p-3 border radius">
                    @if(session()->has('login_error'))
                        <script>
                            alert("{{ session()->get('login_error') }}");
                        </script>
                    @endif
                        <h2 class="my-3">Sign up with my phone</h2>
                    <form class="contact_form" action="{{url('UserRegister')}}" method="post" id="contactForm"
                          novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="name" name="phone"
                                   placeholder="Enter your phone number" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter your name'">
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Enter your name"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" id="datepicker" name="dob"
                                   placeholder="Enter your Date of birth" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter your Date of birth'">
                            @if ($errors->has('dob'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dob') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-inline my-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male">
                                <label class="form-check-label" for="exampleRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
                                <label class="form-check-label" for="exampleRadios2">
                                    Female
                                </label>
                                @if ($errors->has('gender'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="email" name="password"
                                   placeholder="Enter your password" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter your password'">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" value="submit" class="primary-btn text-uppercase">Submit Registration
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection