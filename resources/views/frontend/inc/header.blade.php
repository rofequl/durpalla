<!--================ Start Header Menu Area =================-->
<style>
    .header_area {
        z-index: 1040!important;
    }
</style>
<header class="header_area border-bottom fbf7f7">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('find.ride')}}"><button class="cupid-blue">Find a Ride</button></a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('post.ride')}}"><button class="cupid-blue">Post a Ride</button></a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('request.ride')}}"><button class="cupid-blue">Request one</button></a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('all.ride')}}"><button class="cupid-blue">All Ride</button></a></li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <div class="social-icons d-flex align-items-center">
                            <a href="">
                                <li>বাংলা</li>
                            </a>
                            @if (Session::has('phone'))
                                <a href="{{route('sp.logout')}}">
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