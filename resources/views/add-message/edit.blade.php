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
                    Update Message
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
                        Update Message
                    </div>
                    <div class="panel-body">
                        {{ Form::model($message, array('route' => array('add-message.update', $message->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'messageEdit')) }}
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="speaker_type_id">Speaker Type :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               {{ Form::select('event_id',($allEvents),null, array('class' => 'form-control selectpicker', 'id' => 'event_id', 'data-live-search' => 'true')) }}
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
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="mobile">Order No : <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::number('order_no', Input::old('order_no'), array('id'=> 'order_no', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>
                        {{--<div class="form-group"><label class="control-label col-md-4 no-padding-right" for="email">Email :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::email('email', Input::old('email'), array('id'=> 'email', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>--}}
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="description">Message :</label>
                            <div class="col-md-5">
                                {{ Form::textarea('message', Input::old('message'), array('id'=> 'message', 'class' => 'form-control g-limit','rows'=>6)) }}
                            </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="profile_image">Profile Picture :</label>
                            <div class="col-md-5">
                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($message->profile_pic)
                                    <a href="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$message->profile_pic) !!}" class="">
                                      <img src="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$message->profile_pic) !!}" alt="...." width="50%" height="80px">
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
                                        {{ Form::file('profile_image', array('id'=> 'profile_image', 'class' => 'form-control g-limit custom-file-upload')) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="profile_image">Signature :</label>
                            <div class="col-md-5">
                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($message->signature)
                                    <a href="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$message->signature) !!}" class="">
                                      <img src="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$message->signature) !!}" alt="...." width="50%" height="80px">
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
                                        {{ Form::file('signature', array('id'=> 'signature', 'class' => 'form-control g-limit custom-file-upload')) }}
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
                                <a href="{{URL::to('add-message')}}" class="btn btn-default cancel pull-right" >{!!trans('english.CANCEL')!!}</a>
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
    {!! Html::script("public/assets/js/nicEdit-latest.js")!!}
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
    nicEditors.editors.push(
        new nicEditor().panelInstance(
            document.getElementById('message')
        )
    );
    });
    </script>
@stop
