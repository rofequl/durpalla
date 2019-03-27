<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Durpalla</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="mt-2">

                @if(CorporateCheckById(Session('phone')))
                    <?php
                    $data = CorporateById(CorporateCheckById(Session('phone')));
                    ?>
                @endif

                @if(isset($data))
                    <img src="{{asset('storage/corporate/'.$data->logo)}}" class="img-thumbnail img-size-64">
                    {{$data->name}}
                @endif

            </div>
            <div class="user-area dropdown float-right show">
                <a href="#" class="dropdown-toggle user-dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu user-dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; right: 0; top: 0px; left: 0px; transform: translate3d(-65px, 55px, 0px);">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                    <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>

                    <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                    <a class="nav-link" href="{{route('sp.logout')}}"><i class="fa fa-power-off"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    jQuery('.user-dropdown-toggle').click(function () {
        jQuery('.user-dropdown-menu').toggle('show');
    });
</script>
