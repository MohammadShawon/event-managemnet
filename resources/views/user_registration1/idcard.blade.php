@extends('layouts.default')
<style type="text/css">
   /* body {
            background-color: #d7d6d3;
            font-family:'verdana';
        }*/
        .id-card-holder {
            width: 225px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }
        .id-card-holder:after {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            border-radius: 0 5px 5px 0;
        }
        .id-card-holder:before {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            left: 222px;
            border-radius: 5px 0 0 5px;
        }
        .id-card {
            
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }
        .id-card img {
            margin: 0 auto;
        }
        .header img {
            width: 100px;
            margin-top: 15px;
        }
        .photo img {
            width: 80px;
            margin-top: 15px;
        }
        h2 {
            font-size: 15px;
            margin: 5px 0;
        }
        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }
        .qr-code img {
            width: 50px;
        }
        p {
            font-size: 5px;
            margin: 2px;
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

<!-- <a href="javascript:;" id="printIcon">
    <i class="fa fa-print" aria-hidden="true" style="font-size: 16px; color: #fff; background-color: #307ECC;">
    </i>
</a> -->
<?php
    
    //Request::segment(1)
?>
<div class="row">
    <div class="col-md-6">
        <a class="btn btn-link" href="@if(Request::segment(1)=='user-pre-registration') {{URL::to('user-pre-registration')}} @else {{URL::to('user-registration/create')}} @endif" style="color: #8B0000; font-size: 18px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
    </div>
    <div class="col-md-6">
        <p><button type="button" id="printIcon" class="btn btn-info pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print</button></p>
    </div>
</div>


                            <div class="id-card-tag"></div>
                            <div class="id-card-tag-strip"></div>
                            <div class="id-card-hook"></div>
                            <div class="id-card-holder">
                                <div class="id-card" id="IdCard">
                                    <div class="header">
                                        <!-- <img src="https://lh3.googleusercontent.com/-ebxWAGWvWg0/WTABBfdBv2I/AAAAAAAAAqw/qef78bVeIngorIsmAUD4tWVUd8WDvZyuQCEw/w140-h74-p/Untitled-2.png"> -->
                                    </div>
                                    
                                    <h4>{{$userInfo->name_prefix_name->name_prefix}} {{$userInfo->first_name}} {{$userInfo->last_name}} </h4>
                                    <div class="qr-code">
                                        <!-- {!! QrCode::size(120)->generate($userInfo->registration_number) !!} -->
                                        <?php //echo  DNS1D::getBarcodeSVG($userInfo->registration_number, "PHARMA2T",3,33) ;

                                        echo DNS1D::getBarcodeHTML($userInfo->registration_number, "C128",2.2,40);
                                        
                                        ?>
                                    </div>
                                    <div id="reg" style="letter-spacing: 20px; font-size: 14px; text-align: left; padding-top: 5px;">
                                        {{$userInfo->registration_number}}
                                    </div>
                                    
                                    <h3>www.onetikk.info</h3>
                                    <hr>
                                    <p><strong>"PENGG"</strong>HOUSE,4th Floor, TC 11/729(4), Division Office Road <p>
                                    <p>Near PMG Junction, Thiruvananthapuram Kerala, India <strong>695033</strong></p>
                                    <p>Ph: 9446062493 | E-ail: info@onetikk.info</p>

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
                var contents = $("#IdCard").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>ID Card</title>');
                frameDoc.document.write('</head><body style="text-align: center;"><h2 id="headH2" style="padding-top: 25px;">ID Card</h2>');
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