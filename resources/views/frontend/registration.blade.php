@extends('frontend.layout.app')
@section('content')


    <section class="bg-light mb-5 py-4" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
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

                        <div class="single-element-widget">
                                <div class="primary-radio">
                                    <input type="checkbox" id="default-radio">
                                    <label for="default-radio"><span class="ml-4">Male</span></label>
                                </div>
                                <div class="primary-radio mt-4">
                                    <input type="checkbox" id="primary-radio">
                                    <label for="primary-radio"><span class="ml-4" style="margin-top: -2px;">Female</span></label>
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