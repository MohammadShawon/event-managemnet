@extends('front-end.layouts.master')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <style type="text/css">
     body,html{
    height: 100%;
  }

  /*for check box=======================*/
  .forcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.forcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmarkche {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.forcheck:hover input ~ .checkmarkche {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.forcheck input:checked ~ .checkmarkche {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmarkche:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.forcheck input:checked ~ .checkmarkche:after {
    display: block;
}

/* Style the checkmark/indicator */
.forcheck .checkmarkche:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
/*end chekboxstyle===========================*/

  .forradio {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.forradio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.forradio:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.forradio input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.forradio input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.forradio .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
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
      height: 80%;
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
                  <li class="dropdown open">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Event <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                      <li class="@if(Request::segment(2)=='front-user-register-not-attendance') active @endif"><a href="{{URL::to('front/front-user-register-not-attendance')}}">Not attended</a></li>
                      <li class="@if(Request::segment(2)=='front-user-register-attendance') active @endif"><a href="{{URL::to('front/front-user-register-attendance')}}">Attended</a></li>
                      <li class="@if(Request::segment(2)=='front-user-upqansw') active @endif"><a href="{{URL::to('front/front-user-upqansw')}}">Update Questions</a></li>
                    </ul>
                  </li>

                  <!-- My seminer -->
                  <li class="dropdown open">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Seminar <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                      <li class="@if(Request::segment(2)=='front-user-upsmnr') active @endif"><a href="{{URL::to('front/front-user-upsmnr')}}">My Seminar</a></li>
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
          <div class="col-md-10 col-sm-12 col-xs-12" style="paddin-bottom: 45%;">
            <div class="main" style="position: relative; width: calc(100% - 00px)">
                @include('layouts.flash')
                <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/front-user-post-upqansw')}}" method="post">
                    <h1 style="color: #ff1a1a; text-align: center; margin-top: 3%;">Please answer all the questions</h1>
                <!--<div class="col-md-4 col-sm-8 col-xs-12">-->

                            <div style="margin-top: 3%;">
                             <?php $qlsl = 1; ?>
                                @foreach($questionsList as $ql)
                                	@if($ql->multiple_answer==1)

			                            <div class="col-md-4">
		                                    <div style="margin-top: 10%;">
		                                    <h4>{{$ql->questions}}</h4><br>
		                                    @foreach($ql->answers_of_question as $ans)
		                                    <label class="forcheck">{{$ans->answer}}
		                                      <input type="checkbox" name="answer{{$ql->id}}[]" value="{{$ans->question_id.','.$ans->id}}" style="font-size: 10px;" @foreach($alreadyAnsweredQuestion as $alaq)
												                    <?php $multiAns = explode(',',$alaq->answer_id);  ?>

		                                      @if($alaq->question_id==$ql->id && in_array($ans->id, $multiAns)) {{'checked'}} @endif @endforeach>
		                                      <span class="checkmarkche"></span>
		                                    </label>
		                                    @endforeach
		                                    </div>
	                                	</div>
                                	@else
		                                <div class="col-md-4">
		                                    <div style="margin-top: 10%;">
		                                    <h4>{{$ql->questions}}</h4><br>
		                                    @foreach($ql->answers_of_question as $ans)
		                                    <label class="forradio" style="font-size: 14px;" >{{$ans->answer}}
		                                      <input type="radio" name="answer{{$ql->id}}" value="{{$ans->question_id.','.$ans->id}}"  @foreach($alreadyAnsweredQuestion as $alaq) @if($alaq->question_id==$ql->id && $alaq->answer_id==$ans->id) {{'checked'}} @endif @endforeach>
		                                      <span class="checkmark"></span>
		                                    </label>
		                                    @endforeach
		                                    </div>
		                                </div>
                                	@endif
                                <?php $qlsl++; ?>
                                @endforeach
                            </div>


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--</div>-->
                <div class="col-md-10">
                    <div class="link-btn text-center" style="margin-bottom: 2%; margin-top: 2%;">
                        <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
  </div>

</section>

@section('script')
<script type="text/javascript">
  function htmlbodyHeightUpdate(){

  };
</script>

@endsection

@stop