@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Speakers</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Speakers</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--speaking-section-->
    <!--<section class="speaking-section ">-->
        <section class="news-section style-two" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Who <span>Speaking?</span></h3>
            @foreach($speakerCategory as $sc)
                    <h3 style="color: #ff4d4d;">{{$sc->speaker_type}}</h3>
                <div class="row">
                @foreach($speakersInfo as $spki)
                    @if($spki->speaker_type_id==$sc->id)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="image-holder">
                            <div class="image-box">
                                <figure>
                                    <img src="{!! asset('public/uploads/speaker-profile-image/'.$spki->profile_image) !!}" alt="" style="height: 270px;">
                                </figure>
                                <!--<ul class="overly-box">-->
                                <!--    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
                                <!--    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                                <!--    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
                                <!--    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>-->
                                <!--</ul>                                                      -->
                            </div>
                            <div class="image-content" style="min-height: 120px;"> 
                                <a href="{{URL::to('speaker-details/front-speaker-details/'.$spki->id)}}" target="_blank"><h5>{{$spki->name}}</h5></a>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
                </div>
            @endforeach
            </div>                
        </div>
    </section>
    <!--speaking-section-->

@stop