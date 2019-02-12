@extends('layouts.default')



@section('content')

    <div class="small-header transition animated fadeIn">

        <div class="hpanel">

            <div class="panel-body">

                <h2 class="font-light m-b-xs">

                    <h3>Event Attendance</h3>

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

                            <h3>{{trans('Event Attendance')}}</h3>

                    </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-3"></div>

                                <div class="col-md-6">



                                {{ Form::open(array('role' => 'form', 'url' => 'event-attendance/post-event-attendance', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'eventAttendance')) }}



                                    <div class="input-group">



                                    {{ Form::text('eventAttandenceRegNo', Input::old('eventAttandenceRegNo'), array('id'=> 'eventAttandenceRegNo', 'class' => 'form-control g-limit','autofocus'=>'autofocus','required'=>'required')) }}

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



        });

    </script>

@stop