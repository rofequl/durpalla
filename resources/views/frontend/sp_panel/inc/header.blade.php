<style>
    /* cupid blue (inspired by okcupid.com)
*******************************************************************************/
    button.cupid-blue {
        background-color: #d7e5f5;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #d7e5f5), color-stop(100%, #cbe0f5));
        background-image: -webkit-linear-gradient(top, #d7e5f5, #cbe0f5);
        background-image: -moz-linear-gradient(top, #d7e5f5, #cbe0f5);
        background-image: -ms-linear-gradient(top, #d7e5f5, #cbe0f5);
        background-image: -o-linear-gradient(top, #d7e5f5, #cbe0f5);
        background-image: linear-gradient(top, #d7e5f5, #cbe0f5);
        border-top: 1px solid #abbbcc;
        border-left: 1px solid #a7b6c7;
        border-bottom: 1px solid #a1afbf;
        border-right: 1px solid #a7b6c7;
        border-radius: 12px;
        -webkit-box-shadow: inset 0 1px 0 0 white;
        box-shadow: inset 0 1px 0 0 white;
        color: #1a3e66;
        font-weight: bold;
        line-height: 9px;
        padding: 6px 0 7px 0;
        text-align: center;
        text-shadow: 0 1px 1px #fff;
        width: 110px; }
    button.cupid-blue:hover {
        background-color: #ccd9e8;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ccd9e8), color-stop(100%, #c1d4e8));
        background-image: -webkit-linear-gradient(top, #ccd9e8, #c1d4e8);
        background-image: -moz-linear-gradient(top, #ccd9e8, #c1d4e8);
        background-image: -ms-linear-gradient(top, #ccd9e8, #c1d4e8);
        background-image: -o-linear-gradient(top, #ccd9e8, #c1d4e8);
        background-image: linear-gradient(top, #ccd9e8, #c1d4e8);
        border-top: 1px solid #a1afbf;
        border-left: 1px solid #9caaba;
        border-bottom: 1px solid #96a3b3;
        border-right: 1px solid #9caaba;
        -webkit-box-shadow: inset 0 1px 0 0 #f2f2f2;
        box-shadow: inset 0 1px 0 0 #f2f2f2;
        color: #163659;
        cursor: pointer; }
    button.cupid-blue:active {
        border: 1px solid #8c98a7;
        -webkit-box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee;
        box-shadow: inset 0 0 4px 2px #abbccf, 0 0 1px 0 #eeeeee; }

</style>

<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
        </div>

    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <a href="{{route('home')}}"><button class="cupid-blue mt-3 mx-2">Home</button></a>
                <a href="{{route('find.ride')}}"><button class="cupid-blue mt-3 mx-2">Find a Ride</button></a>
                <a href="{{route('post.ride')}}"><button class="cupid-blue mx-2">Post a Ride</button></a>
                <a href="{{route('request.ride')}}"><button class="cupid-blue mx-2">Request one</button></a>
                <a href="{{route('all.ride')}}"><button class="cupid-blue mx-2">All Ride</button></a>
            </div>
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
                    <img class="user-avatar rounded-circle" src="{{asset('storage/user/'.userInformation(Session('userId'),'image'))}}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu user-dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; right: 0; top: 0px; left: 0px; transform: translate3d(-65px, 55px, 0px);">
                    <a class="nav-link" href="{{route('sp.account.profile')}}"><i class="fa fa-user"></i>My Profile</a>
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
