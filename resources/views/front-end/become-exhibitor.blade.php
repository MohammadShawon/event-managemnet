@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
        @include('layouts.flash')
            <div class="title-text">
                <h1>Become Exhibitor</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Become exhibitor</li>
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
                <p>Contact us to Become A Exhibitor.</p>
            </div>
            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('exhibitor/post-become-exhibitor')}}" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-left">
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="booth_type" data-style="g-select" data-width="100%">
                                    <option value="">Booth Type</option>
                                    @foreach($boothTypes as $bts)
                                    <option value="{{$bts->id}}">{{$bts->booth_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="name_prefix" data-style="g-select" data-width="100%">
                                    <option value="">Name Prefix</option>
                                    @foreach($namePrefix as $np)
                                    <option value="{{$np->id}}">{{$np->name_prefix}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="First Name" required="" value="{{old('first_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email" required="" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" placeholder="Your Telephone" value="{{old('telephone')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Your Mobile" required="" value="{{old('mobile')}}">
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-right">
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="Your Company Name" required="" value="{{old('company_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title" placeholder="Your Job Title" value="{{old('job_title')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" placeholder="Your Country" value="{{old('country')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="postcode" placeholder="Your Postal Code" value="{{old('postcode')}}">
                            </div>                                        
                            <div class="form-group">
                                <div class="form-group">
                                <textarea type="textarea" name="address" placeholder="your message" required="" style="height: 115px !important; " required="">{{old('address')}}</textarea>
                            </div>  
                        </div>                                      
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group top-padd">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="link-btn text-center" style="margin-bottom: 1%; margin-top: 0%;">
                    <button class="btn-style-two" type="submit" data-loading-text="Please wait...">send message</button>
                </div>                                        
            </form>
        </div>
    </section>
    <!--End news-section Style-->

@stop
<!--End pagewrapper-->
