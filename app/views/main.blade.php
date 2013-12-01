<!DOCTYPE html>
<html lang="en">
<head>
	<title>Which Books Do I Get</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/bootstrap-responsive.min.css') }}
	{{HTML::style('css/bootstrap-theme.min.css')}}
	{{HTML::style('css/bootstrap-glyphicons.css')}}
	{{HTML::style('css/custom.css') }}
</head>
<body>

	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a href={{route('index')}} class="navbar-brand">Which Books Do I Get</a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::check())
						<li class="navbar-text">Welcome {{Auth::user()->username}}</li>
						<li><a href={{route('profile')}}>Profile</a></li>
						<li>
							<a href="{{route('cart')}}" class=" ">
								View Cart
								<span class="badge">
									@if(!Session::has('books'))
										0
									@else
										{{count(Session::get('books'))}}
									@endif
								</span>
							</a></li>
						<li><a href={{route('logout')}}>Logout</a></li>
						
						
					@else
						<li><a href={{route('login')}}>Login</a></li>
						<li><a href={{route('register')}}>Register</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			 @if(Session::has('flash_notice'))
				<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
			@endif
			@if(Session::has('flash_error'))
				<div id="flash_error">{{ Session::get('flash_error') }}</div>
			@endif
			@yield('content')
		</div>
	</div>

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>

