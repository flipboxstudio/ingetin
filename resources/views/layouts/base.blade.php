<!DOCTYPE html>
<html>
<head>
	<title>Ingetin | @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<style type="text/css">
		body{
			background: url({{asset('images/bg.jpg')}});
			background-size: cover;
		}
	</style>
	@stack('stylesheet')
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap.min.js')}}"></script>
	@stack('javascript')
</body>
</html>