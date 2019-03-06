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
                    <a href="{{route('admin.ride.setting')}}"> <i class="menu-icon fas fa-hands-helping"></i>Ride Setting</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-car"></i>Car management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-check-circle"></i><a href="{{route('admin.approve.car')}}">Approve</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.pending.car')}}">Pending</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-car"></i>Booking</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-check-circle"></i><a href="{{route('admin.approve.post')}}">Complete Book</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.pending.post')}}">Not Book</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.disapprove.post')}}">Ongoing Book</a></li>
                        <li><i class="fas fa-check-circle"></i><a href="{{route('admin.disapprove.post')}}">Complete Ride</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-car"></i>All Ride Post</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-check-circle"></i><a href="{{route('admin.approve.post')}}">Approve</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.pending.post')}}">Pending</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.disapprove.post')}}">Disapprove</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('admin.transection')}}"> <i class="menu-icon fas fa-hands-helping"></i>Transection</a>
                </li>
                <li class="">
                    <a href="{{route('admin.requestRide')}}"> <i class="menu-icon fas fa-hands-helping"></i>Request a Ride</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-car"></i>Verification</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-check-circle"></i><a href="{{route('admin.approve.verification')}}">Approve</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.pending.verification')}}">Pending</a></li>
                        <li><i class="fas fa-pause"></i><a href="{{route('admin.disapprove.verification')}}">Disapprove</a></li>
                    </ul>
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