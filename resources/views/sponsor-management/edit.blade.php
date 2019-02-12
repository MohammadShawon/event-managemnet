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

                 Edit Sponsor

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

                        Edit Sponsor

                    </div>

                    <div class="panel-body">

                        {{ Form::model($sponId, array('route' => array('sponsor-management.update', $sponId->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'sponsorEdit')) }}



                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="speaker_type_id">Company Name :<span class="text-danger">*</span></label>

                            <div class="col-md-5">

                               {{ Form::text('company_name', Input::old('company_name'), array('id'=> 'company_name', 'class' => 'form-control g-limit','required'=>'required')) }}

                            </div>

                        </div>



                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="website">Waddressebsite :</label>

                            <div class="col-md-5">

                                {{ Form::text('website', Input::old('website'), array('id'=> 'website', 'class' => 'form-control g-limit')) }}

                            </div>

                        </div>



                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="logo">Logo :</label>

                            <div class="col-md-5">



                                <div class="row">

                                  <div class="col-xs-12 col-md-12">

                                  @if($sponId->logo)

                                    <a href="{!! asset('public/uploads/sponsor-logo/'.$sponId->logo) !!}" class="">

                                      <img src="{!! asset('public/uploads/sponsor-logo/'.$sponId->logo) !!}" alt="...." width="50%" height="80px">

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

                                            {{ Form::file('spnsorlogo', array('id'=> 'spnsorlogo', 'class' => 'form-control g-limit custom-file-upload')) }}

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





