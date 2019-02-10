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
    <section class="mb-5 bg-blue" id="">
        <div class="container p-3 mb-5">
            <div class="row counter_wrapper">
                <div class="col-lg-7 col-md-12">
                    <div class="banner_content">
                        <h3 class="typo-list text-white">
                            Long Distance Ride Sharing<br>
                        </h3>
                        <form class="form-inline">
                            <div class="input-group-icon mx-1 radius">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" placeholder="Departure City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Departure City'" required="" class="single-input radius">
                            </div>
                            <i class="fa fa-2x fa-arrow-circle-right mx-2 text-white" aria-hidden="true"></i>
                            <div class="input-group-icon mx-1 radius">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="address" placeholder="Destination City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Destination City'" required="" class="single-input radius">
                            </div>
                            <a href="#" class="genric-btn primary mx-1 radius">Go</a>
                        </form>
                    </div>
                </div>
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
                            <img src="img/features/11.png" alt="" width="60px" height="50px">
                            <h5>Sign up for free</h5>
                            <p>Qualified Drivers</p>

                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <img src="img/features/22.png" alt="" width="60px" height="50px">
                            <h5>Daily commute</h5>
                            <p>Service Provider</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <img src="img/features/3.png" alt="" width="60px" height="50px">
                            <h5>Long distance ride</h5>
                            <p>Trusted Clients</p>
                        </div>
                    </div>
                </div>
                <!-- single feature -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_feature">
                        <div class="info-content">
                            <img src="img/features/4.png" alt="" width="60px" height="50px">
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
                <div class="col-lg-6 video-left overlay">
                    <div class="video-inner justify-content-center align-items-center d-flex">
                        <a id="play-home-video" class="video-play-button"
                           href="https://www.youtube.com/watch?time_continue=2&v=J9YzcEe29d0">
                            <span></span>
                        </a>
                    </div>
                </div>
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
            </div>
        </div>
    </section>

    <!--================ End video Area =================-->




    <!--================ Start CTA Area =================-->
    <div class="cta-area section_gap overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-4">Going that way anyway</h1>
                    <a href="#" class="genric-btn white-border circle mr-1">Download in Appstore</a>
                    <a href="#" class="genric-btn white-border circle">Download in Google Play</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->


    <!--================ Real people section Start ================-->
    <section class="bg-light" id="realPeople">
        <div class="container pt-5">
            <div class="row justify-content-center realPeople-image">
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="img/people1.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            Using TaskRabbit to have a new bookcase built was a great choice! Rick did wonderful work
                            with a
                            job that was much bigger than we anticipated.<br><br><br>
                            <span>
                    Biplab Banik,<br>
                    Dhanmondi Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="img/people2.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            I finally have expertly installed shelves and additional storage in my tiny apartment, all
                            thanks to my Tasker.<br><br><br>
                            <span>
                    Lein Chang<br>
                    Gulshan 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="img/people3.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            I'd been agonizing over how to get my new flat screen mounted to my wall. In comes Nick on
                            the
                            same day. He arrived with all the tools for the job and was just a super nice
                            guy.<br><br><br>
                            <span>
                    Rea Joe<br>
                    Gulshan 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 m-2 my-4">
                    <div class="media">
                        <img src="img/people4.jpg" class="mr-3 w-25">
                        <div class="media-body">
                            TaskRabbit makes moving into your new apartment a 1 hr job instead of 1 day job! Moving my
                            belongings from Manhattan to Queens was seamless.<br><br><br>
                            <span>
                    Riardo Pillar<br>
                    Uttara 2.. Dhaka
                         </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Real people section Start ================-->

@endsection