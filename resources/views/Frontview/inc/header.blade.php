<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
        <link href="{{ asset('FrontEnd') }}/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome Icon -->
		<!--<link rel="stylesheet" href="C:\wamp64\www\sw-2\edusite\css\font-awesome.min.css">-->
        <link href="{{ asset('FrontEnd') }}/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom stlylesheet -->
		<!--<link type="text/css" rel="stylesheet" href="C:\wamp64\www\sw-2\edusite\css\style.css"/>-->

        <link href="{{ asset('FrontEnd') }}/css/style.css" rel="stylesheet">
		
		<script src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('FrontEnd') }}/js/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('FrontEnd') }}/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ asset('FrontEnd') }}/js/main.js"></script>
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
							@if(url('blog/#') )
							<a class="logo" href="{{route('postindex')}}">
							@else
						<a class="logo" href="postindex">
							@endif
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
						@if(!Auth::guest())
						
						<li> 	<div class="widget search-widget "style="width:250px; position:relative; top:6px; left:-150px;">
								<form action="{{ URL::to('/search') }}" method="POST" role="search">
									{{ csrf_field() }}
										<input class="input"  type="text" name="search" placeholder="Search..." >
										<button type="submit"  style="color:chocolate"><i class="fa fa-search"></i></button>
									</form>
								</div></li>
						
						@endif
						@if(!Auth::guest())
						@if(Auth::user()->user_type == 0)
						<li><a href="{{ url('/admin') }}">Admin Panel</a></li>
						@endif
						@endif
						@if ( url('blog/#') )
					<li><a href="{{ route('postindex') }}">Home</a></li>
						@else
						<li><a href="postindex">Home</a></li>
						@endif
						@if(!Auth::guest())
						@if ( url('blog/#') )
						<li><a href="{{ route('blog') }}">Blog</a></li>
						@else
						<li><a href="blog">Blog</a></li>
						@endif
						@if( url('blog/#') )
						<li><a href="{{route('likespage')}}">Likes</a></li>
						@else
						<li><a href="likespage">Likes</a></li>
						@endif
						@endif
						@if(!Auth::guest())
						<li><a href="contact">Contact</a></li>
						@endif
						<!-- Authentication Links -->
						@if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li style="background-color:black">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif	
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->
		@yield('body')
		

