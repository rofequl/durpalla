@extends('frontend.layout.app')
@section('content')
    <style>
        .news-feed-container {
            float: none;
            clear: none;
            width: 100%;
            height: auto;
            font-size: 12px;
            overflow: hidden;
            border-top: 0;
            border-bottom: 0;
        }

        div.relative {
            position: relative;
            width: 28px;
            height: 70px;
            border: 0;
        }

        div.absolute {
            position: absolute;
            top: 10px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }

        div.absolute2 {
            position: absolute;
            top: 20px;
            left: 10px;
            height: 54px;
            border: 1px solid #73AD21;
        }

        div.absolute3 {
            position: absolute;
            top: 72px;
            left: 5px;
            padding: 4px;
            border-radius: 10px;
            border: 2px solid #73AD21;
        }
    </style>

    <hr class="mt-0">
    <section class="mb-5 overlay">
        <div class="container">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Post a Request. <span class="text-primary">Get Alerts.</span></h2>
                    <p>We'll notify you via email of every long distance rideshare that passes by you and your
                        destination. Post your information for drivers to see.<span
                                class="font-weight-bold">Try it out!</span></p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                @foreach($ride as $rides)
                    <div class="card col-12 col-md-9 px-0 mt-3">
                        <div class="card-header bg-paste text-white py-1">
                            <p class="text-capitalize">{{date("l F-d", strtotime($rides->after))}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row text-uppercase lh-1-1">
                                <div class="col-md-2">Time</div>
                                <div class="col-md-1"></div>
                                <div class="col-md">Ride</div>
                                <div class="col-md-3">Driver</div>
                                <div class="col-md-2">Rating & price</div>
                            </div>
                            <hr class="bg-warning">
                            <div class="news-feed-container pb-2">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="row text-center">
                                            <div class="col-12 col-sm-4 col-md-2 dateShow">
                                                <p class="my-0">{{$rides->updated_at}}</p>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-1">
                                                <div class="relative">
                                                    <div class="absolute"></div>
                                                    <div class="absolute2"></div>
                                                    <div class="absolute3"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md location text-left">

                                                <h4>Departure</h4>
                                                <p>{{$rides->s_location}}</p><br>
                                                <h4>Destination</h4>
                                                {{$rides->e_location}}
                                                <p></p>


                                            </div>
                                            <div class="col-12 col-sm-4 col-md-3 p-0">

                                                <aside class="single_sidebar_widget author_widget text-center lh-1-1">
                                                    <img class="author_img w-25 rounded-circle"
                                                         src="img/blog/author.png" alt=""><br>
                                                    <h5 class="my-0">Charlie Barber</h5>
                                                    <a href="#" class="fs-8 my-0">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </a><br>
                                                    <a href="#" class="btn btn-success small circle my-1 fs-10">View
                                                        profile/Preview</a>
                                                </aside>


                                            </div>
                                            <div class="col-12 col-sm-4 col-md-2 reviewStar my-auto">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script>
    </script>







@endsection