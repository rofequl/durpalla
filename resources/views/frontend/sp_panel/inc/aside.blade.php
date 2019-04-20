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
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-alt"></i>Resource</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user-plus"></i><a href="{{route('resource.index')}}">Resource List</a></li>
                        <li><i class="fa fa-trash-alt"></i><a href="{{route('resource.remove.index')}}">Remove Trash</a></li>
                    </ul>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.reference')}}"> <i class="menu-icon fas fa-hands-helping"></i>Reference</a>--}}
                {{--</li>--}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-car"></i>Car</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-car"></i><a href="{{route('sp.car')}}">Add Car</a></li>
                        <li><i class="fa fa-trash-alt"></i><a href="{{route('sp.remove.car')}}">Remove Car</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-truck"></i>Rides offered</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fab fa-font-awesome-flag"></i><a href="{{route('upcoming.ride.index')}}">Upcoming rides</a></li>
                        <li><i class="fa fa-thumbs-up"></i><a href="{{route('archived.ride.index')}}">Archived rides</a></li>
                    </ul>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.transection')}}"> <i class="menu-icon fas fa-hands-helping"></i>Transection</a>--}}
                {{--</li>--}}
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.ratting')}}"> <i class="menu-icon fas fa-hands-helping"></i>Ratting</a>--}}
                {{--</li>--}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fab fa-bandcamp"></i>My booking</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-school"></i><a href="{{route('current.booking')}}">Current Booking</a></li>
                        <li><i class="fa fa-book"></i><a href="{{route('history.booking')}}">History</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('request.ride.next')}}"> <i class="menu-icon fas fa-box"></i>Request a ride</a>
                </li>

                <li class="">
                    <a href="{{route('sp.transition')}}"> <i class="menu-icon fas fa-box"></i>Transition</a>
                </li>
                {{--<li class="">--}}
                    {{--<a href="{{route('sp.complain')}}"> <i class="menu-icon fas fa-hands-helping"></i>Complain</a>--}}
                {{--</li>--}}

            </ul>
        </div>
    </nav>
</aside>