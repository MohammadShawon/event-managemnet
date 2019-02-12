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
                Create New Speaker
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
                        {{ Form::open(array('role' => 'form', 'url' => 'speaker-management', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'speakerManagementCreate')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="speaker_type_id">Speaker Type :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               {{ Form::select('speaker_type_id',($speakerType),null, array('class' => 'form-control selectpicker', 'id' => 'speaker_type_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="name">Name :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('name', Input::old('name'), array('id'=> 'name', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Title :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('title', Input::old('title'), array('id'=> 'title', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="company">Company :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('company', Input::old('company'), array('id'=> 'company', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="mobile">Mobile :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('mobile', Input::old('mobile'), array('id'=> 'mobile', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="email">Email :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::email('email', Input::old('email'), array('id'=> 'email', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="description">Description :</label>
                            <div class="col-md-5">
                                {{ Form::textarea('description', Input::old('description'), array('id'=> 'description', 'class' => 'form-control g-limit','rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="profile_image">Profile Picture :</label>
                            <div class="col-md-5">
                                {{ Form::file('profile_image', array('id'=> 'profile_image', 'class' => 'form-control g-limit custom-file-upload')) }}
                            </div>
                        </div>
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-5">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-7 col-sm-offset-2">
                                <a href="{{URL::to('speaker-management')}}" class="btn btn-default cancel pull-right" >{!!trans('english.CANCEL')!!}</a>
                                
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


