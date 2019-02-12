@extends('layouts.default')
@section('styles')
    <link href="{{ asset('public/chosenmultiselect/docsupport/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('public/chosenmultiselect/chosen.css') }}" rel="stylesheet">
    <style type="text/css" media="screen">
        .chosen-container-multi .chosen-choices{
            width: 100% !important;
            padding: 2.5px !important;
            box-shadow: none !important;
            border: 1px solid #e2e2e2 !important;
            background-image: none !important;
        }
        .chosen-container .chosen-drop{
            width: 100% !important;
        }
        .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
            padding-left: 25px !important;
            font-size: 85% !important;
        }
    </style>
@stop
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                {!!trans('english.USER_MANAGEMENT')!!}
            </h2>
        </div>
    </div>
</div>

<div class="content animate-panel">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="">
            <div class="hpanel">
                <div class="panel-heading sub-title">
                    {!!trans('english.UPDATE_A_USER')!!}
                </div>
                <div class="panel-body">
                    {!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form-horizontal', 'id' => 'userId')) !!}                     
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="role_id">{!!trans('english.SELECT_ROLE')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::select('role_id', $roleList, null, array('class' => 'js-source-states form-control', 'id' => 'role_id')) !!}
                        </div>
                    </div>

                    
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserFirstName">{!!trans('english.FIRST_NAME')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::text('first_name', Input::old('first_name'), array('id'=> 'UserFirstName', 'class' => 'form-control', 'required' => 'true')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserLastName">{!!trans('english.LAST_NAME')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::text('last_name', Input::old('last_name'), array('id'=> 'UserLastName', 'class' => 'form-control', 'required' => 'true')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserUsername">{!!trans('english.USERNAME')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::text('username', Input::old('username'), array('id'=> 'UserUsername', 'class' => 'form-control', 'required' => 'true')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserPassword">{!!trans('english.PASSWORD')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::password('password', array('id'=> 'UserPassword', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserConfirmPassword">{!!trans('english.CONFIRM_PASSWORD')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', array('id'=> 'UserConfirmPassword', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserEmail">{!!trans('english.EMAIL')!!} :</label>
                        <div class="col-md-6">
                            {!! Form::email('email',Input::old('email'), array('id'=> 'UserEmail', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserContactNo">{!!trans('english.CONTACT_NO')!!} :</label>
                        <div class="col-md-6">
                            {!! Form::text('contact_no',Input::old('contact_no'), array('id'=> 'UserContactNo', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserDesignation">{!!trans('english.DESIGNATION')!!} :</label>
                        <div class="col-md-6">
                            {!! Form::text('designation',Input::old('designation'), array('id'=> 'UserDesignation', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="UserPhoto">{!!trans('english.PHOTO')!!} :</label>
                        <div class="col-md-6">
                            {!! Form::file('photo',Input::old('photo'), array('id'=> 'UserPhoto', 'class' => 'form-control')) !!}
                            <div style="color:#B4B7B8">{!!trans('english.USER_PHOTO_HINTS')!!}</div>
                        </div>
                    </div>

                    {{--<div class="form-group categories_id"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Category:<span class="text-danger">*</span></label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<select name="category_id[]" id="" class="form-control chosen-select categoryInput" multiple tabindex="4" required='required' >--}}

                                {{--@foreach($categoryList as $category)--}}
                                    {{--<option value="{!! $category->id !!}"  @if(in_array($category->id,explode(',',$user->category_id))==true ) selected="selected"--}}
                                            {{--@endif  >{!! $category->name !!}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group question_type_id"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Question Type:<span class="text-danger">*</span></label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<select name="question_type_id[]" id="" class="form-control chosen-select questionInput" multiple tabindex="4" required='required' >--}}
                                {{--@foreach($questionTypeList as $questions)--}}
                                    {{--<option value="{!! $questions->id !!}" @if(in_array($questions->id,explode(',',$user->question_type_id))==true ) selected="selected"--}}
                                            {{--@endif >{!! $questions->name !!}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group keywords"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Keywords:<span class="text-danger">*</span></label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<select name="keywords[]" id="" class="form-control chosen-select keywordInput" multiple tabindex="4" required='required' >--}}
                                {{--@foreach($keywords as $key)--}}
                                    {{--<option value="{!! $key->id !!}" @if(in_array($key->id,explode(',',$user->keywords))==true ) selected="selected"--}}
                                            {{--@endif >{!! $key->name !!}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="userStatusId">{!!trans('english.STATUS')!!} :<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            {!! Form::select('status_id', array('1' => 'Active', '2' => 'Inactive'), Input::old('status_id'), array('class' => 'selectpicker form-control', 'id' => 'userStatusId')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="update_acl">{!!trans('english.UPDATE_ACL')!!}:</label>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-success">
                                <input type="checkbox" name="update_acl" class="activity checkbox" data-column-id="1" id="update_acl" value="1" /> 
                                <label for="update_acl" style="font-weight: bold;"></label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">{!!trans('english.UPDATE')!!}</button>
                            <button type="button" class="btn btn-default cancel">{!!trans('english.CANCEL')!!}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
     $(document).ready(function () {
        $('#site_office_id').on('change', function () {
        
            var siteOfficeId = $(this).val();
            if (siteOfficeId == '' || siteOfficeId == '0'){
               $(".site-office-error").show();
               return false;
           }
               $.ajax({
                    url: "{!!URL::to('users/loadProject')!!}",
                    type: "POST",
                    data: {'site_office_id': siteOfficeId},
                    dataType: 'html',
                    cache: false
                }).done(function (data) {
                   
                    $("#project").html(data);
                    $("#project_id").select2();
                });
            
        });
         
     });
     
    $(function () {
        $('.categories_id').hide();
        $('.question_type_id').hide();
        $('.keywords').hide();
        if ($('#role_id').val() ==9 || $('#role_id').val() ==8 ){
            $('.categories_id').show();
            $('.question_type_id').show();
            $('.keywords').show();

        }else{
            $('.keywords').hide();
            $('.categories_id').hide();
            $('.question_type_id').hide();
            $('.categoryInput').attr('disabled',true);
            $('.questionInput').attr('disabled',true);
            $('.keywordInput').attr('disabled',true);

        }
        $('#userCreate').on("submit", function () {
            if ($('#role_id').val() == '') {
                alert('Select User Role');
                return false;
            }
            if ($('#UserFirstName').val() == '') {
                alert('Enter First Name');
                return false;
            }
            if ($('#UserLastName').val() == '') {
                alert('Enter Last Name');
                return false;
            }
            if ($('#UserUsername').val() == '') {
                alert('Enter Username');
                return false;
            }
            var passWord = $('#UserPassword').val();
            var confirmPassWord = $('#UserConfirmPassword').val();
            if (passWord !== '') {
                if (confirmPassWord == '') {
                    alert('Enter Confirm Password');
                    return false;
                }
                if (passWord !== confirmPassWord) {
                    alert('Password and Confirm Passowrd doesn\'t match');
                    return false;
                }
            }
        });
//        $(document).on('change','#role_id',function () {
//            if ($('#role_id').val() ==9 || $('#role_id').val() ==8 ){
//                $('.categories_id').show();
//                $('.question_type_id').show();
//                $('.keywords').show();
//                $('.keywordInput').show();
//
//            }else{
//                $('.categories_id').hide();
//                $('.question_type_id').hide();
//                $('.keywords').hide();
//                $('.categoryInput').attr('disabled',true);
//                $('.questionInput').attr('disabled',true);
//                $('.keywordInput').attr('disabled',true);
//
//            }
//        });
    });
</script>
@stop

@section('js')
    <script src="{{ asset('public/chosenmultiselect/chosen.jquery.js') }}"></script>
    <script src="{{ asset('public/chosenmultiselect/docsupport/prism.js') }}"></script>
    <script src="{{ asset('public/chosenmultiselect/docsupport/init.js') }}"></script>
@stop