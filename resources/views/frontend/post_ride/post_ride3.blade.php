@extends('frontend.layout.app')
@section('content')



    <section class="mb-5 overlay">
        <div class="container">
            <div class="w-50 mt-3 mx-auto">
                Dhaka <i class="fa fa-arrow-right" aria-hidden="true"></i> Dhaka <i class="fa fa-arrow-right" aria-hidden="true"></i> Chittaganj
                <div class="bg-light border p-2">

                    <div class="row">
                        <div class="col-3 my-auto">Departure Point</div>
                        <div class="col-9">
                            <div>
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </div>
                            <div class="text-primary">
                                Noakhali Tower Dhaka, Bangladesh.<br>
                                3.4 km from your departure point
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-3 my-auto">Departure Point</div>
                        <div class="col-9">
                            <div>

                            </div>
                            <div class="text-primary">
                                Noakhali Tower Dhaka, Bangladesh.<br>
                                3.4 km from your departure point
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-3 my-auto">Departure Point</div>
                        <div class="col-9">
                            <div class="">
                                <i class="fa fa-calendar" aria-hidden="true"></i> Sat 09 Feb 15:50
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-3">Travel Condition</div>
                        <div class="col-9">
                            <div class="single-element-widget">
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p><img src="img/icon/smokeNoSmall.gif"> Non-smoking</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="default-checkbox">
                                        <label for="default-checkbox"></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p><img src="img/icon/phoneAccessYesSmall.gif"> Access to driver's phone number</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="primary-checkbox">
                                        <label for="primary-checkbox"></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p><img src="img/icon/emailAccessYesSmall.gif"> Access to driver's email address</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="confirm-checkbox">
                                        <label for="confirm-checkbox"></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p><img src="img/icon/bagSizeSmallSmall.gif"> Trunk space: backpack size only</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="disabled-checkbox">
                                        <label for="disabled-checkbox"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>




                    <div class="w-100 text-center">
                        <a href="#" class="genric-btn info circle arrow">Complete<span
                                    class="lnr lnr-arrow-right"></span></a>

                    </div>


                </div>
            </div>
        </div>
    </section>







@endsection