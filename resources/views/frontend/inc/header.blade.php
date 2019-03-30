<!--================ Start Header Menu Area =================-->
<style>
    .header_area {
        z-index: 1040 !important;
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
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('find.ride')}}">
                                <button class="cupid-blue">{{__('file.header1')}}</button>
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('post.ride')}}">
                                <button class="cupid-blue">{{__('file.header2')}}</button>
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('request.ride')}}">
                                <button class="cupid-blue">{{__('file.header3')}}</button>
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('all.ride')}}">
                                <button class="cupid-blue">{{__('file.header4')}}</button>
                            </a></li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <div class="social-icons d-flex align-items-center">
                            <a href="">
                                <li>

                                    @if (App::getLocale() == 'en')
                                        <a href="{{route('language','lng=bn')}}">বাংলা</a>
                                    @else
                                        <a href="{{route('language','lng=en')}}">English</a>
                                    @endif
                                </li>
                            </a>
                            @if (Session::has('phone'))

                            @else
                                <a href="{{route('sp.registration')}}">
                                    <li>{{__('file.header5')}}</li>
                                </a>
                                <a href="{{route('sp.login')}}">
                                    <li>{{__('file.header6')}}</li>
                                </a>
                            @endif
                        </div>
                        @if (Session::has('userId'))
                            <li class="nav-item submenu user-submenu dropdown"
                                style="overflow: visible;max-height: unset">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" src="{{asset('storage/user/'.userInformation(Session('userId'),'image'))}}" alt="User Avatar">
                                </a>
                                <ul class="dropdown-menu" style="margin-left: -122px">
                                    <li class="nav-item"><a class="user-link" href="{{route('sp.home')}}"><i
                                                    class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                                    <li class="nav-item"><a class="user-link" href="{{route('sp.account.profile')}}"><i
                                                    class="fa fa-user"></i>My Profile</a></li>
                                    <li class="nav-item"><a class="user-link" href="{{route('resource.index')}}"><i
                                                    class="fa fa-hands-helping"></i>Resource</a></li>
                                    <li class="nav-item"><a class="user-link" href="{{route('sp.car')}}"><i
                                                    class="fa fa-hands-helping"></i>Add car</a></li>
                                    <li class="nav-item"><a class="user-link" href="{{route('upcoming.ride.index')}}"><i
                                                    class="fa fa-hands-helping"></i>Rides offered</a></li>
                                    <li class="nav-item"><a class="user-link" href="{{route('sp.logout')}}"><i
                                                    class="fa fa-power-off"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<!--================ End Header Menu Area =================-->