<?php
    //$siteInfo = \App\Settings::all();
?>
<!--Main Header-->
    <header class="main-header sticky-header">
        <div class="container clearfix">
            <div class="header-area">
                <div class="logo">
                    <figure>
                        <!-- <a href="index-2.html"><img src="{!! asset('public/frontend/images/logo.png') !!}" alt=""></a> -->
                        <a href="{{URL::to('/')}}"><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" alt="" style="height:65px; width: 167px;"></a>
                    </figure>
                </div>
                <nav class="main-menu">
                    <div class="navbar-header clearfix">
                        <!-- Toggle Button -->      
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>                    
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="current"><a href="">Home</a></li>
                            <li class="dropdown"><a href="#">Speakers</a>
                                <ul>
                                    <li><a href="">our speakers</a></li>
                                    <li><a href="">single speakers</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Pages</a>
                                <ul>
                                    <li><a href="">about us</a></li>
                                    <li><a href="">our gallery</a></li>
                                    <li><a href="">testimonials</a></li>
                                    <li><a href="">pricing</a></li>
                                    <li><a href="">404 error</a></li>
                                </ul>
                            </li>
                            <li><a href="schedule.html">Schedule</a></li>
                            <li><a href="sponsor.html">Sponsors</a></li>
                            <li class="dropdown"><a href="#">Blog</a>
                                <ul>
                                    <li><a href="">our blog</a></li>
                                    <li><a href="">single blog</a></li>
                                </ul>
                            </li>                      
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>                    
                </nav>
                <div class="link-btn">
                    <a href="#" class="btn-style-one">buy ticket</a>
                </div>
            </div>
        </div>
    </header>
    <!--End Main Header -->