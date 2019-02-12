@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>contact us</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>contact us</li>
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
                <h3>Get In <span>Touch</span></h3>
                <p>Contact us to get your answer.</p>
            </div>
            <div class="default-form-area style-three">
                <form id="" name="contact_form" class="default-form" action="{{url('contact-us/contact-us-post')}}" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="con_per_name" placeholder="Your Name" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="con_per_email" placeholder="Enter Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="con_per_phone" placeholder="Phone Number" required="">
                            </div>                              
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Subject" required="">
                            </div>
                            <div class="form-group">
                                <textarea type="textarea" name="con_per_message" placeholder="your message" required="" style="height: 123px !important; "></textarea>
                            </div>                                    
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group text-center">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                <button class="btn-style-one" type="submit" data-loading-text="Please wait...">send</button>
                            </div>                                    
                        </div>
                    </div>                                        
                </form>
            </div>
        </div>
    </section>
    <!--End news-section Style-->


    <!--Start Google map area-->
    <section class="google-map-area">
        <div class="container-fullwidth">
            <div 
                class="google-map"
                id="contact-google-map" 
                data-map-lat="{{$activeEvent->lat}}" 
                data-map-lng="{{$activeEvent->lng}}" 
                data-icon-path="{{ asset('public/frontend/images/resource/map-marker.png') }}" 
                data-map-title="AQUA AND PET ANIMAL" 
                data-map-zoom="12"
                data-markers='{
                    "marker-1": [{{$activeEvent->lat}}, {{$activeEvent->lng}}, "<h4>{{$activeEvent->title}}</h4><p>{{$activeEvent->venue}}</p>","{{ asset('public/frontend/images/resource/map-marker.png') }}"]
                }'>

            </div>                    
        </div>               
    </section>
    <!--End Google map area--> 
<?php
    $siteInfo = \App\Settings::first();
?>
    <!-- map-content section -->
    <section class="map-content">
        <div class="container">
            <div class="content-text">
                <h4>Venue</h4>
                <p>Largest Event Ever.</p>
                <h5>{{$activeEvent->title}}</h5>
                <div class="contact-link">
                    <div class="item">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <h6>{{$activeEvent->venue}}</h6>
                    </div>
                    <div class="item">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h6>{{'8801713454425'}}</h6>
                    </div>
                    <div class="link-btn">
                        <a href="{{URL::to('front/user-registration')}}" class="btn-style-two">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End map-content section -->

@stop
<!--End pagewrapper-->
