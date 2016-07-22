<div class="headeing">
	<button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#newProject">New Projects</button>
	<h1>Projects</h1>
</div>

@foreach($projects as $idx => $project)
	@include('admin.project-item')
@endforeach

@include('admin.new-project')