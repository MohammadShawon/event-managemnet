@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Exhibitors</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Exhibitor</li>
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
                            <img src="{{ asset('public/uploads/exibitiors-logo/'.$singleExhts->logo) }}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <h3>{{$singleExhts->company_name}}</h3>
                        <span>{{$singleExhts->email}}</span><br/>
                        <span>{{$singleExhts->mobile}}</span><br/>
                        <span><!-- <a href="{!! url($singleExhts->website) !!}"> -->{{$singleExhts->website}}<!-- </a> --></span>
                        <div class="content-text">
                            <p>{{$singleExhts->address}}</p>
                        </div>
                        <!--<ul class="social-links">-->
                        <!--    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                        <!--    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
                        <!--    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
                        <!--    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>-->
                        <!--</ul>-->
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


