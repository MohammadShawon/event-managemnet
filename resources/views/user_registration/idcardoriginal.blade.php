@extends('layouts.default')
<style type="text/css">

.center {
    width: 528px;
    height: 369.6px;
    margin: auto;
    position: relative;
    border: 1px solid #d9d9d9;
    background-color: #fff;
    vertical-align: middle;
}

.center h3 {
    margin: 0;
    position: absolute;
    top: 30%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #job_title {
    margin: 0;
    position: absolute;
    top: 37%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #company_name {
    margin: 0;
    position: absolute;
    top: 44%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center .qr-code{
    margin: 0;
    position: absolute;
    top: 55%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #reg{
    margin: 0;
    position: absolute;
    top: 62%;
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
                        <p><button type="button" id="printIcon" class="btn btn-info pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print</button></p>
                    </div>
                </div>
                
                <div id="nothin">
                    <div class="center">
                      <h3>
                          {{$userInfo->name_prefix_name->name_prefix}} {{$userInfo->first_name}} {{$userInfo->last_name}}
                      </h3>
                      <h4 id="job_title">{{$userInfo->job_title}}</h4>
                      <h4 id="company_name">{{$userInfo->company_name}}</h4>

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
        </div>
    </div>

</div>

    <script type="text/javascript">
        
        $(document).ready(function(){

            $("#printIcon").click(function () {


                //var todayDate = $("#todayTime").val();
                var contents = $("#nothin").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>ID Card</title>');
                frameDoc.document.write('</head><body style="text-align: center;"><h2 id="headH2" style="padding-top: 25px;"></h2>');
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