@extends('front-end.layouts.master')

@section('style')
    <style>
        .visitor li{ list-style: square !important;}
    </style>
    
@endsection

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Exhibitor Profile</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Exhibitor Profile</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <!--<section class="single-speaker">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--                <div class="image-box">-->
    <!--                    <figure>-->
    <!--                        <img src="{{ asset('public/uploads/event-feature-image/'.$activeEvent->feature_image) }}" alt="" style="max-width: 370px; max-height: 410px;">-->
    <!--                    </figure>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--                <div class="right-side">-->
    <!--                    <h3>{{$activeEvent->title}}</h3><br/>-->
    <!--                    <span><b>Event Organizar:</b> {{$activeEvent->organizar_website}}</span><br/><br/>-->
    <!--                    <span><b>Approved By:</b> {{$activeEvent->approved_by_website}}</span><br/><br/>-->
    <!--                    <span><b>Event Manager:</b> {{$activeEvent->event_manager_website}}</span>-->
    <!--                </div>                        -->
    <!--            </div>-->
    <!--            <div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--                <div class="right-side text-right">-->
    <!--                    <h3></h3><br/><br/>-->
    <!--                    <p>-->
    <!--                        <span><b>Organizar Logo:</b> <img src="{!! asset('public/uploads/event-organizar-logo/'.$activeEvent->organizar_logo) !!}" alt="...." width="50%" height="65px"></span>-->
    <!--                    </p>-->
    <!--                    <p>-->
    <!--                        <span><b>Approved By Logo:</b> <img src="{!! asset('public/uploads/event-approved-by-logo/'.$activeEvent->approved_by_logo) !!}" alt="...." width="50%" height="65px"></span>-->
    <!--                    </p>-->
    <!--                    <p>-->
    <!--                        <span><b>Event Manager Logo:</b> <img src="{!! asset('public/uploads/event-manager-logo/'.$activeEvent->event_manager_logo) !!}" alt="...." width="50%" height="65px"></span>-->
    <!--                    </p>-->
                        
    <!--                </div>                        -->
    <!--            </div>-->
    <!--        </div>-->
            
    <!--    </div>-->
    <!--</section>-->
    <!--single-speaker Style-->
    
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Exhibitor <span>Profile</span></h2>
                <p></p>
            </div>
            <div class="row">
                 
                <div class="col-md-6 col-sm-12 col-xs-12">
                   
                    <ul class="visitor">
                        <li>Animal Health Care Products Trading Company</li>
                        <li>Veterinary Pharmaceuticals Company</li>
                        <li>Commodities Trading Company</li>
                        <li>Insurance</li>
                        <li>Research Institutes</li>
                        <li>Universities</li>
                        <li>Consultancy Farm</li>
                        <li>Food Processing Company</li>
                        <li>Directory</li>
                        <li>Breeding & Genetics</li>
                        <li>Bio Security & Bio Safety</li>
                        <li>Quality & Safety of Food etc</li>
                    </ul>
                </div>
                    
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <ul class="visitor">
                        <li>Dairy Farm</li>
                        <li>Fish Farm</li>
                        <li>Beef Fattening Farm</li>
                        <li>Milk Processing Company</li>
                        <li>Bank</li>
                        <li>Limestone, DCP, MCP, Lysine, Methionine Trading Company</li>
                        <li>Vaccine Marketing Company</li>
                        <li>Diagnostic Lab Instruments Marketing Company</li>
                       <li>Farm Equipment Trading Company; Feed Mill</li>
                        <li>Veterinary Clinic</li>
                       <li>NGO</li>
                        <li>Association</li>
                        <li>Magazine</li>
                        
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


