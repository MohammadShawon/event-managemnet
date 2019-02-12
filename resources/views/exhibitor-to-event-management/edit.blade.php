@extends('layouts.default')

<style type="text/css">

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>

@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                Create New Exhibitor
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-6 col-md-12">
                <div class="hpanel">
                    <div class="panel-heading sub-title">
                        Create New Event
                    </div>
                    <div class="panel-body">
                        {{ Form::model($exhibitorToEventId, array('route' => array('exhibitor-to-event.update', $exhibitorToEventId->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'exibitiorsEdit')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::select('event_id',($event),null, array('class' => 'form-control selectpicker', 'id' => 'event_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="stall_id">Stall :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::select('stall_id',($stalls),null, array('class' => 'form-control selectpicker', 'id' => 'stall_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="both_type_id">Booth Type :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::select('both_type_id',($booths),null, array('class' => 'form-control selectpicker', 'id' => 'both_type_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), $exhibitorToEventId->status, array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-7 col-sm-offset-2">
                                <a href="{{URL::to('exhibitor-to-event')}}" class="btn btn-default cancel pull-right" >{!!trans('english.CANCEL')!!}</a>
                                
                                <button type="submit" class="btn btn-primary pull-right">{!!trans('english.SAVE')!!}</button>
                                
                            </div>
                        </div>
    
                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


    </script>
@stop


