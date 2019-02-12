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
                <h1>Visitors</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Visitors</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Our  <span>Visitros</span></h2>
                <p></p>
            </div>
            <div class="row">
                 
                <div class="col-md-2 col-sm-12 col-xs-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                   
                    <ul class="visitor">
                        <li>University Professors</li>
                        <li>Veterinarian</li>
                        <li>Nutritionist</li>
						<li>Consultant</li>
						<li>Researcher</li>
                        <li>Company Owner</li>
                        <li>Business Entrepreneur</li>
                    </ul>
                </div>
                    
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <ul class="visitor">
						<li>Factory Manager</li>
                        <li>Hatchery Manager</li>
						<li>Purchase Manager</li>
						<li>Lab Manager etc</li>
						<li>Journalist</li>
                        <li>Students</li>
                        <li>Marketing Person</li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12"></div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


