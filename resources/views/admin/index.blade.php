@extends('layouts.base')
@section('title','Projects Manager')

@push('stylesheet')
	<style type="text/css">
		.progress{
			height: 5px;
		    margin-bottom: 0;
		    margin-top: 5px;
		}
		.headeing{
			margin-bottom: 20px;
			border-bottom:1px solid #ddd;
		}
		.timesheet{
			border-top:1px solid #ddd;
			margin-top: 10px;
			background: #f1f1f1;
			padding: 10px;
		}
		.timesheet-header{
			margin-bottom: 10px;
		}
		.new-task {
			padding:10px;
		}
	</style>
@endpush

@section('content')
	@include('layouts.header')

	<div class="row">
		<div class="col-xs-8">
			@include('admin.project')
		</div>
		<div class="col-xs-4">
			@include('admin.team')
		</div>
	</div>
@endsection

@push('javascript')
	<script type="text/javascript">
		$('.tab-user').click(function(){
			$(this).parent().find('button').removeClass('active');
			$(this).addClass('active');
			$(this).closest('.panel').find('#team').removeClass('hidden');
			$(this).closest('.panel').find('#task,#chart').addClass('hidden');
		});
		$('.tab-list').click(function(){
			$(this).parent().find('button').removeClass('active');
			$(this).addClass('active');
			$(this).closest('.panel').find('#task').removeClass('hidden');
			$(this).closest('.panel').find('#team,#chart').addClass('hidden');
		});
		$('.tab-chart').click(function(){
			$(this).parent().find('button').removeClass('active');
			$(this).addClass('active');
			$(this).closest('.panel').find('#chart').removeClass('hidden');
			$(this).closest('.panel').find('#task,#team').addClass('hidden');
		});

		$('.new-task .btn-add-new-task').click(function(){
			$(this).next().removeClass('hidden');
			$(this).addClass('hidden');
		});

		$('.cancel-add-task').click(function(){
			$(this).closest('.new-task').find('.btn-add-new-task').removeClass('hidden').next().addClass('hidden');
		});
	</script>
@endpush
