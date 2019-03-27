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
            <div class="header-left">
                <a href="{{route('sp.logout')}}" class="btn mt-2">LogOut</a>
            </div>
        </div>
    </div>
</header>