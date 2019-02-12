@extends('layouts.default')

@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>User Registration</h3>
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                        <?php if(!empty(Session::get('acl')[34][2])){ ?>
                        <div class="pull-right">
                            <a class="btn btn-info btn-effect-ripple" href="{{ URL::to('user-registration/create') }}"><i class="fa fa-plus"></i> New Registration</a>
                        </div>
                        <?php } ?>
                            <h3>{{trans('User Registration')}}</h3>
                    </div>
                        <div class="panel-body">
                            <div class="row" style="padding-bottom: 20px;">

                                {{ Form::open(array('role' => 'form', 'url' => 'searchEventOrOthers', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'userPreRegistration')) }}

                                <div class="col-lg-8">

                                    <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="searchRegisterBy">Search Register By :<span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <select name="searchRegisterBy" id="searchRegisterBy" class="form-control selectpicker" required>
                                                <option value="">Search Register</option>
                                                <option value="1">Event</option>
                                                <option value="2">Event’s Seminar</option>
                                                <option value="3">Participant on Event</option>
                                                <option value="4">Participant on Event’s Seminar</option>
                                                <option value="5">Pre registration</option>
                                                <option value="6">On Spot registration</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="control-label col-md-3" for="event_id_search" id="hideEventIdAppendDiv">Event :<span class="text-danger">*</span></label>
                                        <div class="col-md-5" id="appendEventDiv">
                                             
                                        </div>
                                    </div>

                                    <div class="form-group" id="hideCommonDiv">
                                        <div class="hideCommonAppendDiv"></div>
                                        <div class="col-md-5" id="appendCommonDiv">
                                             
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="">{{-- <input type="checkbox" name="downloadExcel" value="1"> Checkd if download--}}</label>
                                        <div class="col-md-5">
                                                <button class="btn btn-primary" type="submit">Search!</button>
                                        </div>
                                    </div> 

                                </div>
                                {!!   Form::close() !!}

                                <div class="col-md-4">
                                    {{ Form::open(array('role' => 'form', 'url' => 'searchFromIndex', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'searchUser')) }}

                                    <div class="input-group">

                                    {{ Form::text('searchInputFmIndex', Session::get('serValForFormInp'), array('id'=> 'searchInputFmIndex', 'class' => 'form-control g-limit')) }}
                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Search!</button>
                                      </span>

                                    </div>

                                {!!   Form::close() !!}
                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 20px;">
                                <div class="col-md-12">
                                    <a href="{{URL::to('registration/all-user-info-print')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
                                </div>
                            </div>
                                
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">{{'SL#'}}</th>
                                    <th class="text-center" width="10%">{{'Event'}}</th>
                                    <th class="text-center" width="10%">{{'Visitor Type'}}</th>
                                    <th class="text-center">{{'Name'}}</th>
                                    <th class="text-center">{{'Registration Number'}}</th>
                                    <th class="text-center">{{'Email'}}</th>
                                    <th class="text-center">{{'Mobile'}}</th>
                                    <th class="text-center" width="">{{'Company Name'}}</th>
                                    <th class="text-center">{{'Job Title'}}</th>
                                    <th class="text-center">{{'Country'}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[34][3]) || !empty(Session::get('acl')[34][4])){ ?>
                                    <th class="text-center"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$usrRegistrations->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($usrRegistrations as $ur)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{$ur->event_name->title}}</td>
                                            <td>{{$ur->visitor_type_name->registration_type}}</td>
                                            <td>
                                                {{$ur->name_prefix_name->name_prefix}}
                                                {{$ur->first_name}}
                                                {{$ur->last_name}}
                                            </td>
                                            <td>{{$ur->registration_number}}</td>
                                            <td>{{$ur->email}}</td>
                                            <td>{{$ur->mobile}}</td>
                                            <td>{{$ur->company_name}}</td>   
                                            <td>{{$ur->job_title}}</td>
                                            <td>{{$ur->country}}</td>
                                            <td class="text-center">
                                                @if ($ur->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <?php if(!empty(Session::get('acl')[34][3]) || !empty(Session::get('acl')[34][4])){ ?>
                                            <td class="action-center">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[34][1])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('user-registration/' . $ur->id . '/view') }}" title="view">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <?php } ?>
                                            
                                                    <?php if(!empty(Session::get('acl')[34][4])){?>
                                                    <button class="urdelete btn btn-danger btn-xs" id="{{$ur->id}}" type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete" title="delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    @endforeach
                                
                                @else
                                    <tr>
                                        <td colspan="12">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $usrRegistrations->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".urdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('user-registration/delete') !!}'+'/'+id;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

            // filter by
            $("#hideEventIdAppendDiv").hide();
            $("#searchRegisterBy").on('change',function(){

                $("#appendCommonDiv").empty();
                $('.hideCommonAppendDiv').empty();
                $('.hideCommonDiv').hide();

                var selected_serch_id = this.value;
                var url='user-registration/getEventsIds';
                var csrf = "<?php echo csrf_token(); ?>";

                if(selected_serch_id==1 || selected_serch_id==2 || selected_serch_id==3 || selected_serch_id==4 || selected_serch_id==5 || selected_serch_id==6){
                    $.ajax({
                        type: "post",
                        data: { _token: csrf, selected_serch_id:selected_serch_id, id:''},
                        url:url,
                        success:
                            function (data) {
                                $("#hideEventIdAppendDiv").show();
                                $("#appendEventDiv").empty();
                                var events='<select name="event_id_append" class="form-control selectpicker" id="event_id_append" required="required"><option value="">Please Select Event</select>';
                                $('#appendEventDiv').append(events).selectpicker('refresh');

                                $.each(data, function(index, eventOption){
                                    $('#event_id_append').append('<option value="'+eventOption['id']+'">'+eventOption['title']+'</option>').selectpicker('refresh');
                                });
                            }
                        });
                        return false;
                    }else{
                        $("#appendEventDiv").empty();
                        $("#hideEventIdAppendDiv").hide();
                    }
            });// on change searchRegisterBy

            // event chage function
            $(document).on('change','#event_id_append',function () { 
                var selected_serch_id = $("#searchRegisterBy").val(); 
                var id = this.value; 
                var url='user-registration/getEventsIds';
                var csrf = "<?php echo csrf_token(); ?>";

                if(selected_serch_id!=1 && selected_serch_id!=3 && selected_serch_id!=5 && selected_serch_id!=6){
                    $.ajax({
                        type: "post",
                        data: { _token: csrf,selected_serch_id:selected_serch_id, id:id},
                        url:url,
                        success:
                            function (data) {
                                $('.hideCommonDiv').show();
                                $('#appendCommonDiv').empty();
                                if(data['searchType']==2){
                                    $('.hideCommonAppendDiv').html('<label class="control-label col-xs-12 col-sm-3 no-padding-right removeLevel" for="role_id">Event’s Seminar :<span class="text-danger">*</span></label>');
                                }
                                if(data['searchType']==3){
                                    $('.hideCommonAppendDiv').html('<label class="control-label col-xs-12 col-sm-3 no-padding-right removeLevel" for="role_id">Participant on Event :<span class="text-danger">*</span></label>');
                                }
                                if(data['searchType']==4){
                                    $('.hideCommonAppendDiv').html('<label class="control-label col-xs-12 col-sm-3 no-padding-right removeLevel" for="role_id">Participant on Event’s Seminar :<span class="text-danger">*</span></label>');
                                }
                                var events='<select name="common_id_append" class="form-control selectpicker" id="common_id_append" required="required"><option value="">Please Select Event</select>';
                                $('#appendCommonDiv').append(events).selectpicker('refresh');

                                $.each(data['common'], function(index, eventOption){
                                    $('#common_id_append').append('<option value="'+eventOption['id']+'">'+eventOption['title']+'</option>').selectpicker('refresh');
                                });
                            }
                        });
                        //return false;
                    }else{
                        // $("#hideCommonDiv").empty();
                        // $("#hideCommonDiv").hide();
                    }
            });// on change searchRegisterBy

        });
    </script>
@stop