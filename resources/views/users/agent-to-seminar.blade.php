@extends('layouts.default')

@section('style')
    {!! Html::style("public/assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.css") !!}
    {!! Html::style("public/assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
   <!--  {!! Html::style("public/assets/libs/data-table/datatables.min.css") !!} -->

@endsection


@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                Create New Seminar
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
                        Create New Seminar
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'post-agent-to-seminer', 'files'=> true, 'class' => 'form-horizontal')) }}

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="agent_id">Agent :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               <select class="form-control selectpicker" name="agent_id" id="agent_id" data-live-search="true">
                                   <option value="">Select Agent</option>
                                   @foreach($agentUser as $au)
                                    <option value="{{$au->id}}">{{$au->first_name}} {{$au->last_name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               <select class="form-control selectpicker" name="event_id" id="event_id" data-live-search="true">
                               <option value="">Select Event</option>
                                   @foreach($events as $ev)
                                    <option value="{{$ev->id}}">{{$ev->title}} @if($ev->status==1) (Active Event) @endif</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right" for="seminar_id">Seminar :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                               <select class="form-control selectpicker" name="seminar_id" id="seminar_id" data-live-search="true">
                                   <option value="">Select Seminar</option>
                                   @foreach($seminars as $sm)
                                    <option value="{{$sm->id}}">{{$sm->title}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-3 no-padding-right"></label>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary">{!!trans('english.UPDATE')!!}</button>
                            </div>
                        </div>

                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#agent_id',function(){
            var agentId = $(this).val();

             $.ajax({
                type: 'post',
                //url: '/get-agent-presnet-seminer',
                url: '{!! URL::to('get-agent-presnet-seminer') !!}',
                data: {
                  '_token': $('input[name=_token]').val(),
                  'agentId': agentId
                },
                success: function(data) {
                  //alert(data[0]['agent_id']);
                  $("#event_id").val(data[0]['event_id']).change();
                  $("#seminar_id").val(data[0]['seminar_id']).change();
                }
              });
        });
    });
   
</script>


@stop


