@extends('front-end.layouts.master')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  <style type="text/css">
     body,html{
    height: 100%;
  }
  
  .default-form input[type="text"], .default-form input[type="email"], .default-form input[type="password"], .default-form input[type="number"], .default-form select, .default-form textarea{
                height: 35px !important;
            }

            .bootstrap-select>.dropdown-toggle{
                height: 35px !important;
            }

            .bootstrap-select.btn-group .dropdown-menu li a{
                padding: 5px 10px  !important;
            }

            .bootstrap-select>.dropdown-toggle:after{
                height: 25px !important;
            }
            .contact-section{
                padding-top: 20px !important;
                padding-bottom: 10px !important;
            }

  /* remove outer padding */
  .main .row{
    padding: 0px;
    margin: 0px;
  }

  /*Remove rounded coners*/

  nav.sidebar.navbar {
    border-radius: 0px;
    border:1px #e5e5e5 solid;
  }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  /* Add gap to nav and right windows.*/
  .main{
    padding: 10px 10px 0 10px;
  }

  /* .....NavBar: Icon only with coloring/layout.....*/

  /*small/medium side display*/
  @media (min-width: 768px) {

    /*Allow main to be next to Nav*/
    .main{
      position: absolute;
      width: calc(100% - 40px); /*keeps 100% minus nav size*/
      margin-left: 40px;
      float: right;
    }

    /*lets nav bar to be showed on mouseover*/
    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    /*Center Brand*/
    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;

    }
    /*Center Brand*/
    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
      height: 15% !important;
    }

    /*Center Icons*/
    nav.sidebar a{
      padding-right: 13px;
    }

    /*adds border top to first nav box */
    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    /*adds border to bottom nav boxes*/
    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }

    /* Colors/style dropdown box*/
    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      //background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    /*allows nav box to use 100% width*/
    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    /*colors dropdown box text */
    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }

    /*gives sidebar width/height*/
    nav.sidebar{
      /*width: 200px;*/
      height: 60%;
      margin-left: -160px;
      float: left;
      z-index: 8000;
      margin-bottom: 0px;
    }

    /*give sidebar 100% width;*/
    nav.sidebar li {
      width: 100%;
    }

    /* Move nav to full on mouse over*/
    nav.sidebar:hover{
      margin-left: 0px;
    }
    /*for hiden things when navbar hidden*/
    .forAnimate{
      opacity: 0;
    }
  }

  .navbar-inverse .navbar-nav>li>a:focus, .navbar-inverse .navbar-nav>li>a:hover{
    color: #e6296a !important;
  }

  /* .....NavBar: Fully showing nav bar..... */

  @media (min-width: 1330px) {

    /*Allow main to be next to Nav*/
    .main{
      width: calc(100% - 200px); /*keeps 100% minus nav size*/
      margin-left: 50px;
    }

    /*Show all nav*/
    nav.sidebar{
      margin-left: 0px;
      float: left;
    }
    /*Show hidden items on nav*/
    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }
  
  .navbar-inverse .navbar-nav>li>a:focus, .navbar-inverse .navbar-nav>li>a:hover{
    color: #e6296a !important;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }

  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{
    background-color: #d1d1e0 !important;
    color: #fff !important;
  }

  </style>
@section('content')

<!--Page Title-->
    <!-- <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
        @include('layouts.flash')
            <div class="title-text">
                <h1>Become Sponsor</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Become sponsor</li>
                </ul>
            </div>           
        </div>
    </section> -->
    <!--End Page Title-->

<section class="contact-section" style="padding-top: 0px; margin-top: 0px; border-top: 1px #f0f0f5 solid;">
  <div class="container">
      
    <div class="row">
        <div class="col-md-2 col-sm-12 col-xs-12">
            <nav class="navbar navbar-inverse sidebar" role="navigation" style="background-color: transparent;">
              <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                  <span class="sr-only"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                  <span>{{Auth::guard('frontuser')->user()->first_name}}</span>
                  <span>{{Auth::guard('frontuser')->user()->last_name}}</span>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  
                  <!-- <li class="@if(Request::segment(2)=='front-user-dashboard') active @endif"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li> -->

                  <li class="@if(Request::segment(2)=='front-user-dashboard') active @endif"><a href="{{URL::to('front/front-user-dashboard')}}">My Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                  
                  <!-- my event -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Event <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                      <li class="@if(Request::segment(2)=='front-user-register-not-attendance') active @endif"><a href="{{URL::to('front/front-user-register-not-attendance')}}">Not attended</a></li>
                      <li class="@if(Request::segment(2)=='front-user-register-attendance') active @endif"><a href="{{URL::to('front/front-user-register-attendance')}}">Attended</a></li>
                      <li class="@if(Request::segment(2)=='front-user-upqansw') active @endif"><a href="{{URL::to('front/front-user-upqansw')}}">Update Questions</a></li>
                    </ul>
                  </li>
                  
                  <!-- My seminer -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Seminar <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                      <li class="@if(Request::segment(2)=='front-user-seminer-not-attendance') active @endif"><a href="{{URL::to('front/front-user-seminer-not-attendance')}}">Not attended</a></li>
                      <li class="@if(Request::segment(2)=='front-user-seminer-attendance') active @endif"><a href="{{URL::to('front/front-user-seminer-attendance')}}">Attended</a></li>
                    </ul>
                  </li>
                  
                  <!-- settings =============-->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                      <li class="@if(Request::segment(2)=='fucpself') active @endif"><a href="{{URL::to('front/fucpself')}}">Change Password</a></li>
                      <li class="@if(Request::segment(2)=='fuppc') active @endif"><a href="{{URL::to('front/fuppc')}}">Profile Picture</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
          </nav>
        </div>

          <!-- Content Here =========================================-->
          <div class="col-md-10 col-sm-12 col-xs-12">
            <!--<div class="main" style="margin-left:10px;">-->
                <!--news-section Style-->
                @include('layouts.flash')
                <h3 class="text-center" style="color: #ff6666; padding-top:15px;">Edit Profile</h3>
        <section class="contact-section" style="padding-top: 20px !important;">
            <div class="container">
            
            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/post-front-edit-profile')}}" method="post">
                <!--<div class="row">-->
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="contact-area-left">
                            <div class="form-group hidden">
                                <select class="text-capitalize selectpicker form-control required" name="event_id" data-width="100%">
                                    <option value="{{$activeEvent->id}}">{{$activeEvent->title}}</option>
                                </select>
                            </div>
                            <div class="form-group hidden">
                                <select class="text-capitalize selectpicker form-control required" name="visitor_type" id="visitor_type" data-style="g-select" data-width="100%">
                                    <option value="">Registration Type</option>
                                    @foreach($visitoTypes as $vt)
                                    <option value="{{$vt->id}}">{{$vt->registration_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="name_prefix" data-style="g-select" data-width="100%">
                                    <option value="">Name Prefix</option>
                                    @foreach($namePrefix as $np)
                                    <option value="{{$np->id}}" @if($userInfoData->name_prefix==$np->id) {{'selected'}} @endif>{{$np->name_prefix}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="First Name" required="" value="{{$userInfoData->first_name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" placeholder="Last Name" value="{{$userInfoData->last_name}}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email" required="" value="{{$userInfoData->email}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" placeholder="Your Telephone" value="{{$userInfoData->telephone}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control selectpicker" name="country" id="country" data-live-search="true"; data-size="8">
                                    <option value="">Your Country</option>
                                    @foreach($countries as $ctry)
                                        <option value="{{$ctry->id}}" mobilecode="{{$ctry->phonecode}}" @if($userInfoData->country==$ctry->id) {{'selected'}} @endif>{{$ctry->nicename}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="contact-area-right">
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Your Mobile" required="" value="{{$userInfoData->mobile}}" id="mobile">
                            </div>
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="Your Company Name" value="{{$userInfoData->company_name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title" placeholder="Your Job Title" value="{{$userInfoData->job_title}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="post_code" placeholder="Your Postal Code" value="{{$userInfoData->post_code}}">
                            </div>                                        
                            <div class="form-group">
                                <div class="form-group">
                                <textarea type="textarea" name="address" placeholder="your address" style="height: 90px !important; ">{{$userInfoData->address}}</textarea>
                            </div>  
                        </div>                                      
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="link-btn text-right" style="margin-bottom: 1%; margin-top: 1%;">
                    <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Update</button>
                </div>
                    
                </div>
                
            <!--</div>-->
                
                

            </form>


                      </div>
                  </section>
                  <!--End news-section Style-->
            <!--</div>-->
        </div>
      </div>
  </div>

</section>

<script src="{!! asset('public/frontend/js/jquery.js')!!}"></script>
@section('script')
<script type="text/javascript">
  function htmlbodyHeightUpdate(){
    
  };
  
  $(document).ready(function(){
      $("#country").on('change',function(){ 
            var mobileCode = $('option:selected', this).attr('mobilecode'); 
            if(mobileCode==''){
                $("#mobile").val(''); 
            }else{
                $("#mobile").val(mobileCode);
            }
        });
  });
</script>

@endsection

@stop