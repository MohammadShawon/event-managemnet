<?php
    //$siteInfo = \App\Settings::all();
?>
<head>
<meta charset="utf-8">
<title>{{$siteInfo[0]->site_title}}</title>
<!-- Stylesheets -->
<link href="{!! asset('frontend/css/bootstrap.css')!!}" rel="stylesheet">
<link href="{!! asset('frontend/css/revolution-slider.css')!!}" rel="stylesheet">
<link href="{!! asset('frontend/css/style.css')!!}" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="{{URL::to('/')}}/{{$siteInfo[0]->favicon}}" type="image/x-icon">
<link rel="icon" href="{{URL::to('/')}}/{{$siteInfo[0]->favicon}}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{!! asset('frontend/css/responsive.css')!!}" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>