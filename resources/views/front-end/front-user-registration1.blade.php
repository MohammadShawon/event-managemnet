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
                <h3>Get In <span>Touch</span></h3>
                <p>Register Here.</p>
            </div>
            
            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/post-user-registration')}}" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-left">
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="event_id" data-width="100%">
                                    <option value="{{$activeEvent->id}}">{{$activeEvent->title}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="visitor_type" id="visitor_type" data-style="g-select" data-width="100%">
                                    <option value="">Registration Type</option>
                                    @foreach($visitoTypes as $vt)
                                    <option value="{{$vt->id}}">{{$vt->registration_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="text-capitalize selectpicker form-control required" name="name_prefix[]" data-style="g-select" data-width="100%">
                                    <option value="">Name Prefix</option>
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
                                <input type="email" name="email[]" placeholder="Your Email" required="" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" placeholder="Your Telephone" value="{{old('telephone')}}">
                            </div>
                        </div>                               
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area-right">
                            <div class="form-group">
                                <input type="text" name="mobile[]" placeholder="Your Mobile" required="" value="{{old('mobile')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="company_name" placeholder="Your Company Name" value="{{old('company_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="job_title[]" placeholder="Your Job Title" value="{{old('job_title')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" placeholder="Your Country" value="{{old('country')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="postcode" placeholder="Your Postal Code" value="{{old('postcode')}}">
                            </div>                                        
                            <div class="form-group">
                                <div class="form-group">
                                <textarea type="textarea" name="address" placeholder="your address" style="height: 90px !important; ">{{old('address')}}</textarea>
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
                    <div class="row hidden" id="tableDiv">

                    <table border="0" id="appendTable">
                        <thead>
                            <th width="16%">Name Prefix <span class="text-danger">*</span></th>
                            <th width="16%">First Name <span class="text-danger">*</span></th>
                            <th width="16%">Last Name</th>
                            <th width="16%">Email <span class="text-danger">*</span></th>
                            <th width="16%">Mobile <span class="text-danger">*</span></th>
                            <th width="16%">Job Title <span class="text-danger">*</span></th>
                            <th width="4%">Add</th>
                        </thead>
                        <tbody>
                            <td>
                                {{ Form::select('name_prefix_table',($namePrefixAppnd),null, array('class' => 'form-control input-sm', 'id' => 'name_prefix_table', 'data-live-search' => 'true')) }}
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="first_name_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="last_name_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="email_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="mobile_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="job_title_table">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary addUseInfo btn-sm" id="addNewRow">
                                    Add
                                </button>
                            </td>
                        </tbody>
                    </table>
                </div>
                <!-- append section end here================== -->

                <div class="link-btn text-center" style="margin-bottom: 2%; margin-top: 2%;">
                    <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Register</button>
                </div>

            </form>
        </div>
    </section>
    <!--End news-section Style-->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $("#visitor_type").on('change',function(){ 
                var vistor_type = $("#visitor_type option:selected").text();
                if(vistor_type == 'Group'){
                    $("#tableDiv").removeClass('hidden');
                }else{ 
                    $('#appendTable tr.removeTr').remove();
                    $("#tableDiv").addClass('hidden');

                    $('#first_name_table').val('');
                    $('#last_name_table').val('');
                    $('#email_table').val('');
                    $('#mobile_table').val('');
                    $('#job_title_table').val('');
                }
            });

            var i=0;
            $("#addNewRow").on("click",function(){
                
                var prefix_id       = $('#name_prefix_table').val(); 
                var prefix_name     = $('#name_prefix_table option:selected').text();
                var first_name      = $('#first_name_table').val(); //alert(productQntty);
                var last_name       = $('#last_name_table').val();
                var email           = $('#email_table').val();
                var mobile          = $('#mobile_table').val();
                var job_title       = $('#job_title_table').val();

                if(prefix_id =='' || first_name =='' || last_name =='' || email =='' || mobile =='' || job_title ==''){
                    $("#errorDisplay").html('Field should not be empty <span class="text-danger">*</span>');
                    return false;
                }else{
                    $("#errorDisplay").empty();
                }

                $('#appendTable').append('<tr class="removeTr" id="row'+i+'"><td><input type="text" name="prefixApnd" class="form-control input-sm" style="text-align:left; cursor:default" value="'+prefix_name+'" readonly/></td><td><input type="text" name="first_name[]" class="form-control input-sm fristNameApnd" id="fristNameApnd" style="text-align:center; cursor:default"  value="'+first_name+'" readonly/></td><td><input type="text" name="last_name[]" class="form-control input-sm lastNameApnd" id="lastNameApnd" style="text-align:center; cursor:default" value="'+last_name+'" readonly/></td><td><input type="text" name="email[]" class="form-control input-sm emailApnd" id="emailApnd" style="text-align:center; cursor:default"  value="'+email+'" readonly/></td><td><input type="text" name="mobile[]" class="form-control input-sm mobileApnd" style="text-align:center; cursor:default" value="'+mobile+'" id="mobileApnd" readonly/></td><td><input type="text" class="form-control input-sm jobTitleApnd" name="job_title[]" value="'+ job_title +'" readonly/></td><td><input type="text" class="hidden nput-sm" name="name_prefix[]" value="'+ prefix_id +'"/><a href="javascript:;" name="remove" id="'+i+'" class="btn_remove" style="width:80px"><i class="glyphicon glyphicon-trash" style="color:red; font-size:16px"></i></a></td></tr>');

                //$('#name_prefix_table').val(''); 
                $('#first_name_table').val('');
                $('#last_name_table').val('');
                $('#email_table').val('');
                $('#mobile_table').val('');
                $('#job_title_table').val('');

            });

            $(document).on('click', '.btn_remove', function(){ 

                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove(); 
 
            }); //end remove button click

        })
    </script>
@sectionend

@stop
<!--End pagewrapper-->
