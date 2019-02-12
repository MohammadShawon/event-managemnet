@extends('front-end.layouts.master')

@section('content')
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Our gallery</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Our gallery</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--gellary-section-->
     <section class="gallery-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event Gallery<span> {{$eventName}}</span></h3>
                <p></p>
            </div>
            <div class="row inner-container">
                @foreach($gallerImages as $glmg)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="img_holder">
                            <img src="{{ asset('public/frontend/images/event-image-gallery/'.$glmg->event_image_name) }}" alt="images" class="img-responsive">
                        </div>
                        <div class="overlay-box text-center">                       
                            <a href="{{ asset('public/frontend/images/event-image-gallery-resize/'.$glmg->event_image_name) }}" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                        </div> 
                    </div>                                           
                </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <!--End gellary-section-->

@stop