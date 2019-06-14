@extends('frontend.layout.app')
@section('content')
    <style>
        a {
            color: #777777;
        }
        .form-signin input[type="number"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

    <section class="pb-5 py-4" id="section1">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
                    <h2 class="text-center Helvetica-Bold text-black">Sign Up</h2>
                    <form class="form-signin" action="{{url('UserRegister')}}" method="post">
                        {{csrf_field()}}
                        <p class="text-black fs-12 my-3"><img src="{{asset('PNG/Shape2.png')}}" class="mr-5" alt=""
                                                              width="15" height="25"
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
                        <label for="inputName" class="sr-only">User Name</label>
                        <input type="text" id="inputName" name="name"
                               class="form-control shadow-none {{ $errors->has('name') ? ' is-invalid' : '' }}"
                               placeholder="Your Name" required autofocus>
                        <label for="inputEmail" class="sr-only">Phone Number</label>
                        <input type="number" id="inputEmail" name="phone"
                               class="form-control shadow-none {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                               placeholder="Phone Number" required>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword"
                               class="form-control shadow-none {{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="Password" required>

                        <div class="form-group form-inline">
                            <select name="day">
                                <option value="" selected disabled>Day</option>
                                @for($i=0;$i<31;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <select name="month">
                                <option value="" selected disabled>Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July ">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November ">November</option>
                                <option value="December">December</option>
                            </select>
                            <select name="year">
                                <option value="" selected disabled>Year</option>
                                @for($i=1950;$i<2018;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            @if ($errors->has('dob'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dob') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-inline my-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                       value="Male">
                                <label class="form-check-label" for="exampleRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                       value="Female">
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
                        <button class="btn btn-lg btn-primary btn-block border-0" style="background-color: #6f7283"
                                type="submit">Sign Up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection