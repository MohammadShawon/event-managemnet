@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Forget Password</h1>
            </div>           
        </div>
    </section>
    <!--End Page Title-->

    <!--news-section Style-->
     <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            @include('layouts.flash')
            <div class="section-title text-center">
                <h3>Get In <span>Touch</span></h3>
                <p>Recover your password.</p>
            </div>
            <div class="default-form-area style-three">
                <form id="" name="contact_form" class="default-form" action="{{url('front/post-forget-password')}}" method="post">
                    <div class="row">
                        
                        <div class="col-md-3 col-sm-6 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter register email" required="" value="{{old('email')}}">
                            </div>                               
                        </div>
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group text-center">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                <button class="btn-style-one" type="submit" data-loading-text="Please wait...">Send ...</button>
                            </div>                                    
                        </div>
                    </div>                                        
                </form>
            </div>
        </div>
    </section>
    <!--End news-section Style-->

@stop
<!--End pagewrapper-->
