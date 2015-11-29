<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sharemarket App</title>

	<!--<link href="<?php echo url('/css/app.css'); ?>" rel="stylesheet">-->
<link href="http://sharemarket.web360.co.in/css/app.css" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--<script src="<?php echo url('/js/jquery.js'); ?>"></script>-->
	<script src="http://sharemarket.web360.co.in/js/jquery.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo url('/', $parameters = array(), $secure = null); ?>"><b>Share Market</b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if(Auth::check())
				<ul class="nav navbar-nav">
					<!--<li><a href="<?php echo url('/eod'); ?>">EOD</a></li>-->
					<li><a href="<?php echo url('/users'); ?>">Users</a></li>
					<li><a href="<?php echo url('/subscriptions'); ?>">Subscriptions</a></li>
				</ul>
				@endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<!--<li><a href="<?php echo url('/auth/login'); ?>">Login</a></li>
						<li><a href="<?php echo url('/auth/register'); ?>">Register</a></li>-->
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo url('/auth/logout'); ?>">Logout</a></li>								
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->	
	<!--<script src="<?php echo url('/js/bootstrap.min.js'); ?>"></script>-->
	<!--<script src="<?php echo url('/js/app.js'); ?>"></script>-->
	<script src="http://sharemarket.web360.co.in/js/bootstrap.min.js"></script>
	<script src="http://sharemarket.web360.co.in/js/app.js"></script>	
</body>
</html>
