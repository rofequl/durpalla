<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href=""><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
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
                <li class="">
                    <a href="{{route('admin.booking')}}"> <i class="menu-icon fas fa-hands-helping"></i>Booking</a>
                </li>
                <li class="">
                    <a href="{{route('admin.allRidePost')}}"> <i class="menu-icon fas fa-hands-helping"></i>All Ride Post</a>
                </li>
                <li class="">
                    <a href="{{route('admin.transection')}}"> <i class="menu-icon fas fa-hands-helping"></i>Transection</a>
                </li>
                <li class="">
                    <a href="{{route('admin.requestRide')}}"> <i class="menu-icon fas fa-hands-helping"></i>Request a Ride</a>
                </li>
                <li class="">
                    <a href="{{route('admin.verification')}}"> <i class="menu-icon fas fa-hands-helping"></i>Verification</a>
                </li>
                <li class="">
                    <a href="{{route('admin.resourceList')}}"> <i class="menu-icon fas fa-hands-helping"></i>Resource List</a>
                </li>
                <li class="">
                    <a href="{{route('admin.complain')}}"> <i class="menu-icon fas fa-hands-helping"></i>Complain</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>