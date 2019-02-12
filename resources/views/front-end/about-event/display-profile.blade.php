@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Profile</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Profile</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="image-box">
                        <figure>
                            <img src="{{ asset('public/uploads/event-feature-image/'.$activeEvent->feature_image) }}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <h3>{{$activeEvent->title}}</h3>
                        <span><b>Start Date:</b> {{date('F d, Y',strtotime($activeEvent->start_date))}}</span><br/>
                        <span><b>End Date:</b> {{date('F d, Y',strtotime($activeEvent->end_date))}}</span><br/>
                        <span><b>Venue:</b> {{$activeEvent->venue}}</span><br/>
                        <span><b>Registration Start:</b> {{date('F d, Y',strtotime($activeEvent->pre_reg_start_date))}}</span><br/>
                        <span><b>Registration End:</b> {{date('F d, Y',strtotime($activeEvent->pre_reg_end_date))}}</span><br/>
                        <!-- <div class="content-text">
                            <p>{{$activeEvent->description}}</p>
                        </div> -->
                        
                    </div>                        
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="right-side text-right">
                        <h3></h3><br/>
                        <p>
                            <span><b>Organizar Logo:</b> <img src="{!! asset('public/uploads/event-organizar-logo/'.$activeEvent->organizar_logo) !!}" alt="...." width="50%" height="65px"></span>
                        </p>
                        <p>
                            <span><b>Event Manager Logo:</b> <img src="{!! asset('public/uploads/event-manager-logo/'.$activeEvent->event_manager_logo) !!}" alt="...." width="50%" height="65px"></span>
                        </p>
                        <p>
                            <span><b>Approved By Logo:</b> <img src="{!! asset('public/uploads/event-approved-by-logo/'.$activeEvent->approved_by_logo) !!}" alt="...." width="50%" height="65px"></span>
                        </p>
                        
                    </div>                        
                </div>
            </div>
            <ul class="social-links text-center">
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


