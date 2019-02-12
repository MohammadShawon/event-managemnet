@extends('front-end.layouts.master')

    @section('style')
        <style type="text/css">
            .default-form input[type="text"], .default-form input[type="email"], .default-form input[type="password"], .default-form input[type="number"], .default-form select, .default-form textarea{
                height: 40px;
            }

            .bootstrap-select>.dropdown-toggle{
                height: 40px;
            }

            .bootstrap-select.btn-group .dropdown-menu li a{
                padding: 5px 10px;
            }

            .bootstrap-select>.dropdown-toggle:after{
                height: 30px;
            }
            .contact-section{
                padding-top: 20px;
                padding-bottom: 10px;
            }
        </style>
    @endsection

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
        
            <div class="title-text">
                <h1>Edit profile</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Edit profile</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->

    <!--news-section Style-->
    <section class="contact-section">
        <div class="container">
            @include('layouts.flash')
            

        <div id="hideForm" style="margin-top: 3%;">
            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/post-front-edit-profile')}}" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-left">
                            <div class="form-group hidden">
                                <select class="text-capitalize selectpicker form-control required" name="event_id" data-width="100%">
                                    <option value="{{$activeEvent->id}}">{{$activeEvent->title}}</option>
                                </select>
                            </div>
                            <div class="form-group hidden">
                                <select class="text-capitalize selectpicker form-control required" name="visitor_type" id="visitor_type" data-style="g-select" data-width="100%">
                                    <option value="">Registration Type</option>
                                    @foreach($visitoTypes as $vt)
                                    <option value="{{$vt->id}}">{{$vt->registration_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="name_prefix" data-style="g-select" data-width="100%">
                                    <option value="">Name Prefix</option>
                                    @foreach($namePrefix as $np)
                                    <option value="{{$np->id}}" @if($userInfoData->name_prefix==$np->id) {{'selected'}} @endif>{{$np->name_prefix}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="First Name" required="" value="{{$userInfoData->first_name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" placeholder="Last Name" value="{{$userInfoData->last_name}}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email" required="" value="{{$userInfoData->email}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" placeholder="Your Telephone" value="{{$userInfoData->telephone}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control selectpicker" name="country" id="country" data-live-search="true"; data-size="8">
                                    <option value="">Your Country</option>
                                    @foreach($countries as $ctry)
                                        <option value="{{$ctry->id}}" mobilecode="{{$ctry->phonecode}}" @if($userInfoData->country==$ctry->id) {{'selected'}} @endif>{{$ctry->nicename}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-right">
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Your Mobile" required="" value="{{$userInfoData->mobile}}" id="mobile">
                            </div>
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="Your Company Name" value="{{$userInfoData->company_name}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title" placeholder="Your Job Title" value="{{$userInfoData->job_title}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="postcode" placeholder="Your Postal Code" value="{{$userInfoData->post_code}}">
                            </div>                                        
                            <div class="form-group">
                                <div class="form-group">
                                <textarea type="textarea" name="address" placeholder="your address" style="height: 90px !important; ">{{$userInfoData->address}}</textarea>
                            </div>  
                        </div>                                      
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group top-padd">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                        </div>
                    </div>
                </div>
                
            </div>
                
                <div class="link-btn text-center" style="margin-bottom: 2%; margin-top: 1%;">
                    <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Update</button>
                </div>

            </form>
        </div> <!-- end hideFormdiv -->

        </div>
    </section>
    <?php
        
        //$namePreObjToArray = $namePrefix->toArray();
        
        $options = '';
        foreach($namePrefix as $npt){
            $options .= '<option value="'.$npt->id.'">'.$npt->name_prefix.'</option>';
        }
        
    ?>
    <!--End news-section Style-->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            
            $("#country").on('change',function(){ 
                var mobileCode = $('option:selected', this).attr('mobilecode'); 
                if(mobileCode==''){
                    $("#mobile").val(''); 
                }else{
                    $("#mobile").val(mobileCode);
                }
            });

        })
    </script>
@sectionend

@stop
<!--End pagewrapper-->
