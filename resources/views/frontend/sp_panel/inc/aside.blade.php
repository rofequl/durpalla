<aside id="left-panel" class="left-panel border-right shadow">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('sp.home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Resource</li><!-- /.menu-title -->
                <!---
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-cog"></i>Resource Management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="">View Resource</a></li>
                        <li><i class="fa fa-bars"></i><a href="">Adjusting Resource</a></li>
                    </ul>
                </li>
                --->
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.personalInformation')}}"> <i class="menu-icon fas fa-hands-helping"></i>Personal Information</a>--}}
                {{--</li>--}}
                <li class="">
                    <a href="{{route('resource.index')}}"> <i class="menu-icon fas fa-hands-helping"></i>Resource</a>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.reference')}}"> <i class="menu-icon fas fa-hands-helping"></i>Reference</a>--}}
                {{--</li>--}}
                <li class="">
                    <a href="{{route('sp.car')}}"> <i class="menu-icon fas fa-hands-helping"></i>Add car</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-cog"></i>Rides offered</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('upcoming.ride.index')}}">Upcoming rides</a></li>
                        <li><i class="fa fa-bars"></i><a href="{{route('archived.ride.index')}}">Archived rides</a></li>
                    </ul>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.transection')}}"> <i class="menu-icon fas fa-hands-helping"></i>Transection</a>--}}
                {{--</li>--}}
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.ratting')}}"> <i class="menu-icon fas fa-hands-helping"></i>Ratting</a>--}}
                {{--</li>--}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-cog"></i>My booking</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('current.booking')}}">Current Booking</a></li>
                        <li><i class="fa fa-bars"></i><a href="{{route('history.booking')}}">History</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('request.ride.next')}}"> <i class="menu-icon fas fa-hands-helping"></i>Request a ride</a>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.complain')}}"> <i class="menu-icon fas fa-hands-helping"></i>Complain</a>--}}
                {{--</li>--}}

            </ul>
        </div>
    </nav>
</aside>