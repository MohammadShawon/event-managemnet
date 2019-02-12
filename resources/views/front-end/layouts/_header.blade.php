<?php
    //$siteInfo = \App\Settings::all();
?>
<style>
.main-header .main-menu {
    margin-right: 150px;
}
@media only screen and (max-width: 770px) { 
    .fixed-header {
    position: inherit;
}
}

	
</style>

<!--Main Header-->
    <header class="main-header sticky-header">
        <div class="container clearfix">
            <div class="header-area">
                <div class="logo" style="padding: 5px 0px 5px;">
                    <figure>
                        <!-- <a href="index-2.html"><img src="{!! asset('public/frontend/images/logo.png') !!}" alt=""></a> -->
                        <a href="{{URL::to('/')}}"><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" alt="" style="width: 145px;"></a>
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
                            @if(!empty($globalparameterArr['menuArr']))
                                @foreach($globalparameterArr['menuArr'] as $hdmno)
                                    <li class="@if(count($hdmno->submenu)>0)dropdown @endif @if($hdmno->url=='hc' && Request::segment(1)==''){{'current'}}@endif @if(Request::segment(1)==$hdmno->url){{'current'}}@endif"><a href="@if($hdmno->order_id==1){{URL::to('/')}}@else{{URL::to($hdmno->url)}}@endif">{{$hdmno->name}}</a>
                                        @if(count($hdmno->submenu)>0 && $hdmno->id!=8)
                                            <ul>
                                                @foreach($hdmno->submenu as $subMenuItem)
                                                    @if($subMenuItem->status_id==1)
                                                    <li><a href="{{URL::to($subMenuItem->url)}}">{{ $subMenuItem->name }}</a></li>
                                                    @endif
                                                    
                                                @endforeach
                                    
                                    <!--for big pdf  -->
                                        @if($hdmno->id==5)
                                            <li><a href="{{ asset('public/uploads/executive-committe/proceedings-of-the-technical-seminar.pdf') }}" target="_blank">{{ 'Technical Proceedings' }}</a></li>
                                        @endif
                                            </ul>
                                        @endif
                                        
                                        
                                        
                                        <!-- for gallery -->
                                        @if($hdmno->id==8)
                                        <?php
                                            $allEvents = \App\EventManagement::select('title','id')->whereNotNull('id')->orderBy('title', 'desc')->get();
                                            //echo "<pre>"; print_r($allEvents);
                                        ?>
                                            @if(count($allEvents)>0)
                                            <ul>
                                                @foreach($allEvents as $ale)
                                                    <li><a href="{{URL::to('gallery/front-gallery/'.$ale->id)}}">{{ $ale->title }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        @endif
                                    </li>
                                    
                                @endforeach
                            @endif
                        <!-- logingMenu -->
                            
<?php $profile_pic = ''; ?>
                                <li class="dropdown">
                                    
                                      <a class="bdropdown-toggle desktop_login" data-toggle="dropdown" style="">
                                      @if(empty(Auth::guard('frontuser')->user()))
                                        Login
                                      @else
                                        <!--{{Auth::guard('frontuser')->user()->first_name}}-->
                                        <?php 
  $profile_pic = \App\FrontUserProfilePicCng::where("user_id",'=',Auth::guard('frontuser')->user()->id)->value('picture_name');
  
  if(empty($profile_pic)){
    $profile_pic = 'profile-pic.png';
  }
?>
                                        <img src="{!! asset('public/uploads/front-user-profile-pic/'.$profile_pic) !!}" style="max-width: 45px; max-height: 45px; border-radius: 50%; ">
                                      @endif
                                      </a>
                                      <ul style="background: #ffffff; padding: 10px; margin-top: -20px; border: solid 1px #eee;
    box-shadow: 0px 0px 2px #999;">
                                        
                                      @if(empty(Auth::guard('frontuser')->user()))
                                        <li>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <form class="form" role="form" method="post" action="{{URL::to('front/login')}}"  id="login-nav">
                                                        <div class="form-group">
                                                           <label class="sr-only" for="emailInput">Email address</label>
                                                           <input type="text" class="form-control" id="emailInput" name="email" placeholder="User ID" value="{{old('email')}}" required style="border-radius:0px;">
                                                        </div>
                                                        <div class="form-group">
                                                           <label class="sr-only" for="passwordInput">Password</label>
                                                           <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required style="border-radius:0px;">
                                                        </div>
                                                        <!-- <div class="checkbox">
                                                           <label>
                                                           <input type="checkbox"> Remember me
                                                           </label>
                                                        </div> -->
                                                        <div class="form-group">
                                                           <button type="submit" class="btn btn-success btn-block" style="border-radius: 0px;">Sign in</button>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                     </form>
                                                  </div>
                                               </div>

                                            </li>
                                            <li class="text-center" style="color: red;">@if(Session::has('error')) {{Session::get('error')}} @endif</li>
                                            <li><a href="{{URL::to('front/forget-password')}}" class="" style="width: 100%; text-align: center;">Forgot <u>password?</u></a>
                                            </li>
                                          @endif

                                          @if(!empty(Auth::guard('frontuser')->user()))
                                          <li>
                                            <li class="text-center"><a href="{{URL::to('front/front-user-dashboard')}}" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = 'white'";>My Profile</a></li>
                                            
                                            <li class="text-center"><a href="{{URL::to('front/front-user-edit-profile')}}" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = 'white'";>Edit Profile</a></li>

                                            <li class="text-center">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = '#fff'";>
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{URL::to('front/logout')}}" method="post" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                              </li>
                                            </li>
                                          @endif
                                  
                                        
                                      </ul>
                                    
                                </li>
                            
                        

                        </ul>
                    </div>                    
                </nav>
             @if(empty(Auth::guard('frontuser')->user()))
                <div class="link-btn">
                    <a href="{{URL::to('front/user-registration')}}" class="btn-style-one" title="Click Here">Pre Registration</a>
                </div>
            @endif
            </div>
        </div>
    </header>
    <!--End Main Header -->