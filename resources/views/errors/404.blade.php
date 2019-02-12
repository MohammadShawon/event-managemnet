
<!DOCTYPE HTML>
<html>
<head>
	<?php
    $settings=\App\Settings::find(1);
    ?>
	<title>{!! $settings->site_title !!}</title>
	<link rel="shortcut icon" href="{!! asset($settings->favicon) !!}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="{!! asset('public/frontend/css/style.css') !!}" rel="stylesheet">
</head>
<body>
	<!-----start-wrap--------->
	<div class="wrap">
		<!-----start-content--------->
		<div class="content">
			<!-----start-logo--------->
			<div class="logo">
				<h1><a href="#"><img src="{!! asset('public/frontend/images/404/logo.png') !!}"/></a></h1>
				<span><img src="{!! asset('public/frontend/images/404/signal.png') !!}"/>{!! trans('bangla.OPPS') !!}  {!! trans('bangla.NOTFOUND') !!}</span>
			</div>
			<!-----end-logo--------->
			<!-----start-search-bar-section--------->
			<div class="buttom">
				<div class="seach_bar">
					<p>{!! trans('bangla.YOU') !!} <span><a href="{!! url('/') !!}">{!! trans('bangla.HOME') !!}</a></span> {!! trans('bangla.404SEARCH2') !!}</p>
					<!-----start-sear-box--------->
					<div class="search_box">
						<form action="{!! url('search') !!}" method="get" class="dropdown-menu pull-right" >
							<input name="quizName" type="text" placeholder="@if(Session::has('error')){{ Session::get('error') }} @else {!! trans('bangla.SEARCH'). ' ' .trans('bangla.DO') !!}  @endif" required="required"><input type="submit" value="">

				    </form>
					 </div>
				</div>
			</div>
			<!-----end-sear-bar--------->
		</div>
		<!----copy-right-------------->

	</div>
	
	<!---------end-wrap---------->
</body>
</html>