@if($question['question_type']==2)
    <div class="qustion">নিচের অডিও টি শুনুন, অডিও শেষ হলে উত্তর দিন।</div>
@elseif($question['question_type']==3)
    <div class="qustion">নিচের ভিডিও টি দেখুন, ভিডিও শেষ হলে উত্তর দিন।</div>

@else
    <div class="qustion">{{ $question['question'] }}</div>
@endif
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 gap2 "></div>
    </div>
<div class="row">
{{--    @if($question['question_type']==2 || $question['question_type']==3) style="display:none;" @endif--}}
@if($question['question_type']==1)
<div class="col-md-4 col-xs-12 col-sm-3 col-md-offset-3 image">
    <img src="{!! asset($question['media']['name']) !!}" alt="">
</div>
@elseif($question['question_type']==2)
        <div class="col-md-6 col-xs-12 col-sm-3 col-md-offset-3">

        <audio id="audio" width="320" height="240" controls>
        <source src="{!! asset($question['media']['name']) !!}" type="video/mp4">

    </audio>
            <div id="question" @if($question['question_type']==2 || $question['question_type']==3) style="display:none;" @endif ><h4>{{ $question['question'] }}</h4></div>

        </div>
@elseif($question['question_type']==3)
        <div class="col-md-6 col-xs-12 col-sm-3 col-md-offset-3">

        <video id="video" class="afterglow" width="500" height="240"  preload="none">
            <source src="{!! asset($question['media']['name']) !!}"  type="video/mp4" data-quality="hd" />

        </video>
            <div id="question" @if($question['question_type']==2 || $question['question_type']==3) style="display:none;" @endif><h4>{{ $question['question'] }}</h4></div>

        </div>

@endif
</div>
@if($question['answerType']==1)
    <div class="row" id="audVid" @if($question['question_type']==2 || $question['question_type']==3) style="display:none;" @endif>
        <div class="col-md-6 col-xs-12 col-sm-12 col-md-offset-3 gap2">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <button class="qu-1 btn-answer-opt optA" id="opt1" value="1">{{  $question['option_1'] }}</button>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 gap2"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <button class="qu-2 btn-answer-opt optB" id="opt2" value="2">{{  $question['option_2'] }}</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 gap2"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <button class="qu-3 btn-answer-opt" id="opt3" value="3">{{  $question['option_3'] }}</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 gap2"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <button class="qu-4 btn-answer-opt" id="opt4" value="4">{{  $question['option_4'] }}</button>
                </div>
            </div>

        </div>
    </div>

    @elseif($question['answerType']==2)
        <div class="row" id="audVid" @if($question['question_type']==2 || $question['question_type']==3) style="display:none;" @endif>
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 gap-2 "></div>
    </div>
   <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 col-md-offset-3">
            <div  id="opt2" style="padding:5px;"><img
                        src="{{ asset( $question['option1']['name']) }}" alt="" style="height: 108px; width:100%" class="qu-2 btn-answer-opt-img optB opt1" id="1"></div>
        </div>

        <div class="col-md-3 col-xs-12 col-sm-3 ">
            <div  id="opt2" style="padding:5px;"><img
                        src="{{ asset( $question['option2']['name']) }}" alt="" style="height: 108px; width:100%" class="qu-2 btn-answer-opt-img optB opt2" id="2"></div>
        </div>
   </div>
    <!--first Answer row end-->
    <div class="row">
        <div class="col-md-12 col-sm-12 gap-3 "></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-3 col-md-offset-3">
            <div  id="opt3" style="padding:5px;"><img
                        src="{{ asset( $question['option3']['name']) }}" alt="" style="height: 108px; width:100%" class="qu-3 btn-answer-opt-img opt3"  id="3"></div>
        </div>

        <div class="col-md-3 col-xs-12 col-sm-3">
            <div id="opt4" style="padding:5px;"><img
                        src="{{ asset( $question['option4']['name']) }}" alt="" style="height: 108px; width:100%" class="qu-4 btn-answer-opt-img opt4"  id="4"></div>
        </div>
    </div>
  <!--first Answer row end-->
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 gap-3 "></div>
    </div>
    </div>
        </div>
    @endif
