<?php
    $siteInfo = \App\Settings::all();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>{{$siteInfo[0]->site_title}}</title>
        <link rel="shortcut icon" href="{{URL::to('/')}}/{{$siteInfo[0]->favicon}}">
        <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/metisMenu/dist/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/animate.css/animate.css')}}">
        <link rel="stylesheet" href="{{ url('vendor/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('fonts/pe-fa fa-7-stroke/css/pe-fa fa-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ url('fonts/pe-fa fa-7-stroke/css/helper.css')}}">
        <link rel="stylesheet" href="{{ url('styles/style.css')}}">







    </head>
    <body class="blank">

        <!-- Simple splash screen-->
        <div class="splash"> 
            <div class="color-line"></div>
            <div class="splash-title"><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" class="rotating123" width="64" height="64" /><h1 class="mm-group-text"><b>{{$siteInfo[0]->site_title}}</b></h1><p></p> </div> </div>
        <div class="login-container l-panel">
            <div class="row">
                <div class="col-md-12 col-md-offset-1 login-logo">
                    <img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" width="300" height="120" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="hpanel">
                        <div class="panel-body">

                            @if(Session::has('error'))
        <div class='alert alert-danger alert-dismissable'>
           <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-remove-sign'></i>
          {{ Session::get('error') }}
        </div>
        @endif
                            {!! Form::open(array('url' => 'login', 'class' => 'validate-form', 'autocomplete'=>'off')) !!}

                            <div class="form-group">
                                <label class="control-label" for="username">{{trans('english.USERNAME')}}</label>
                                <input type="text" id="login-username" name="username" class="form-control" placeholder="Username" autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">{{trans('english.PASSWORD')}}</label>
                                <input type="password" id="login-password" name="password" class="form-control" placeholder="Your password..">
                                
                            </div>
                            <button class="btn btn-success btn-block">{{trans('english.SIGN_IN')}}</button>
                            {!! Form::close() !!}
                        </div>
                        <!--                        <div class="panel-footer text-center">
                                                    Foregot password
                                                </div>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center copy">
                    Copyright &copy; <?php echo date('Y'); ?> <a href="http://event.dhakaapps.com/" target="_blank">{{$siteInfo[0]->site_title}}</a>
                </div>
            </div>
        </div>


        <!-- Vendor scripts -->
        <script rel="javascript" src=" {{ url('vendor/jquery/dist/jquery.min.js') }}"></script>
        <script rel="javascript" src="  {{ url('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
        <script rel="javascript" src="  {{ url('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script rel="javascript" src="   {{ url('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script rel="javascript" src="  {{ url('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
        <script rel="javascript" src="   {{ url('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/iCheck/icheck.min.js') }}"></script>
        <script rel="javascript" src="   {{ url('vendor/sparkline/index.js') }}"></script>
        <script rel="javascript" src=" {{ url('scripts/homer.js') }}"></script>

    </body>

</html>
<style>
    .copy a:hover{
        text-decoration: underline;
    }
    .copy a:visited {
        color: green;
    }
</style>






