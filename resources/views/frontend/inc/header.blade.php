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
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('img/logo.png')}}"
                                                                             alt="durpalla logo" width="117px"></a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto Helvetica">
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('find.ride')}}"
                                                                                  style="color: #163659;">
                                {{__('file.header1')}}
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('post.ride')}}"
                                                                                  style="color: #163659;">
                                {{__('file.header2')}}
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('request.ride')}}"
                                                                                  style="color: #163659;">
                                {{__('file.header3')}}
                            </a></li>
                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('all.ride')}}"
                                                                                  style="color: #163659;">
                                {{__('file.header4')}}
                            </a></li>
                        {{--                        <li class="nav-item mr-lg-3 mr-xl-4 my-1 ml-1 my-lg-0"><a href="{{route('popular.ride')}}"--}}
                        {{--                                                                                  style="color: #163659;">--}}
                        {{--                                Popular Ride--}}
                        {{--                            </a></li>--}}
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <div class="social-icons d-flex align-items-center">
                            <a href="">
                                <li>

                                    @if (App::getLocale() == 'en')
                                        <a href="{{route('language','lng=bn')}}"
                                           style="color: #163659!important;">বাংলা</a>
                                    @else
                                        <a href="{{route('language','lng=en')}}" style="color: #163659!important;">English</a>
                                    @endif
                                </li>
                            </a>
                            @if (Session::has('userId'))
                                {{--                                <a href="{{route('notification')}}" class="notification fs-25">--}}
                                {{--                                    <span><i class="fa fa-bell"></i></span>--}}
                                {{--                                    @if(notification() > 0)--}}
                                {{--                                        <span class="badge">{{notification()}}</span>--}}
                                {{--                                    @endif--}}
                                {{--                                </a>--}}


                                <div class="dropdown">
                                    <a class="notification fs-25 notishow" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span><i class="fa fa-bell"></i></span>
                                        @if(notification() > 0)
                                            <span class="badge notify-badge">{{notification()}}</span>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right notification-menu shadow border p-0">
                                        <div class="card border-0">
                                            <div class="card-header p-1 fs-12 bold">Notification</div>
                                            <div class="card-body p-0 fs-13">


                                                @foreach(notificationList() as $notifications)
                                                    <a class="pr-0"
                                                       href="{{route('notification.preview',$notifications->id)}}">
                                                        <div class="p-2">
                                                            Your request ride
                                                            match {{convertNumber(count(explode(",",$notifications->matching)))}}
                                                            post {{$notifications->matching}}.
                                                        </div>
                                                    </a>
                                                    <hr class="my-0">
                                                @endforeach
                                                @if(notificationList()->count() == 0)
                                                    <p class="text-center p-1">You have no any notification.</p>
                                                @endif
                                            </div>
                                            <div class="card-footer p-1 fs-12 bold">
                                                <p class="text-center mb-0"><a href="{{route('notification')}}"
                                                                               class="text-muted">See All</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            @else
                                <a href="{{route('sp.registration')}}" class="genric-btn info-border radius"
                                   style="line-height: 2;padding: 0 15px;color: #163659!important;">
                                    <li>{{__('file.header5')}}</li>
                                </a>
                                <a href="{{route('sp.login')}}" class="genric-btn info-border radius"
                                   style="line-height: 2;padding: 0 15px;margin-left: 14px;color: #163659!important;">
                                    <li>{{__('file.header6')}}</li>
                                </a>

                            @endif
                        </div>
                        @if (Session::has('userId'))
                            <li class="nav-item submenu user-submenu dropdown"
                                style="overflow: visible;max-height: unset">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" width="70px" height="70px"
                                         src="{{userInformation(Session('userId'),'image')}}">
                                </a>
                                <ul class="dropdown-menu pro-droupdown" style="margin-left: -122px">
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

@if(Session::has('userId') && ratinguser())
    @php
        $rating = ratinguser();
    @endphp
    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rating this ride</h5>
                </div>
                <div class="modal-body text-center">
                    <a href="{{route('sp.driver.rating','rating='.base64_encode($rating->tracking.'_1'))}}"
                       title="1 Star"><span class="fa fa-star"></span></a>
                    <a href="{{route('sp.driver.rating','rating='.base64_encode($rating->tracking.'_2'))}}"
                       title="2 Star"><span class="fa fa-star"></span></a>
                    <a href="{{route('sp.driver.rating','rating='.base64_encode($rating->tracking.'_3'))}}"
                       title="3 Star"><span class="fa fa-star"></span></a>
                    <a href="{{route('sp.driver.rating','rating='.base64_encode($rating->tracking.'_4'))}}"
                       title="4 Star"><span class="fa fa-star"></span></a>
                    <a href="{{route('sp.driver.rating','rating='.base64_encode($rating->tracking.'_5'))}}"
                       title="5 Star"><span class="fa fa-star"></span></a>
                </div>
            </div>
        </div>
    </div>
@endif

<script>

    $(window).on('load', function () {
        $('#myModal').modal('show');
    });

    $(document).on('click', '.notishow', function () {
        $.ajax({
            url: "{{ route('notification.show') }}",
            type: 'get',
            success: function (response) {
                $('.notify-badge').hide();
            }
        });
    });

</script>


<!--================ End Header Menu Area =================-->
