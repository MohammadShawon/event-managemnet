@extends('front-end.layouts.master')

@section('style')

    <style type="text/css">

    /*for check box=======================*/
  .forcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.forcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmarkche {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.forcheck:hover input ~ .checkmarkche {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.forcheck input:checked ~ .checkmarkche {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmarkche:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.forcheck input:checked ~ .checkmarkche:after {
    display: block;
}

/* Style the checkmark/indicator */
.forcheck .checkmarkche:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
/*end chekboxstyle===========================*/

    .forradio {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.forradio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.forradio:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.forradio input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.forradio input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.forradio .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}
    </style>

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Question List</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Question List</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--single-speaker Style-->
    <section class="single-speaker">
        <div class="container">
        @include('layouts.flash')
            <div class="row">

            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/question-answer-post')}}" method="post">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Please Answer All The Question</h1>

                    <?php $qlsl = 1; ?>
                    @foreach($questionsList as $ql)

                    @if($ql->multiple_answer==1)

                        <div class="col-md-4">
                            <div style="margin-top: 10%;">
                            <h4>{{$qlsl}}. {{$ql->questions}}</h4><br>
                            @foreach($ql->answers_of_question as $ans)
                            <label class="forcheck">{{$ans->answer}}
                              <input type="checkbox" name="answer{{$ql->id}}[]" value="{{$ans->question_id.','.$ans->id}}">
                              <span class="checkmarkche"></span>
                            </label>
                            @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-md-4">
                            <div style="margin-top: 10%;">
                            <h4>{{$qlsl}}. {{$ql->questions}}</h4><br>
                            @foreach($ql->answers_of_question as $ans)
                            <label class="forradio">{{$ans->answer}}
                              <input type="radio" name="answer{{$ql->id}}" value="{{$ans->question_id.','.$ans->id}}">
                              <!--<input type="radio" name="answer{{$ql->id}}" value="{{$ans->question_id.','.$ans->id}}" required="">-->
                              <span class="checkmark"></span>
                            </label>
                            @endforeach
                            </div>
                        </div>
                    @endif
                    <?php $qlsl++; ?>
                    @endforeach

                    <?php $user_id = Crypt::decrypt(Request::segment(3));?>
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>

        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="">
                    <input type="checkbox" name="" value=""> I have read, understood and consent to your privacy policy <span style="color: red">*</span>
                </div>

                <div class="link-btn pull-left col-md-2" style="margin-bottom: 2%; margin-top: 2%;">
                        <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Register</button>
                </div>
                <div class="col-md-3"></div>
                <div class="link-btn col-md-1" style="margin-bottom: 2%; margin-top: 2%;">
                        <button class="btn-style-two" type="reset" data-loading-text="Please wait...">Reset</button>
                </div>
            </div>
        </div>
                </form>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


