@extends('layouts.default')
@section('content')
<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Event Settings

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
                    <h4>Event Settings</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'media/'.Request::Segment(2),'method'=>'get', 'class' => 'form-horizontal']) !!}
                    <div class="form-group col-md-12">
                    </div>

                    {!! Form::close() !!}
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="@if(Request::segment(2)==1)active @endif">
                                    <a href="{!! url('event-settings',1) !!}">
                                      Active Event </a>
                                </li>
                                <li class="@if(Request::segment(2)==2)active @endif">
                                    <a href="{!! url('event-settings',2) !!}">
                                       Registration Way</a>
                                </li>
                                <li class="@if(Request::segment(2)==3)active  @endif">
                                    <a href="{!! url('event-settings',3) !!}">
                                        Registration Type </a>
                                </li>
                                <li class="@if(Request::segment(2)==4)active  @endif">
                                    <a href="{!! url('event-settings',4) !!}">
                                        Name prefix </a>
                                </li>
                                <li class="@if(Request::segment(2)==5)active  @endif">
                                    <a href="{!! url('event-settings',5) !!}">
                                        Speaker Type </a>
                                </li>
                                <li class="@if(Request::segment(2)==6)active  @endif">
                                    <a href="{!! url('event-settings',6) !!}">
                                        Sponsor Type </a>
                                </li>
                                <li class="@if(Request::segment(2)==7)active  @endif">
                                    <a href="{!! url('event-settings',7) !!}">
                                        Booth Type </a>
                                </li>
                            </ul>

                        @if(Request::segment(2)==1)
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-active-event', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="status">Active Event :</label>
                                        <div class="col-md-5">
                                            {{ Form::select('active_event',($activeEvents),$currentLyActive, array('class' => 'form-control selectpicker', 'id' => 'active_event', 'data-live-search' => 'true')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="text-center" width="10%">{{'Title'}}</th>
                                    <th class="text-center">{{trans('Description')}}</th>
                                    <th class="text-center">{{trans('Start Date')}}</th>
                                    <th class="text-center">{{trans('End Date')}}</th>
                                    <th class="text-center" width="">{{trans('Venue')}}</th>
                                    <th class="text-center">{{trans('Pre Reg. Start Date')}}</th>
                                    <th class="text-center">{{trans('Pre Reg. End Date')}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($eventmanagement as $em)
                                        <tr>
                                            
                                            <td>{{$em->title}}</td>
                                            <td>{{$em->short_description}}</td>
                                            <td>
                                                {{date('jS M y',strtotime($em->start_date))}}
                                            </td>
                                            <td>
                                                {{date('jS M y',strtotime($em->end_date))}}
                                            </td>
                                            <td>{{$em->venue}}</td>   
                                            <td>
                                                {{date('jS M y',strtotime($em->pre_reg_start_date))}}
                                            </td>
                                            <td>
                                                {{date('jS M y',strtotime($em->pre_reg_end_date))}}
                                            </td>
                                            <td class="text-center">
                                                @if ($em->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- end of active envent tab -->
                        @endif

                        @if(Request::segment(2)==2)
                            <div class="tab-content"> <!-- Registration way tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-registration-way', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="registration_way">Registration Way :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('registration_way', Input::old('registration_way'), array('id'=> 'registration_way', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Registration Way'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($registrationWay as $rw)
                                        <tr>
                                            
                                            <td>{{$rw->registration_way}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($rw->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">
                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewRegistrationWay" href="#" id="{{$rw->id}}" regway="{{$rw->registration_way}}" status="{{$rw->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="rwdelete btn btn-danger btn-xs" id="{{$rw->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Registration way -->
                        @endif <!-- end request sigment 2 -->

                        @if(Request::segment(2)==3) <!-- end request sigment 3 -->
                            <div class="tab-content"> <!-- Registration way tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-registration-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="registration_way">Registration Type :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('registration_type', Input::old('registration_type'), array('id'=> 'registration_type', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Registration Type'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($registrationType as $rt)
                                        <tr>
                                            
                                            <td>{{$rt->registration_type}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($rt->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewRegistrationType" href="#" id="{{$rt->id}}" regtype="{{$rt->registration_type}}" status="{{$rt->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="rtdelete btn btn-danger btn-xs" id="{{$rt->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Registration way -->
                        @endif <!-- end request sigment 3 -->

                        @if(Request::segment(2)==4) <!-- start request sigment 4 -->
                            <div class="tab-content"> <!-- Registration way tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-name-prefix', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="name_prefix">Name Prefix :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('name_prefix', Input::old('name_prefix'), array('id'=> 'name_prefix', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Registration Type'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($namePrefix as $nf)
                                        <tr>
                                            
                                            <td>{{$nf->name_prefix}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($nf->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewNamePrefix" href="#" id="{{$nf->id}}" nameprefix="{{$nf->name_prefix}}" status="{{$nf->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="nfdelete btn btn-danger btn-xs" id="{{$nf->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Name prefix -->
                        @endif <!-- end request sigment 4 -->

                        @if(Request::segment(2)==5) <!-- start request sigment 5 -->
                            <div class="tab-content"> <!-- Registration way tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-speaker-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="speaker_type">Speaker Type :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('speaker_type', Input::old('speaker_type'), array('id'=> 'speaker_type', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Speaker Type'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($speakerType as $st)
                                        <tr>
                                            
                                            <td>{{$st->speaker_type}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($st->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewSpeakerType" href="#" id="{{$st->id}}" speakertype="{{$st->speaker_type}}" status="{{$st->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="stdelete btn btn-danger btn-xs" id="{{$st->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Speaker type -->
                        @endif <!-- end request sigment 5 -->

                        @if(Request::segment(2)==6) <!-- start request sigment 6 ==================-->
                            <div class="tab-content"> <!-- Sponsor type tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-sponsor-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="sponsor_type">Sponsor Type :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('sponsor_type', Input::old('sponsor_type'), array('id'=> 'sponsor_type', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Sponsor Type'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($sponsorType as $spt)
                                        <tr>
                                            <td>{{$spt->sponsor_type}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($spt->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewSponsorType" href="#" id="{{$spt->id}}" sponsortype="{{$spt->sponsor_type}}" status="{{$spt->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="sptdelete btn btn-danger btn-xs" id="{{$spt->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Sponsor type -->
                        @endif <!-- end request sigment 6 -->

                         @if(Request::segment(2)==7) <!-- start request sigment 7 ==================-->
                            <div class="tab-content"> <!-- booth type tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'event-settings/post-booth-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="booth_type">Booth Type :</label>
                                        <div class="col-md-6">
                                            {{ Form::text('booth_type', Input::old('booth_type'), array('id'=> 'booth_type', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-6">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="" width="60%">{{'Booth Type'}}</th>
                                    <th class="text-center" width="20%">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[27][3]) || !empty(Session::get('acl')[27][4])){ ?>
                                    <th class="text-center" width="20%"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($boothType as $bt)
                                        <tr>
                                            <td>{{$bt->booth_type}}</td>
                                            <td class="text-center" width="20%">
                                                @if ($bt->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="action-center" width="20%">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[27][3])){ ?>
                                                    <a class="btn btn-primary btn-xs viewBoothType" href="#" id="{{$bt->id}}" boothtype="{{$bt->booth_type}}" status="{{$bt->status}}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php }?>

                                                    <?php if(!empty(Session::get('acl')[27][4])){?>
                                                    <button class="btdelete btn btn-danger btn-xs" id="{{$bt->id}}" param={{Request::segment(2)}} type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- End of Sponsor type -->
                        @endif <!-- end request sigment 7 -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration way modal ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewRegistrationWay" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Registration Way'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-registration-way', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="registration_way">Registration Way :</label>
                            <div class="col-md-8">
                                {{ Form::text('registration_way', Input::old('registration_way'), array('id'=> 'registration_way_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statusrwed')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('regwayeditid', null, array('id'=> 'regwayeditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>

<!-- Registration Type modal ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewRegistrationType" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Registration Type'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-registration-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="registration_way">Registration Way :</label>
                            <div class="col-md-8">
                                {{ Form::text('registration_type', Input::old('registration_type'), array('id'=> 'registration_type_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statusrted')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('regtypeeditid', null, array('id'=> 'regtypeeditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>

<!-- Name prefix modal ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewNamePrefix" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Name Prefix'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-name-prefix', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="registration_way">Name Prefix :</label>
                            <div class="col-md-8">
                                {{ Form::text('name_prefix', Input::old('name_prefix'), array('id'=> 'name_prefix_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statusnfed')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('nfeditid', null, array('id'=> 'nfeditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>

<!-- Speaker Type ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewSpeakerType" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Speaker Type'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-speaker-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="speaker_type">Speaker Type :</label>
                            <div class="col-md-8">
                                {{ Form::text('speaker_type', Input::old('speaker_type'), array('id'=> 'speaker_type_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statussted')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('steditid', null, array('id'=> 'steditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>

<!-- Sponsor Type ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewSponsorType" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Sponsor Type'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-sponsor-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="sponsor_type">Speaker Type :</label>
                            <div class="col-md-8">
                                {{ Form::text('sponsor_type', Input::old('sponsor_type'), array('id'=> 'sponsor_type_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statusspted')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('spteditid', null, array('id'=> 'spteditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>

<!-- Booth Type ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewBoothType" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 60%; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Booth Type'}}</h4>
            </div>
                <div class="modal-body">
                    {{ Form::open(array('role' => 'form', 'url' => 'event-settings/edit-booth-type', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="sponsor_type">Booth Type :</label>
                            <div class="col-md-8">
                                {{ Form::text('booth_type', Input::old('booth_type'), array('id'=> 'booth_type_ed', 'class' => 'form-control g-limit', 'required'=>'required')) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'statusbted')) }}
                            </div>
                        </div>
                        {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('bteditid', null, array('id'=> 'bteditid', 'class' => 'form-control g-limit')) }}
                        
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                    <span style="float: right;">
                                        <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                    </span>
                                </div>
                            </div>

                    {!!   Form::close() !!}
                <div class="modal-footer">
                            
                </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        // edit registration way=======================================
        $(document).on('click', '.viewRegistrationWay', function() {
            var id     = this.id;
            var regway = $(this).attr('regway'); 
            var status = $(this).attr('status');

            $("#registration_way_ed").val(regway);
            $("#statusrwed").val(status).change();
            $("#regwayeditid").val(id);
            $('#viewRegistrationWay').modal('show');
        });

        /*For Delete registration way */
            $(".rwdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/registration-way-delete') !!}'+'/'+id+'/'+param;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

// edit registration type=======================================
        $(document).on('click', '.viewRegistrationType', function() {
            var id     = this.id;
            var regtype = $(this).attr('regtype'); 
            var status = $(this).attr('status'); 

            $("#registration_type_ed").val(regtype);
            $("#statusrted").val(status).change();
            $("#regtypeeditid").val(id);
            $('#viewRegistrationType').modal('show');
        });

        /*For Delete registration type */
            $(".rtdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/registration-type-delete') !!}'+'/'+id+'/'+param;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

 // edit name prefix type=======================================
        $(document).on('click', '.viewNamePrefix', function() {
            var id     = this.id;
            var nameprefix = $(this).attr('nameprefix'); 
            var status = $(this).attr('status'); 

            $("#name_prefix_ed").val(nameprefix);
            $("#statusnfed").val(status).change();
            $("#nfeditid").val(id);
            $('#viewNamePrefix').modal('show');
        });

        /*For Delete name prefix type */
            $(".nfdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/name-prefix-delete') !!}'+'/'+id+'/'+param;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

// edit speaker type type=======================================
        $(document).on('click', '.viewSpeakerType', function() {
            var id     = this.id;
            var speakertype = $(this).attr('speakertype'); 
            var status = $(this).attr('status'); 

            $("#speaker_type_ed").val(speakertype);
            $("#statussted").val(status).change();
            $("#steditid").val(id);
            $('#viewSpeakerType').modal('show');
        });

        /*For Delete speaker type type */
            $(".stdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/speaker-type-delete') !!}'+'/'+id+'/'+param;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

// edit sponsor type type=======================================
        $(document).on('click', '.viewSponsorType', function() {
            var id     = this.id;
            var sponsortype = $(this).attr('sponsortype'); 
            var status = $(this).attr('status'); 

            $("#sponsor_type_ed").val(sponsortype);
            $("#statusspted").val(status).change();
            $("#spteditid").val(id);
            $('#viewSponsorType').modal('show');
        });

        /*For Delete sponsor type type */
            $(".sptdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/sponsor-type-delete') !!}'+'/'+id+'/'+param;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

// edit sponsor type type=======================================
        $(document).on('click', '.viewBoothType', function() {
            var id     = this.id;
            var boothtype = $(this).attr('boothtype'); 
            var status = $(this).attr('status'); 

            $("#booth_type_ed").val(boothtype);
            $("#statusbted").val(status).change();
            $("#bteditid").val(id);
            $('#viewBoothType').modal('show');
        });

        /*For Delete sponsor type type */
            $(".btdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id;
                var param = $(this).attr('param'); //alert(param);
                var url='{!! URL::to('event-settings/sponsor-booth-delete') !!}'+'/'+id+'/'+param;
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


