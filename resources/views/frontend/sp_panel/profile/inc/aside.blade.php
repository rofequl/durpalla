<aside id="left-panel" class="left-panel border-right shadow">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('sp.home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Profile information</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{route('sp.account.profile')}}"> <i class="menu-icon fas fa-hands-helping"></i>Personal information</a>
                </li>
                <li class="">
                    <a href="{{route('sp.verification')}}"> <i class="menu-icon fas fa-hands-helping"></i>Verification</a>
                </li>
                <li class="">
                    <a href="{{route('sp.account.photo')}}"> <i class="menu-icon fas fa-hands-helping"></i>Photo</a>
                </li>
                <li class="menu-title">Account</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fas fa-hands-helping"></i>Password</a>
                </li>
                <li class="">
                    <a href="{{route('sp.account.close')}}"> <i class="menu-icon fas fa-hands-helping"></i>Close my Account</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>