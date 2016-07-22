@push('stylesheet')
	<style type="text/css">
		nav{padding:10px;}
		nav *{display: inline}
		nav img{width: 40px;}
	</style>
@endpush

<nav>
	<img src="{{asset('logo.png')}}"> <h3>Ingetin! <small>Timesheet</small></h3>
	<a class="btn btn-primary pull-right" href="{{URL::to('logout')}}">Logout</a>
</nav>