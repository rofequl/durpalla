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
    </style>


    <section class="my-5 overlay">
        <div class="container">
            <div class="row mt-3">
                <div class="text-center mx-auto">
                    <h2>Offer a ride on your next long journey</h2>
                    <p>After booking you can chat with your Tasker, agree on a exact time.</p>
                </div>
            </div>
            <div class="w-100">
                <div class="card">
                    <div class="card-header bg-paste text-white py-1">
                        <p>THURSDAY FEBRUARY 7</p>
                    </div>
                    <div class="card-body">
                        <div class="row text-uppercase lh-1-1">
                            <div class="col-1 ">Time</div>
                            <div class="col-1 ">Map</div>
                            <div class="col-3">Departure</div>
                            <div class="col-4">Destination</div>
                            <div class="col">Condition</div>
                            <div class="col">Rating & price</div>
                        </div>
                        <hr class="bg-warning">
                        <div class="news-feed-container pb-2">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="row">
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
                <div class="card mt-3">
                    <div class="card-header bg-paste text-white py-1">
                        <p>THURSDAY FEBRUARY 8</p>
                    </div>
                    <div class="card-body">
                        <div class="row text-uppercase lh-1-1">
                            <div class="col-1 ">Time</div>
                            <div class="col-1 ">Map</div>
                            <div class="col-3">Departure</div>
                            <div class="col-4">Destination</div>
                            <div class="col">Condition</div>
                            <div class="col">Rating & price</div>
                        </div>
                        <hr class="bg-warning">
                        <div class="news-feed-container pb-2">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="row">
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
                                        <div class="col-1 dateShow">
                                            <p class="my-0">6:30 PM</p>
                                            <p class="my-0">5 min ago</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <img src="img/icon/map.png" class="img-fluid">
                                        </div>
                                        <div class="col-3 location">
                                            <h4>Gatineau</h4>
                                            <p>McDonald's, corner of Alumettières and Maison..</p>
                                        </div>
                                        <div class="col-4 location">
                                            <div class="media">
                                                <img src="img/icon/blueArrow.png" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h4>Gatineau</h4>
                                                    <p>McDonald's, corner of Alumettières and Maison..</p></div>
                                            </div>


                                        </div>
                                        <div class="col my-auto">
                                            <img src="img/icon/smokeNoSmall.gif">
                                            <img src="img/icon/bagSizeSmallSmall.gif">
                                            <img src="img/icon/emailAccessYesSmall.gif">
                                            <img src="img/icon/phoneAccessYesSmall.gif">
                                        </div>
                                        <div class="col reviewStar my-auto">
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
        </div>
    </section>





@endsection