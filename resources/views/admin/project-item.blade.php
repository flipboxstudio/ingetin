<div class="panel panel-success">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-10">
				<a href="#body-{{$project->id}}" data-toggle="collapse">
					{{$project->name}}
				</a>
			</div>
			<div class="col-xs-2">
				<div class="text-right">
					<button class="btn btn-xs btn-success tab-list active"><i class="fa fa-th-list"></i></button>
					<button class="btn btn-xs btn-success tab-user"><i class="fa fa-users"></i></button>
					<button class="btn btn-xs btn-success tab-chart"><i class="fa fa-bar-chart"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div class="panel-content collapse {{$idx==0 ? "in" : ""}}" id="body-{{$project->id}}">
		<div id="task">
			@if($project->tasks()->count() == 0)
				<div class="panel-body text-center text-muted">
					<i class="fa fa-ban"></i> No Task Yet
				</div>
			@else
				<ul class="list-group" style="margin-bottom:0px">
					<li class="list-group-item"><b>Project's Task</b></li>
				@foreach($project->tasks()->orderBy('index', 'ASC')->get() as $task)
					@include('admin.task-item')
				@endforeach
				</ul>
			@endif
				@include('admin.new-task')
		</div>
		<div id="team" class="hidden">
			<ul class="list-group">
				<li class="list-group-item"><b>Teams of Projects</b></li>
				@foreach($project->teams as $team)
				<li class="list-group-item">{{$team->user->name}} as <i class="text-muted">{{$team->as}}</i></li>
				@endforeach
			</ul>
		</div>
		<div id="chart" class="hidden">
			<div class="text-center text-muted" style="padding:60px 0;">
				<i class="fa fa-pie-chart" style="font-size:150px;"></i>
				<h1>Report Project Area</h1>
			</div>
		</div>
	</div>
</div>
