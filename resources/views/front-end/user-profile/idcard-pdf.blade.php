
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">

.center {
    /*width: 528px;
    height: 369.6px;*/
    width: 100%;
    height: 497px;
    margin: auto;
    position: relative;
    /*border: 1px solid #d9d9d9;*/
    /*background-color: #fff;*/
    vertical-align: middle;

}

.center h3 {
    margin: 0;
    position: absolute;
    top: 20%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #job_title {
    margin: 0;
    position: absolute;
    top: 22%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #company_name {
    margin: 0;
    position: absolute;
    top: 24%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center .qr-code{
    margin: 0;
    position: absolute;
    top: 28%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.center #reg{
    margin: 0;
    position: absolute;
    top: 30.5%;
    left: 50%;
    color: #000;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

</style>
</head>
<body>

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-body">

                                <div id="nothin">
                                    <div class="center" style="background-image: url('{{ asset('public/uploads/idcard-background-image/Visitor-ID-Card.png') }}'); background-repeat: no-repeat; background-size: 100%; background-position: center;">
                                      <h3>
                                          {{$userInfo->name_prefix_name->name_prefix}} {{$userInfo->first_name}} {{$userInfo->last_name}}
                                      </h3>
                                      <h4 id="job_title">{{$userInfo->job_title}}</h4>
                                      <h4 id="company_name">{{$userInfo->company_name}}</h4>

                                      <div class="qr-code">
                                            <?php
                                                echo DNS1D::getBarcodeHTML($userInfo->registration_number, "C128",2.2,40);
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

</body>
</html>
