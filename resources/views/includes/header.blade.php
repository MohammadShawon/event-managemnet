<?php
    $siteInfo = \App\Settings::all();
?>
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">

        <span>
            <b class="mm-group"><a href="{!! url('dashboards') !!}"><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" alt="" style="height:60px;width: 160px;"></a></b>
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <!--<span class="text-primary">HOMER APP</span>-->
        </div>
<!--        <form role="search" class="navbar-form-custom">
            <div class="form-group">
                <input type="text" class="form-control" name="search">
            </div>
        </form>-->
<!--        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="login.html">Login</a>
                    </li>
                    <li>
                        <a class="" href="login.html">Logout</a>
                    </li>
                    <li>
                        <a class="" href="profile.html">Profile</a>
                    </li>
                </ul>
            </div>
        </div>-->
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="{{ URL::to('logout') }}">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>