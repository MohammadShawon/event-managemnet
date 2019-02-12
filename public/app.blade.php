<!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{$setting->description}}">
    <meta name="keywords" content="{{$setting->keyword}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$setting->name}} | @yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dropdown-hover/bootstrap-dropdownhover.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/dropdown-hover/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/form-validate/css/form-validate.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/choose-file/file-select.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen-js/chosen.css') }}">
    @yield('styles')
    <style>
        @media (max-width: 768px) {
           .job-sign-box ul, .job-top-bar .job-seeker-board ul li sign-title, .account-box {
                text-align: center;
                display: block;
                float: inherit;
                /* width: 50%; */
                margin-left: 189px;
                margin-top: -48px;
            }
        }
    </style>
    <link href="{{ asset('user/css/app.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('user/images/favicon.ico')}}" type="image/x-icon"/>
</head>
<body style="font-family: 'Open Sans', sans-serif;">
<!--job-top-bar start-->
<!--job-top-bar start-->
<div class="job-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 hidden-xs">
                <div class="job-social-icon">
                    <ul class="list-inline list-unstyled">
                        @if(!empty($setting->facebook))
                            <li><a href="{{$setting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                        @endif
                        @if(!empty($setting->twitter))
                            <li><a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                        @endif
                        @if(!empty($setting->google_plus))
                            <li><a href="{{$setting->google_plus}}" target="_blank"><i class="fa fa-google-plus"></i></a> </li>
                        @endif
                        @if(!empty($setting->instagram))
                            <li><a href="{{$setting->instagram}}" target="_blank"><i class="fa fa-youtube"></i></a> </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="job-seeker-board">
                    <ul class="list-inline list-unstyled">
                        @if(Auth::guest())
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle sign-title" data-toggle="dropdown"><img class="login-arrow" src="{{asset('user/images/login.png')}}"/> Login</a>
                                    <div class="dropdown-menu sign-box">
                                        <h4 class="sign-in-title">Sign in</h4>
                                        <form method="POST" action="{{ route('login') }}">
                                            {{csrf_field()}}
                                            @if(count($errors->all()))
                                                <div class="alert custom-dark-alert-danger alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    @foreach ($errors->all() as $error)
                                                        <p><strong><i class="fa fa-times"></i></strong> {{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="form-user">
                                                <input class="form-control cat-form" type="text" name="username"  placeholder="Username or Email or Mobile" value="{{ old('username') }}" autofocus required>
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="form-user">
                                                <input class="form-control cat-form" type="password" placeholder="Enter password" name="password" required>
                                                <i class="fa fa-lock"></i>
                                            </div>
                                            <button type="submit" class="btn job-sign-in">Sign in</button>
                                            <a class="job-new-account" href="{{url('register')}}">Create New Account</a>
                                            <a class="job-forgot-account" href="{{route('password.request')}}">forgot my password?</a>
                                        </form>

                                    </div>
                                </div>
                            </li>
                            <li class="account-box"><a class="sign-title" href="{{url('register')}}">SignUp</a></li>
                        @else
                            @role('admin')
                            <li class="account-box">
                                <a href="{{ url('admin/dashboard') }}" class="sign-title">
                                    <i class="fa fa-th"></i> Admin Panel
                                </a>
                            </li>
                            @endrole
                            <li class="hidden-xs">
                                <div class="dropdown login-user">
                                    <ul class="list-inline list-unstyled">
                                        <li>
                                            <div class="user-admin">
                                                @if(!empty(Auth::user()->avatar))
                                                    <img src="{{asset('uploads')}}/{{Auth::user()->avatar}}" class="img-responsive">
                                                @else
                                                    <img src="{{asset('admin/images/avatar.png')}}" class="img-responsive">
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            <button class="btn btn-user-login dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name}}
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu login-box">
                                                <li><a href="{{asset('/profile')}}/{{ Auth::user()->username}}"><i class="fa fa-user"></i>Profile</a></li>
                                                <li><a href="{{asset('/settings')}}"><i class="fa fa-cog"></i>Update Profile</a></li>
                                                <li><a href="{{asset('/resume')}}"><i class="fa fa-file"></i>Resume</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out"></i> Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li><a href="{{url('resume')}}" class="btn btn-jobs-post">Job seeker</a></li>
                        <li><a href="{{url('employer')}}" class="btn btn-jobs-post job-employee">employer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--job-top-bar end-->
<!-- job-navbar start from here-->
<nav class="navbar navbar-default job-navbar" style="margin: 0px 0 0;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dropdown" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand job-logo" href="{{url('/')}}">
                <img src="{{asset('uploads')}}/{{$setting->logo}}" style="height:43px;"/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="dropdown">
            <ul class="nav navbar-nav navbar-right">
                @role('admin')<li><a class="nav-title" href="{{url('search/resume')}}">Search Resume</a></li>@endrole
                @role('employer')<li><a class="nav-title" href="{{url('search/resume')}}">Search Resume</a></li>@endrole
                <li><a class="nav-title" href="{{url('contact')}}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- job-navbar end from here-->
@yield('content')
<!--job-footer start-->
<div class="job-footer">
    <div class="container">
        <div class="row">
            <div class=" hidden-md hidden-lg ">
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">

                       @if(Auth::user()!=null)
                        <h4 class="footer-title">Quick Access Menu</h4>
                        <span class="title-border"></span>
                        <ul class="list-unstyled">
                            <li><a href="{{asset('/profile')}}/{{ Auth::user()->username}}"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{asset('/settings')}}"><i class="fa fa-cog"></i> Update Profile</a></li>
                            <li><a href="{{asset('/resume')}}"><i class="fa fa-file"></i> Resume</a></li>
                            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a></li>

                        </ul>
                        @endif


                </div>
            </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h4 class="footer-title">Categories</h4>
                    <span class="title-border"></span>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                            <li><a href="{{url('search?cat=')}}{{str_replace(' ', '+', $category->name)}}">{{$category->name}}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h4 class="footer-title">Technology Park</h4>
                    <span class="title-border"></span>
                    <ul class="list-unstyled">
                        @foreach($cities as $city)
                            <li><a href="{{url('search?city=')}}{{str_replace(' ', '+', $city->name)}}">{{$city->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h4 class="footer-title">CONTACT US</h4>
                    <span class="title-border"></span>
                    <div class="media">
                        <div class="media-left">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <p>{{$setting->address}}</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <p>{{$setting->contact}}</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <p>{{$setting->mail_username}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-md-12 col-sm-12">
                <div class="job-right">
                    <p>{{$setting->copy_right}}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-109877738-1', 'auto');
        ga('send', 'pageview');
    </script>
</div>
<!--job-footer end-->
<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/dropdown-hover/bootstrap-dropdownhover.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/form-validate/js/form-validate.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/chosen-js/chosen.jquery.js')}}"></script>
<script src='{{ asset('user/js/app.js') }}'></script>
@yield('script')
</body>
</html>
