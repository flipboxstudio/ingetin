<div class="new-task">
	<button class="btn btn-block btn-default btn-add-new-task"><i class="fa fa-plus"></i>Add New Task</button>

	<div class="row hidden">
		<div class="col-xs-5">
			<input type="text" name="name" class="form-control" placeholder="Task Name">
		</div>

		<div class="col-xs-2 text-center"><i class="fa fa-arrow-right fa-2x"></i></div>

		<div class="col-xs-5">
			<select name="user" class="form-control">
				<option></option>
				@foreach($project->teams as $team)
				<option value="{{$team->user->id}}">{{$team->user->name}} as {{$team->as}}</option>
				@endforeach
			</select>
		</div>

		<div class="col-xs-12">
			<div class="text-right" style="padding: 10px;background: #f1f1f1;margin-top: 15px;">
				<div class="row">
					<div class="col-xs-4">
						<input type="text" name="start" class="form-control" placeholder="Start DateTime">
					</div>
					<div class="col-xs-4">
						<input type="text" name="finish" class="form-control" placeholder="Finsih DateTime">
					</div>
					<div class="col-xs-4">
						<button class="btn btn-xs btn-default cancel-add-task">Cancel</button>
						<button class="btn btn-xs btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
