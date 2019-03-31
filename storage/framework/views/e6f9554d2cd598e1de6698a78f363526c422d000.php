<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Sportivo</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<!--<link type="text/css" rel="stylesheet" href="C:\wamp64\www\sw-2\edusite\css\bootstrap.min.css"/>-->
        <link href="<?php echo e(asset('FrontEnd')); ?>/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome Icon -->
		<!--<link rel="stylesheet" href="C:\wamp64\www\sw-2\edusite\css\font-awesome.min.css">-->
        <link href="<?php echo e(asset('FrontEnd')); ?>/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom stlylesheet -->
		<!--<link type="text/css" rel="stylesheet" href="C:\wamp64\www\sw-2\edusite\css\style.css"/>-->

        <link href="<?php echo e(asset('FrontEnd')); ?>/css/style.css" rel="stylesheet">
		
		<script src="<?php echo e(asset('js/app.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('FrontEnd')); ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo e(asset('FrontEnd')); ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo e(asset('FrontEnd')); ?>/js/main.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
	<!--<div id='preloader'><div class='preloader'></div></div>-->
		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index">
							<h2 style="color:floralwhite"><b>Sportivo</b></h2>
						</a>
					</div>
					<!-- /Logo -->
				

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>
			

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="index">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="blog">Blog</a></li>
						<li><a href="contact">Contact</a></li>
						<!-- Authentication Links -->
						<?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li style="background-color:black">
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>	
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

