@extends('front-end.layouts.master')

@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Message details</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Message details</li>
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
                            <img src="{{ asset('public/uploads/messager-profile-pic-and-signature/'.$messageDetails->profile_pic) }}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right-side">
                        {{--<p style="line-height: .0em; color: #e6296a;">{{$messageDetails->speaker_name->speaker_type}}</p>--}}
                        <h3>{{$messageDetails->name}}</h3>
                        <span>{{$messageDetails->title}}</span>
                        <div class="content-text">
                            <p>{{$messageDetails->company}}</p><br>
                            <p><?php echo $messageDetails->message; ?></p>
                            <figure>
                                <img src="{{ asset('public/uploads/messager-profile-pic-and-signature/'.$messageDetails->signature) }}" alt="">
                            </figure>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


