@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Speaker Management</h3>
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
                        <?php if(!empty(Session::get('acl')[28][2])){ ?>
                        <div class="pull-right">
                            <a class="btn btn-info btn-effect-ripple" href="{{ URL::to('speaker-management/create') }}"><i class="fa fa-plus"></i> Add New Speaker</a>
                        </div>
                        <?php } ?>
                            <h3>Speaker Management</h3>
                    </div>
                        <div class="panel-body">

                            <div class="row" style="padding-bottom: 20px;">

                                {{ Form::open(array('role' => 'form', 'url' => 'speaker-management/searchByEvent', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'userPreRegistration')) }}

                                <div class="col-lg-8">

                                    <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="searchRegisterBy">Search By Event :<span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <select name="event_id" id="event_id" class="form-control selectpicker" required>
                                                <option value="">Select Event</option>
                                                @foreach($events as $ev)
                                                    <option value="{{$ev->id}}">{{$ev->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Search!</button>
                                    </div>

                                </div>
                                {!!   Form::close() !!}

                                <div class="col-md-4">
                                    <a href="{{URL::to('all-speaker-print')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
                                </div>
                            </div>

                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">SL#</th>
                                    <th class="text-center">{{'Name'}}</th>
                                    <th class="text-center">{{'Title'}}</th>
                                    <th class="text-center">{{'Company'}}</th>
                                    <th class="text-center" width="">{{'Mobile'}}</th>
                                    <th class="text-center">{{'Email'}}</th>
                                    <th class="text-center" width="10%">{{'Speaker Type'}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[28][3]) || !empty(Session::get('acl')[28][4])){ ?>
                                    <th class="text-center"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$speakermanagement->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($speakermanagement as $spm)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{$spm->name}}</td>
                                            <td>{{$spm->title}}</td>
                                            <td>{{$spm->company}}</td>
                                            <td>{{$spm->mobile}}</td>
                                            <td>{{$spm->email}}</td>
                                            <td>{{$spm->speaker_name->speaker_type}}</td>
                                            <td class="text-center">
                                                @if ($spm->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <?php if(!empty(Session::get('acl')[28][3]) || !empty(Session::get('acl')[28][4])){ ?>
                                            <td class="action-center">
                                                <div class="text-center">
                                                    <?php if(!empty(Session::get('acl')[28][1])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('speaker-management/' . $spm->id . '/view') }}" title="view">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <?php } ?>
                                                    <?php if(!empty(Session::get('acl')[28][3])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('speaker-management/' . $spm->id . '/edit') }}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php } ?>

                                                    <?php if(!empty(Session::get('acl')[28][4])){?>
                                                    <button class="spmdelete btn btn-danger btn-xs" id="{{$spm->id}}" type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
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
                                        <td colspan="9">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $speakermanagement->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".spmdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('speaker-management/delete') !!}'+'/'+id;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

        });
    </script>
@stop