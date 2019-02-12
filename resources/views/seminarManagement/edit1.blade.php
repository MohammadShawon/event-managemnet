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
                Edit Seminar Management
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-6 col-md-12" style="">
                <div class="hpanel">
                    <div class="panel-heading sub-title">
                        Create New Event
                    </div>
                    <div class="panel-body">
                        {{ Form::model($semiMng, array('route' => array('seminar-management.update', $semiMng->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'seminarManagementEdit')) }}

                    <div class="col-sm-3 col-md-6"> <!-- div 6 statrat here -->
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                               {{ Form::select('event_id',($events),null, array('class' => 'form-control selectpicker', 'id' => 'event_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>
                        
                        <?php $ala = explode(',', $semiMng->speaker_id); ?>
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="speaker_id">Speakers :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                               <!-- {{ Form::select('speaker_id[]',($speakers),$ala, array('class' => 'form-control selectpicker', 'id' => 'speaker_id', 'data-live-search' => 'true', 'multiple'=>'multiple')) }} -->
                               <select name="speaker_id[]" id="speaker_id" class="form-control selectpicker" multiple data-live-search="true">
                                   @foreach($speakers as $spla)
                                        <option value="{{$spla->id}}" @foreach($ala as $al)@if($al==$spla->id) selected @endif @endforeach>{{$spla->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Title :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('title', Input::old('title'), array('id'=> 'title', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="short_description">Short Description :</label>
                            <div class="col-md-8">
                                {{ Form::textarea('short_description', Input::old('short_description'), array('id'=> 'short_description', 'class' => 'form-control g-limit', 'rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="description">Description :</label>
                            <div class="col-md-8">
                                {{ Form::textarea('description', Input::old('description'), array('id'=> 'description', 'class' => 'form-control g-limit', 'rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="start_date">Start Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('start_date', Input::old('start_date'), array('id'=> 'start_date', 'class' => 'form-control g-limit ', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="end_date">End Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('end_date', Input::old('end_date'), array('id'=> 'end_date', 'class' => 'form-control g-limit ', 'required' => 'true')) }}
                            </div>
                        </div>

                    </div><!-- end first 6 md div -->

                    <div class="col-sm-3 col-md-6"> <!-- div 6 second start here -->
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="registration_end_date_time">Reg. End Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('registration_end_date_time', Input::old('registration_end_date_time'), array('id'=> 'registration_end_date_time', 'class' => 'form-control g-limit', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="room_hall">Hall :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('room_hall', Input::old('room_hall'), array('id'=> 'room_hall', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="feature_image">Feature Image :</label>
                            <div class="col-md-8">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($semiMng->feature_image)
                                    <a href="{!! asset('public/uploads/seminar-feature-image/'.$semiMng->feature_image) !!}" class="">
                                      <img src="{!! asset('public/uploads/seminar-feature-image/'.$semiMng->feature_image) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                <div class="row">
                                    {{ Form::file('feature_image', array('id'=> 'feature_image', 'class' => 'form-control g-limit custom-file-upload')) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                <a href="{{URL::to('seminar-management')}}" class="btn btn-default cancel">{!!trans('english.CANCEL')!!}</a>
                            </div>
                        </div>

                    </div> <!-- end second 6 md div -->
                    
                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        //$("#registration_end_date_time").datetimepicker();

         $("#start_date").datetimepicker( {
                //format: 'YYYY-MM-DD hh:mm',
                format: 'YYYY-MM-DD HH:mm:ss',
            });

        $("#end_date").datetimepicker( {
                //format: 'YYYY-MM-DD hh:mm',
                format: 'YYYY-MM-DD HH:mm:ss',
            });


        $("#registration_end_date_time").datetimepicker( {
                //format: 'YYYY-MM-DD hh:mm',
                format: 'YYYY-MM-DD HH:mm:ss',
                // use24hours: true
                // defaultDate: moment().add(2,'days'),
                //daysOfWeekDisabled: array2,
                //disabledDates: holiday

            });
    });
   
</script>

@stop


