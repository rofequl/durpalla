<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Durpalla</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <form method="post" action="{{route('admin.tracking')}}">
                    {{csrf_field()}}
                    <div class="input-group pt-2">
                        <input type="text" class="form-control shadow-none" name="tracking" placeholder="Tracking" aria-label="Username"
                               aria-describedby="basic-addon1">
                        <button type="submit" class="input-group-append">
                           Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="header-left">
                <a href="{{route('AdminLogout')}}" class="btn mt-2">LogOut</a>
            </div>
        </div>
    </div>
</header>