@extends('frontend.layout.app')
@section('content')
    <style>
        #map {
            height: 70vh;
            width: 100%;
        }
    </style>
    <!--================ Start Home Banner Area =================-->
    <section id="map" class="overlay">

    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Features Area =================-->
    <section class="mb-5 row ml-0" id="StartFeaturesArea">
        <div class="pageBanner col-12 col-lg-8 ml-lg-5 mt-0">
            <div class="container-fluid">
                <h3 class="text-white my-0 ml-md-5">
                    Long Distance Ride Sharing
                </h3>
                <form class="pr-md-5">
                    <div class="form-row">
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" placeholder="Leaving from..."
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Leaving from...'" required=""
                                       class="single-input circle">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" placeholder="Going to..."
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Going to...'" required=""
                                       class="single-input circle">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="far fa-clock"></i></div>
                                <input type="text" name="address" placeholder="Travel date"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Travel date'" required=""
                                       class="single-input circle">
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <a href="#" class="genric-btn info circle mt-2">Find a ride</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!--================ End Features Area =================-->

    <!--================ Start Features Area =================-->
    <section class="mt-5" id="">
        <div class="container border">
            <div class="row counter_wrapper text-center">
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-car-side"></i>
                            <h5>Sign up for free</h5>
                            <p>Qualified Drivers</p>

                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-user-circle"></i>
                            <h5>Daily commute</h5>
                            <p>Service Provider</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-map-marked-alt"></i>
                            <h5>Long distance ride</h5>
                            <p>Trusted Clients</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <i class="fas fa-3x text-black fa-money-bill"></i>
                            <h5>Online payment</h5>
                            <p>Achievements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Features Area =================-->


    <!--================ Start Video Area =================-->
    <section class="video-sec-area section_gap_top mb-5" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 video-right mt-0">
                    <p class="driver-prompt">
                        <span>Driver?</span> <span><a href="#">Post your ride now!</a></span></p>
                    <div class="news-feed-container pb-2">
                        <ul class="list-unstyled">
                            <li>
                                <div class="row">
                                    <div class="col-2 dateShow">
                                        <div class="dateShowS1">FEB</div>
                                        <div class="dateShowS2">18</div>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-2 reviewStar">
                                        <div class="price">90$</div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-2 dateShow">
                                        <div class="dateShowS1">FEB</div>
                                        <div class="dateShowS2">18</div>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-2 reviewStar">
                                        <div class="price">90$</div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-2 dateShow">
                                        <div class="dateShowS1">FEB</div>
                                        <div class="dateShowS2">18</div>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-2 reviewStar">
                                        <div class="price">90$</div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-2 dateShow">
                                        <div class="dateShowS1">FEB</div>
                                        <div class="dateShowS2">18</div>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-4 location">
                                        <h4>Gatineau</h4>
                                        <p>McDonald's, corner of Alumettières and Maison..</p>
                                    </div>
                                    <div class="col-2 reviewStar">
                                        <div class="price">90$</div>
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
                <div class="col-lg-6 video-left overlay">
                    <div class="video-inner justify-content-center align-items-center d-flex">
                        <a id="play-home-video" class="video-play-button"
                           href="https://www.youtube.com/watch?time_continue=2&v=J9YzcEe29d0">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ End video Area =================-->




    <!--================ Start CTA Area =================-->
    <div class="cta-area section_gap overlay my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4">Going that way anyway</h1>
                    <a href="#" class="genric-btn white-border circle m-1">Download in Appstore</a>
                    <a href="#" class="genric-btn white-border circle my-2">Download in Google Play</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->


    <!--================ Real people section Start ================-->
    <section class="about-area mt-0 pb-5" id="realPeople">
        <div class="container pt-5">
            <h2 class="text-center text-capitalize">Happy clint list</h2>
            <div class="about-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img rounded-circle" src="img/people1.jpg" alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    Using TaskRabbit to have a new bookcase built
                                                    was a great choice! Rick did wonderful work with a job that was much
                                                    bigger than we anticipated.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Biplab Banik</p>
                                                <p>Dhanmondi Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img rounded-circle" src="img/people2.jpg" alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    I finally have expertly installed shelves and additional storage in
                                                    my tiny apartment, all thanks to my Tasker.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Lein Chang</p>
                                                <p>Gulshan 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img rounded-circle" src="img/people3.jpg" alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    I'd been agonizing over how to get my new flat screen mounted to my
                                                    wall. In comes Nick on the same day. He arrived with all the tools
                                                    for the job and was just a super nice guy.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Rea Joe</p>
                                                <p>Gulshan 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- single success -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-success py-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <aside class="single_sidebar_widget author_widget">
                                        <img class="author_img rounded-circle" src="img/people4.jpg" alt=""><br>
                                    </aside>
                                </div>
                                <div class="col-8">
                                    <div class="blog_info">

                                        <ul class="blog_meta list text-left">
                                            <li><p class="text-justify">
                                                    TaskRabbit makes moving into your new apartment a 1 hr job instead
                                                    of 1 day job! Moving my belongings from Manhattan to Queens was
                                                    seamless.
                                                </p></li>
                                            <li class="text-right">
                                                <p class="font-weight-bold fs-16">Riardo Pillar</p>
                                                <p>Uttara 2.. Dhaka</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Real people section Start ================-->

@endsection