@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Visitor Login</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Visitor Login</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->

    <!--news-section Style-->
     <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            @include('layouts.flash')
            <div class="section-title text-center">
                <h3>Visitor <span>Login</span></h3>
                <p>Get access your dashboard</p>
            </div>
            <div class="default-form-area style-three">
                
                                                    <form class="form" role="form" method="post" action="{{URL::to('front/login')}}"  id="login-nav">
                                                        <div class="form-group">
                                                           <label class="sr-only" for="emailInput">Email address</label>
                                                           <input type="text" class="form-control" id="emailInput" name="email" placeholder="Email address" value="{{old('email')}}" required style="border-radius:0px;">
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
                                                  
                                            <div class="text-center" style="color: red;">@if(Session::has('error')) {{Session::get('error')}} @endif</div>
                                            <div><a href="{{URL::to('front/forget-password')}}" class="pull-right" style="padding-right: 0px; color: blue;" onmouseover="this.style.backgroundColor = ''";>Forgot <u style="padding-top: 10px;">password?</u></a>
                                            </div>
            </div>
        </div>
    </section>
    <!--End news-section Style-->
@stop