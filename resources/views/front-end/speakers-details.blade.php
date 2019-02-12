@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>speaker's Detail</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>{{$speakerInfoDetails->name}}</li>
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
                            <img src="{{ asset('public/uploads/speaker-profile-image/'.$speakerInfoDetails->profile_image) }}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <p style="line-height: .0em; color: #e6296a;">{{$speakerInfoDetails->speaker_name->speaker_type}}</p>
                        <h3>{{$speakerInfoDetails->name}}</h3>
                        <span>{{$speakerInfoDetails->title}}</span>
                        <div class="content-text">
                            <p>{{$speakerInfoDetails->company}}</p><br>
                            <p><?php echo $speakerInfoDetails->description; ?></p>
                        </div>
                        
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


