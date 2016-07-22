<li class="list-group-item">
	<i class="fa fa-arrows-alt"></i><a href="#task_{{$project->id}}_{{$task->id}}" data-toggle="collapse">
		{{$task->name}} <i class="text-muted">{{$task->state}}</i>
		<div class="pull-right">{{$task->user->name}}</div>
		<div class="progress">
			<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$task->precent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$task->precent}}%;"></div>
		</div>
	</a>

	<div class="timesheet collapse" id="task_{{$project->id}}_{{$task->id}}">
		<div class="timesheet-header">
			<div class="row">
				<div class="col-xs-6">				
					<i class="fa fa-dot-circle-o"></i> Target Start {{$task->target_start_datetime}}<br>
					<i class="fa fa-dot-circle-o"></i> Actual Start {{$task->actual_start_datetime or "-"}}
				</div>
				<div class="col-xs-6">
					<i class="fa fa-dot-circle-o"></i> Target End {{$task->target_end_datetime}}<br>
					<i class="fa fa-dot-circle-o"></i> Actual End {{$task->actual_end_datetime or "-"}}
				</div>
			</div>		
		</div>
		
		<ul class="list-group" style="margin-bottom:0">
			@if($task->timesheets()->count() > 0)
					@foreach($task->timesheets as $timesheet)
					<li class="list-group-item">{{$timesheet->description}}
						<i class="text-muted pull-right">{{$timesheet->datetime}}</i>
					</li>
					@endforeach
			@else
				<li class="list-group-item text-center text-muted">No Activity yet</li>
			@endif
		</ul>
	</div>
</li>
