@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Floor Plan</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Floor Plan</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
        @foreach($floorPlan as $fp) 
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="image-box text-center">
                        <figure>
                        <embed class="embed-responsive-item" src="{{ asset('public/uploads/floor-plan-image/'.$fp->floor_plan_image) }}">

                        </figure>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
    <!--single-speaker Style-->

@stop


