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
                Create New Sponsor
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
                        Create New Sponsor
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'sponsor-management', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'sponsorManagementCreate')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="speaker_type_id">Company Name :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               {{ Form::text('company_name', Input::old('company_name'), array('id'=> 'company_name', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="website">Website :</label>
                            <div class="col-md-5">
                                {{ Form::text('website', Input::old('website'), array('id'=> 'website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>


                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="spnsorlogo">Logo :</label>
                            <div class="col-md-5">
                                {{ Form::file('spnsorlogo', array('id'=> 'spnsorlogo', 'class' => 'form-control g-limit custom-file-upload')) }}
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

@stop


