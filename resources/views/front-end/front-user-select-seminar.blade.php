@extends('front-end.layouts.master')

@section('style')
    
    <style type="text/css">
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
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.forcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.forcheck input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.forcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.forcheck .checkmark:after {
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
    </style>

@endsection

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Seminar list</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Seminar list</li>
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

            <form id="contact-form" name="contact_form" class="default-form" action="{{URL::to('front/seminar-select-post')}}" method="post">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Select Seminer To Register Seminer</h1>
                    
                    
                        <div class="col-md-6">
                            <div style="margin-top: 10%;">
                            @foreach($seminerInfo as $si)
                                <label class="forcheck">{{$si->title}} <br> <span style="font-size: 12px; color: #e6296a;"> {{date('h:i A, M d, Y',strtotime($si->start_date))}} {{'TO'}} {{date('h:i A, M d, Y',strtotime($si->end_date))}} </span>
                                  <input type="checkbox" value="{{$si->id}}" name="seminer_id[]">
                                  <span class="checkmark"></span>
                                </label>
                            @endforeach
                            </div>
                        </div>
                    <?php $user_id = Crypt::decrypt(Request::segment(3));?>
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                    <div class="link-btn text-center" style="margin-bottom: 2%; margin-top: 2%;">
                        <button class="btn-style-two" type="submit" data-loading-text="Please wait...">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


