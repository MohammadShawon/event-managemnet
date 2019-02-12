@extends('layouts.default')



@section('content')

    <div class="small-header transition animated fadeIn">

        <div class="hpanel">

            <div class="panel-body">

                <h2 class="font-light m-b-xs">

                    <h3>Search User ID Card</h3>

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

                            <h3>{{trans('Search User ID Card')}}</h3>

                    </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-3"></div>

                                <div class="col-md-6">



                                {{ Form::open(array('role' => 'form', 'url' => 'user-pre-registration/search', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'userPreRegistration','name'=>'myform')) }}

                                    <div class="input-group">

                                    <!-- <input type="text" class="form-control" name="searchPreRegsterUser" required=""> -->

                                    {{ Form::text('searchPreRegsterUser', Input::old('searchPreRegsterUser'), array('id'=> 'searchPreRegsterUser', 'class' => 'form-control g-limit','required'=>'required','autofocus'=>'autofocus')) }}

                                    {{--<input type="text" class="form-control g-limit" id="searchPreRegsterUser" name="searchPreRegsterUser" required="required" autofocus="autofocus">--}}

                                      <span class="input-group-btn">

                                        <button class="btn btn-default" type="submit">Search!</button>

                                      </span>

                                    </div>



                                {!!   Form::close() !!}



                                </div>

                                <div class="col-md-3"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



    </div>




    <script type="text/javascript">

        $(document).ready(function(){
            //$("#searchPreRegsterUser").focus();
            //$('input[autofocus]').focus(); 

        });

        //jQuery('.event-form form .row:first-child .columns:first-child input').focus();

    </script>

@stop