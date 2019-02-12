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
                <h1>Registration Here</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Registration Here</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--news-section Style-->
    <section class="contact-section">
        <div class="container">
            @include('layouts.flash')
            <div class="section-title text-center">
                <h2 style="color: #ff471a;">Visitor Onlie Registration</h2>
                <h3 style=" margin-top: 1%;"><span>{{$activeEvent->title}}</span></h3>
                <h4 style="color: #ff751a;">{{$activeEvent->short_description}}</h4><br>
                <p><b>Please choose one of the following options to continue with the registration process.</b></p>
            </div>

            <!-- Chose Registeration type -->
            <div class="row">
                <div class="col-md-4 col-sm-8 col-xs-12 text-center">
                    <button class="form-control btn btn-success btn-sm" style="font-size: 14px;" id="individualButton">Individual Register</button>
                    <span>Individual Registration for those persons who are registering THEMSELVES</span>
                </div>

                <div class="col-md-4 col-sm-8 col-xs-12"></div>

                <div class="col-md-4 col-sm-8 col-xs-12 text-center">
                    <button class="form-control btn btn-success btn-sm" style="font-size: 14px;" id="groupButton">Group Register</button>
                    <span>A group registration includes minimum 5 persons</span>
                </div>
            </div>

        <div id="hideForm" style="margin-top: 3%;">
            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/post-user-registration')}}" method="post">
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
                                <select class="text-capitalize selectpicker form-control required" name="name_prefix[]" data-style="g-select" data-width="100%">
                                    {{-- <option value="">Name Prefix</option> --}}
                                    @foreach($namePrefix as $np)
                                    <option value="{{$np->id}}">{{$np->name_prefix}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="first_name[]" placeholder="First Name" required="" value="{{old('first_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name[]" placeholder="Last Name" value="{{old('last_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email[]" id="email" placeholder="Your Email" required="" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" placeholder="Your Telephone" value="{{old('telephone')}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control selectpicker" name="country" id="country" data-live-search="true"; data-size="8">
                                    <option value="">Your Country</option>
                                    @foreach($countries as $ctry)
                                        <option value="{{$ctry->id}}" mobilecode="{{$ctry->phonecode}}">{{$ctry->nicename}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-right">
                            <div class="form-group">
                            	<span>Mobile e.g. 8801xxxxxxxxx</span><br>
                                <input type="text" name="mobile[]" placeholder="Your Mobile e.g. 8801xxxxxxxxx" required="" value="{{old('mobile')}}" id="mobile">
                            </div>
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="Your Company Name" value="{{old('company_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title[]" placeholder="Your Job Title" value="{{old('job_title')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="postcode" placeholder="Your Postal Code" value="{{old('postcode')}}">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <textarea type="textarea" name="address" placeholder="your address" style="height: 65px !important; ">{{old('address')}}</textarea>
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

            <!-- append section start here ======================-->
                    <p id="errorDisplay" style="color:red"></p>

                <div class="row" id="appendNewRow">
                    <div class="col-md-6">
                        <p style="color:red;">#1</p>
                        <div class="col-md-4">
                            <span>Name Prefix  <span class="text-danger">*</span></span>
                        </div>
                        <div class="form-group col-md-8">
                            {{ Form::select('name_prefix[]',($namePrefixAppnd),null, array('class' => 'form-control input-sm name_prefix_table', 'id' => 'name_prefix_table', 'data-live-search' => 'true')) }}
                        </div>
                        <div class="col-md-4">
                            <span>First Name  <span class="text-danger">*</span></span>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="first_name[]" class="form-control input-sm first_name_table" id="first_name_table">
                        </div>
                        <div class="col-md-4">
                            <span>Last Name</span>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="last_name[]" class="form-control input-sm last_name_table" id="last_name_table">
                        </div>
                        <div class="col-md-4">
                            <span>Job Title <span class="text-danger">*</span></span></span>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="job_title[]" class="form-control input-sm job_title_table" id="job_title_table">
                        </div>
                        <div class="col-md-4">
                            <span>Email  <span class="text-danger">*</span></span>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="email" name="email[]" class="form-control input-sm email_table" id="email_table">
                        </div>
                        <div class="col-md-4">
                            <span>Mobile  <span class="text-danger">*</span></span>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="mobile[]" class="form-control input-sm mobile_table" id="mobile_table">
                        </div>

                    </div>

                    <!-- <div class="col-md-6"></div> -->
                </div>

                <div class="col-md-6" id="hideAddNewButton">
                    <div class="link-btn text-center" style="">
                    <button class="btn btn-primary" type="button" data-loading-text="Please wait..." id="addNewMamber"><i class="fa fa-address-card-o" aria-hidden="true"></i> Add Member</button>
                    </div>
                </div>
                <!-- append section end here================== -->

                <div class="link-btn" style="margin-bottom: 2%; margin-top: 1%;">
                    <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Register</button>
                </div>

            </form>
        </div> <!-- end hideFormdiv -->

        </div>
    </section>
    <?php

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

            $('#hideForm').hide();
            $('#appendNewRow').hide();
            $('#hideAddNewButton').hide();
            $(document).on('click','#individualButton',function(){
                $('#hideForm').toggle(1000);
                $('#appendNewRow').hide();
                $('#hideAddNewButton').hide();
                $('.allApendRemove').remove();
                $('#visitor_type').val(1).selectpicker('refresh');

                    $('#first_name_table').val('');
                    $('#last_name_table').val('');
                    $('#email_table').val('');
                    $('#mobile_table').val('');
                    $('#job_title_table').val('');
            });

            $(document).on('click','#groupButton',function(){
                $('#hideForm').toggle(1000);
                $('#appendNewRow').toggle(1000);
                $('#appendNewRow').show(1000);
                $('#hideAddNewButton').show();
                $('#visitor_type').val(2).selectpicker('refresh');
            });

            $('form').submit(function(e){
                var mobileMin  = $('#mobile').val();
                if(mobileMin.length<6){
                    alert('Invalid mobile number');
                    return false;
                }
            });

    var forAppnRowCount = 1;
            $(document).on('click','#addNewMamber',function(){

                var prefix_id       = $('.name_prefix_table').val();
                var prefix_name     = $('.name_prefix_table option:selected').text();
                var first_name      = $('.first_name_table').val();
                var last_name       = $('.last_name_table').val();
                var email           = $('.email_table').val();
                var mobile          = $('.mobile_table').val();
                var job_title       = $('.job_title_table').val();

                if(prefix_id =='' || first_name =='' || email =='' || mobile =='' || job_title ==''){
                    $("#errorDisplay").html('Field should not be empty <span class="text-danger">*</span>');
                    return false;
                }else{
                    $("#errorDisplay").empty();
                    forAppnRowCount++;
                }

                if(mobile.length<8){
                    $("#errorDisplay").html('Mobile number is not valid <span class="text-danger">*</span>');
                    return false;
                }else{
                    $("#errorDisplay").empty();

                }

                var namePrefix = '<?php echo $options; ?>';

                $('#appendNewRow').after('<div class="row allApendRemove"><div class="col-md-6"><p style="color:red;">#'+forAppnRowCount+'</p><div class="col-md-4"><span>Name Prefix  <span class="text-danger">*</span></span></div><div class="form-group col-md-8"><select class="form-control input-sm name_prefix_table" name="name_prefix[]" id="" data-live-search="true">'+namePrefix+'</select></div><div class="col-md-4"><span>First Name  <span class="text-danger">*</span></span></div><div class="form-group col-md-8"><input type="text" class="form-control input-sm first_name_table" id="" name="first_name[]"></div><div class="col-md-4"><span>Last Name</span></div><div class="form-group col-md-8"><input type="text" class="form-control input-sm" id="" name="last_name"></div><div class="col-md-4"><span>Job Title</span></div><div class="form-group col-md-8"><input type="text" class="form-control input-sm job_title_table" id="" name="job_title[]"></div><div class="col-md-4"><span>Email  <span class="text-danger">*</span></span></div><div class="form-group col-md-8"><input type="email" class="form-control input-sm email_table" id="" name="email[]" value="'+email+'"></div><div class="col-md-4"><span>Mobile  <span class="text-danger">*</span></span></div><div class="form-group col-md-8"><input type="text" class="form-control input-sm mobile_table" id="" name="mobile[]" value="'+mobile+'"></div><div class="col-md-12"><div class="link-btn text-right" style="margin-bottom:3%;"><button class="btn btn-danger btn-xs removeAddMember" type="button" data-loading-text="Please wait..." id="removeAddMember"><i class="fa fa-address-card-o" aria-hidden="true"></i> Remove Member</button></div></div></div></div>');
            });

            $(document).on("click",".removeAddMember",function(){
                $(this).closest('.row').remove();
                forAppnRowCount--;
            });

            var countryCodeLength = 0;
            var countryCodeForCheck = 0;
            $("#country").on('change',function(){
                var mobileCode = $('option:selected', this).attr('mobilecode');
                countryCodeLength = mobileCode.length;
                countryCodeForCheck = mobileCode;
                if(mobileCode==''){
                    $("#mobile").val('');
                }else{
                    $("#mobile").val(mobileCode);
                    $("#mobile_table").val(mobileCode);
                }
            });

            $(document).on('input','#mobile,#mobile_table',function(){
                if(countryCodeForCheck=='0'){
                    alert('Please Select Country');
                    $("#mobile").val('');
                    $("#mobile_table").val('');
                }else{
                    var thisFieldValue = $(this).val();
                    var res = thisFieldValue.substring(0, countryCodeLength);
                    if(res!=countryCodeForCheck){
                        $("#mobile").val(countryCodeForCheck);
                        $("#mobile_table").val(countryCodeForCheck);
                    }
                }
            });

            // email auto set in multiple user
            $(document).on('input','#email',function(){
                var emailOfMain = $("#email").val();
                $("#email_table").val(emailOfMain);
            });

        })
    </script>
@sectionend

@stop
<!--End pagewrapper-->
