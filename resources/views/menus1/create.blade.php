@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>{{trans('english.CREATE_NEW_MENU')}}</h3>
                </h2>
            </div>
        </div>
    </div>
    @include('layouts.flash')

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="">
                <div class="hpanel">
                    <div class="panel-heading sub-title">
                        <h3>{{trans('english.CREATE_NEW_MENU')}}</h3>

                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'menus', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'menuCreate')) }}


                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">{{trans('english.NAME')}} :<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text('name', Input::old('name'), array('id'=> 'MenuName', 'class' => 'form-control','required')) }}

                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">{{trans('english.MENU_TYPE')}} :<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                {{ Form::select('type_id', array('1'=>'Category','2'=>'Internal Url'), Input::old('type_id'), array('class' => 'selectpicker  form-control', 'id' => 'MenuTypeId','placeholder'=>'Select Menu Type')) }}

                            </div>
                        </div>

                        <div class="form-group" id="menu-chooser">


                        </div>

                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Menu Position :<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                {{ Form::select('menu_position', array('1'=>'Main','2'=>'Footer'), Input::old('type_id'), array('class' => 'selectpicker  form-control', 'id' => 'MenuTypeId','placeholder'=>'Select Menu Position')) }}

                            </div>
                        </div>


                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">{{trans('english.ORDER')}}  :<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text('order_id', Input::old('order_id'), array('id'=> 'MenuSOrderId', 'class' => 'form-control integer-only','required')) }}


                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Open In New Tab  :<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                {{ Form::checkbox('_blank','_blank', Input::old('_blank'), array('id'=> 'MenuSOrderId')) }}


                            </div>
                        </div>


                        <div class="form-group"><label class="control-label col-xs-12 col-sm-3 no-padding-right" for="status-id">{!!trans('english.STATUS')!!} :</label>
                            <div class="col-md-6">
                                {!!  Form::select('status_id', array('1' => 'Active', '2' => 'Inactive'), Input::old('status_id'), array('class' => 'selectpicker form-control', 'id' => 'status-id'))!!}
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                <button type="button" class="btn btn-default cancel">{!!trans('english.CANCEL')!!}</button>
                            </div>
                        </div>
                        {!!   Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script type="text/javascript">



        $('#MenuTypeId').on("change", function() {

            if ($(this).val() == '') {
                $('.alterCategory').remove();
                return;
            }
            if ($(this).val() == 1) {
                $('.alterCategory').remove();
                var lavel = '<div class="alterCategory"> <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Category :<span class="text-danger">*</span></label>' +
                    '<div class="col-md-6">\n' +
                    ' {{ Form::select('category_slug',$parentCatList, null, array('class' => 'form-control',Input::old('parent_id'),'required','id' => 'parent_id')) }}\n' +
                    '\n' +
                    ' </div></div>'
                $(' #menu-chooser').append(lavel);
            }

            if ($(this).val() == 2) {
                $('.alterCategory').remove();
                var lavel = '<div class="alterCategory"> <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Internal Url :<span class="text-danger">*</span></label>' +
                    '<div class="col-md-6">\n' +
                    ' {{ Form::text('url', null, array('class' => 'form-control',Input::old('url'), 'id' => 'url','placeholder'=>'Please Enter Url','required')) }}\n' +
                    '\n' +
                    ' </div></div>'
                $(' #menu-chooser').append(lavel);
            }

        });


        $('#menuCreate').on("submit", function() {

            if ($('#MenuName').val() == '') {
                alert('Enter Menu Name');
                return false;
            }

            if ($('#MenuTypeId').val() == '0') {
                alert('Select Menu Type');
                return false;
            }


        });




    </script>
    @endsection