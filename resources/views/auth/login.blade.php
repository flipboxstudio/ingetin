@extends('layouts.base')
@section('title', 'Login')

@push('stylesheet')
	<style type="text/css">
		section {
			margin-top: 200px;
		}
		section .header img{
			width: 50px;
		}
		section .header h1{
			margin-top: -10px;
			font-size: 80px;
			display: block;
			padding-bottom: 20px;
		}
		section .header h1 small{
			font-size: 20px;
			float: right;
			position: relative;
			right: 50px;
		}
		section .body{
			border-radius: 8px;
			border:1px solid #ddd;
			background:#fff;
			padding:20px;

		}
	</style>
@endpush

@section('content')
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4">
			<section>
				<div class="header text-center">
					<img src="{{asset('logo.png')}}">
					<h1>Ingetin! <small>Timesheet</small></h1>
				</div>
				<div class="body">
					<form class="form" method="post">
						@if (isset($errors) AND count($errors) > 0)
							<p class="text-danger text-center">{{$errors->first()}}</p>
						@endif

						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
					    	<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{old('email')}}">
						</div>
						<div class="form-group">
					    	<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
						<div class="form-group">
					    	<button type="submit" class="btn btn-default">Sign in</button>
					  	</div>
					</form>
				</div>
			</section>
		</div>
	</div>
@endsection