@extends('layouts.default')
<style type="text/css">

.center {
    width: 100%;
    height: 497px;
    margin: auto;
    position: relative;
    /*border: 1px solid #d9d9d9;
    background-color: #fff;*/
    vertical-align: middle;
}

.center h3 {
    margin: 0;
    position: absolute;
    top: 40%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #job_title {
    margin: 0;
    position: absolute;
    top: 48%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #company_name {
    margin: 0;
    position: absolute;
    top: 52%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center .qr-code{
    margin: 0;
    position: absolute;
    top: 60%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #reg{
    margin: 0;
    position: absolute;
    top: 65%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}



</style>

@section('content')

<div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>User ID card</h3>
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
                            <h3>{{'User ID card'}}</h3>
                    </div>
                <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-link" href="@if(Request::segment(1)=='user-pre-registration') {{URL::to('user-pre-registration')}} @else {{URL::to('user-registration/create')}} @endif" style="color: #8B0000; font-size: 18px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
                    </div>
                    <div class="col-md-6">
                        {{--<p><button type="button" id="printIcon" class="btn btn-info pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print</button></p>--}}
                    </div>
                </div>
<?php
    if($userInfo->visitor_type==2 && !empty($userInfo->team_id)){
        $visitors = \App\UserRegistration::where('team_id','=',$userInfo->team_id)->get();
    }else{
        $visitors = \App\UserRegistration::where('id','=',$userInfo->id)->get();
    }
?>
        @foreach($visitors as $vs)
        <?php
            $userInfo = \App\UserRegistration::find($vs->id);
        ?>
            <div class="col-md-6">
                <p style="text-align: center; margin-top:12px !important; margin-bottom: -15px;">
                    <button type="button" id="printIcon" class="btn btn-info printIcon"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                </p><br>
                <div id="nothin">
                    <div class="center" style="background-image: url('{{ asset('public/uploads/idcard-background-image/Visitor-ID-Card.png') }}'); background-repeat: no-repeat; width:100%; height: 497px; background-position: center;">
                        <div id="divHeight">
                          <h3>
                              {{$userInfo->name_prefix_name->name_prefix}} {{$userInfo->first_name}} {{$userInfo->last_name}}
                          </h3>

                          <span id="job_title">{{$userInfo->job_title}}</span><br>
                          <span id="company_name">{{$userInfo->company_name}}</span><br><br>
                          <div class="qr-code">
                                <?php
                                    echo DNS1D::getBarcodeSVG($userInfo->registration_number, "C128",2.2,40);
                                ?>
                          </div>
                            <div id="reg" style="letter-spacing: 20px; font-size: 14px; text-align: center; padding-top: 5px;">
                                {{$userInfo->registration_number}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

                </div>
            </div>
        </div>
    </div>

</div>

    <script type="text/javascript">

        $(document).ready(function(){

            $(".printIcon").click(function () {

                //var todayDate = $("#todayTime").val();
                var contents = $(this).closest('div').find('#nothin').html();
                // var contents = $("#nothin").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title></title>');
                frameDoc.document.write('</head><body style="text-align: center;"><div style="width: 355px; height: 451px; margin-left: -40px !important; margin-right: 10px !important; margin-top: 100px !important;">');
                //Append the external CSS file.
                frameDoc.document.write('<link href="{{ url('public/css/printcsslemo/lemonpring.css')}}" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);

            });
        });

    </script>

@stop