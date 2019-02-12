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
                Update Question
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
                        Update Question
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'website-management/post-edit-question', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'sponsorManagementCreate')) }}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <select name="event_id" class="form-control selectpicker">
                                    <option value="">Select Event</option>
                                        @foreach($events as $ev)
                                            <option value="{{$ev->id}}" @if($ev->id==$question->event_id) {{'selected'}} @endif>{{$ev->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Question :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('questions', $question->questions, array('id'=> 'questions', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>
                        
                    @foreach($question->answers_of_question as $qstans)
                        <div class="form-group removeDiv"><label class="control-label col-md-4 no-padding-right" for="floor_plan_image">Answers</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="answers[]" id="answers" value="{{$qstans->answer}}">
                            </div>
                            <div class="col-md-1">
                                <!--<input type="button" class="form-control btn-danger" name="button" id="addAnswerButton" value="Remove">-->
                                <!--<a href="#" id="">-->
                                    <button class="form-control btn btn-xs btn-danger removeAns">Remove</button>
                                <!--</a>-->
                            </div>
                        </div>
                    @endforeach
                    
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Order No :<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                {{ Form::text('order_no', $question->order_no, array('id'=> 'order_no', 'class' => 'form-control g-limit','required'=>'required')) }}
                            </div>
                        </div>
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Multiple Answer :</label>
                            <div class="col-md-5">
                                <input type="checkbox" name="multiple_answer" id="multiple_answer" value="1" @if($question->multiple_answer==1) {{'checked'}} @endif>
                            </div>
                        </div>

                        <!-- <div id=""></div> -->
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-5">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>
                        
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                       
                        <div class="form-group">
                            <div class="col-md-7 col-sm-offset-2">
                                <a href="{{URL::to('website-management/question-list')}}" class="btn btn-default cancel pull-right" >{!!trans('english.CANCEL')!!}</a>
                                
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                                
                            </div>
                        </div>
    
                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(".removeAns").click(function () {
        $(this).closest('.removeDiv').remove();
    });
</script>
@stop

