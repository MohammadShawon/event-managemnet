@extends('front-end.layouts.master')

@section('content')
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>about us</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>about us</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->    


	<!--about-section-->
    <section class="about-section" style="background-image: url('{{ asset('public/frontend/images/background/1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <div class="icon-holder">
                        <div class="item text-center" style="padding: 10px 0px;">
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                            <!-- <h6>{{date('F d, Y',strtotime($activeEvent->start_date))}}</h6> -->
                            <h6>{{date('F d, Y',strtotime($activeEvent->start_date))}}<br/> To<br/> {{date('F d, Y',strtotime($activeEvent->end_date))}}</h6>
                        </div>
                        <div class="item text-center" style="padding: 10px;">
                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            <!-- <h6>{{$venue}}</h6> -->
                            <h6>{{$venue}}</h6>
                            
                        </div>
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i></a>
                            <h6>{{$userAttendance}} Audience</h6>
                        </div>
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-microphone" aria-hidden="true"></i></a>
                            <h6>{{$speakers}} Speakers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    <div class="content-text">
                        <h3>Event<br><span>{{$activeEvent->title}}</span></h3>
                        <h6>{{$activeEvent->short_description}}</h6>
                        <p>{{$activeEvent->description}}</p>
                        <div class="link-btn">
                            <a href="{{URL::to('front/user-registration')}}" class="btn-style-one">Register Now</a><!-- <a href="#" class="btn-style-two">read more</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End about-section-->

@stop

