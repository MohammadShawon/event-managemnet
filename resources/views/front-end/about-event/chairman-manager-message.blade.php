@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Messages</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Messages</li>
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
                <h3> <span>Messages</span></h3>

                <div class="row">
                @foreach($messages as $msg)

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="image-holder">
                            <div class="image-box">
                                <figure>
                                    <img src="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$msg->profile_pic) !!}" alt="" style="height: 270px;">
                                </figure>

                            </div>
                            <div class="image-content" style="min-height: 120px;">
                                <a href="{{URL::to('event/front-message-details/'.$msg->id)}}" target="_blank"><h5>{{$msg->name}}</h5></a>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>

            </div>
        </div>
    </section>
    <!--speaking-section-->

@stop