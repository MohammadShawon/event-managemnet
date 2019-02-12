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
                    Download Question Answer
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
                        Download Question Answer
                    </div>
                    <div class="panel-body">

                        {{ Form::open(array('role' => 'form', 'url' => 'question-answer-download-download', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'exibitiorsManagementCreate')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-5">
                                {{--{{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}--}}
                                <select class="form-control selectpicker" id="event_id" name="event_id">
                                    <option value="">Select Event</option>
                                    @foreach($allEvents as $ae)
                                        <option value="{{$ae->id}}">{{$ae->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i>{{'Excel'}}</button>
                            </div>
                        </div>

                    <!-- <div class="hr-line-dashed"></div> -->

                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop





