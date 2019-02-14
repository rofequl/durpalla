@extends('frontend.layout.app')
@section('content')


    <section class="pb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto bg-light p-3 border radius">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger mx-auto alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if(session()->has('login_error'))
                        <script>
                            alert("{{ session()->get('login_error') }}");
                        </script>
                    @endif
                        <h2 class="my-3">Sign up with my email</h2>
                    <form class="contact_form" action="{{url('UserRegister')}}" method="post" id="contactForm"
                          novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="number" class="form-control" id="name" name="phone"
                                   placeholder="Enter your phone number" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter your name'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="phone" placeholder="Enter your name"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="phone"
                                   placeholder="Enter your Date of birth" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter your name'">
                        </div>

                        <div class="form-inline my-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="email" name="password"
                                   placeholder="Enter your password" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter email address'">
                        </div>
                        <button type="submit" value="submit" class="primary-btn text-uppercase">Submit Registration
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection