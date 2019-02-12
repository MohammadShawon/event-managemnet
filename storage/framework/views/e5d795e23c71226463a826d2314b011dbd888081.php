
<!DOCTYPE HTML>
<html>
<head>
	<?php
    $settings=\App\Settings::find(1);
    ?>
	<title><?php echo $settings->site_title; ?></title>
	<link rel="shortcut icon" href="<?php echo asset($settings->favicon); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo asset('public/frontend/css/style.css'); ?>" rel="stylesheet">
</head>
<body>
	<!-----start-wrap--------->
	<div class="wrap">
		<!-----start-content--------->
		<div class="content">
			<!-----start-logo--------->
			<div class="logo">
				<h1><a href="#"><img src="<?php echo asset('public/frontend/images/404/logo.png'); ?>"/></a></h1>
				<span><img src="<?php echo asset('public/frontend/images/404/signal.png'); ?>"/><?php echo trans('bangla.OPPS'); ?>  <?php echo trans('bangla.NOTFOUND'); ?></span>
			</div>
			<!-----end-logo--------->
			<!-----start-search-bar-section--------->
			<div class="buttom">
				<div class="seach_bar">
					<p><?php echo trans('bangla.YOU'); ?> <span><a href="<?php echo url('/'); ?>"><?php echo trans('bangla.HOME'); ?></a></span> <?php echo trans('bangla.404SEARCH2'); ?></p>
					<!-----start-sear-box--------->
					<div class="search_box">
						<form action="<?php echo url('search'); ?>" method="get" class="dropdown-menu pull-right" >
							<input name="quizName" type="text" placeholder="<?php if(Session::has('error')): ?><?php echo e(Session::get('error')); ?> <?php else: ?> <?php echo trans('bangla.SEARCH'). ' ' .trans('bangla.DO'); ?>  <?php endif; ?>" required="required"><input type="submit" value="">

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