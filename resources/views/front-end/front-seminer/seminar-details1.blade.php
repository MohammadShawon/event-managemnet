@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Seminar</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Seminar</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="single-speaker">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="image-box">
                        <figure>
                            <img src="{!! asset('public/uploads/seminar-feature-image/'.$seminarInfoDetails->feature_image) !!}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <h4>Siminar Time: <span style="color: #ff3333; font-size: 16px !important;"> {{date('d F Y,h:i A',strtotime($seminarInfoDetails->start_date))}} To {{date('d F Y,h:i A',strtotime($seminarInfoDetails->end_date))}}</span></h4>
                        
                        <div class="content-text">
                            <h4 style="padding: 7px;">About Seminar:</h4>
                            <p><?php echo $seminarInfoDetails->description; ?></p>
                        </div>
                        
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


