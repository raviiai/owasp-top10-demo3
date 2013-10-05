<!DOCTYPE html>
<html>
	<head>
		<title>OWASP Bank of Death</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="/css/layout.css" rel="stylesheet" media="screen">
		<link href="/css/typography.css" rel="stylesheet" media="screen">
	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::route('home') }}">Bank of Death</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
					</ul>
					@if (Auth::user())
					<ul class="nav navbar-nav pull-right">
						<li>{{ HTML::linkRoute('users.show', Auth::user()->name, Auth::user()->id) }}</a></li>
						<li>
							{{ Form::open(['route' => 'logout']) }}
							<button class="link">Log out</button>
							{{ Form::close() }}
						</li>
					</ul>
					@endif
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<div class="container">

			@yield('content')

		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="/js/jquery-2.0.3.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
	</body>
</html>
