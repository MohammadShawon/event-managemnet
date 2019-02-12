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
                 Edit Floor Plan
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
                        Edit Floor Plan
                    </div>
                    <div class="panel-body">
                        {{ Form::model($floorplanId, array('route' => array('floor-plan.update', $floorplanId->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'floorPlanEdit')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::select('event_id',($event),null, array('class' => 'form-control selectpicker', 'id' => 'event_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Title :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('title', Input::old('title'), array('id'=> 'title', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="floor_plan_image">Froor Plan Image :</label>
                            <div class="col-md-5">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($floorplanId->floor_plan_image) 
                                    <a href="{!! asset('public/uploads/floor-plan-image/'.$floorplanId->floor_plan_image) !!}" class="">
                                      <img src="{!! asset('public/uploads/floor-plan-image/'.$floorplanId->floor_plan_image) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ Form::file('floor_plan_image', array('id'=> 'floor_plan_image', 'class' => 'form-control g-limit custom-file-upload')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-5">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-7 col-sm-offset-2">
                                <a href="{{URL::to('sponsor-management')}}" class="btn btn-default cancel pull-right" >{!!trans('english.CANCEL')!!}</a>
                                
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


