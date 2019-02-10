<!--================ Start Header Menu Area =================-->
<style>
    .header_area {
        z-index: 1040!important;
    }
</style>
<header class="header_area border-bottom">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item mr-lg-3 mr-xl-4"><a href="{{route('findRide')}}" class="genric-btn primary-border small radius">Find a Ride</a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4"><a href="{{route('postRide')}}" class="genric-btn info-border small radius">Post a Ride</a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4"><a href="{{route('pickArider')}}" class="genric-btn primary-border small radius">Request one</a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4"><a href="{{route('allRide')}}" class="genric-btn info-border small radius">All Ride</a></li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <div class="social-icons d-flex align-items-center">
                            @if (Session::has('phone'))
                                <a href="">
                                    <li>Log out</li>
                                </a>
                            @else
                                <a href="{{route('sp.registration')}}">
                                    <li>Sign up</li>
                                </a>
                                <a href="{{route('sp.login')}}">
                                    <li>Log in</li>
                                </a>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<!--================ End Header Menu Area =================-->