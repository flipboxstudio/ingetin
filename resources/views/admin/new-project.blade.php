<div class="modal fade" tabindex="-1" role="dialog" id="newProject">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create New Project</h4>
      </div>
      <div class="modal-body">
      	<form class="form">
			<div class="form-group">
				<label for="exampleInputEmail1">Project Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Project name">
			</div>
			<dir class="row" style="margin:0;padding:0">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Target Start</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Y-m-d H:i:s">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Target Finish</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Y-m-d H:i:s">
					</div>
				</div>
			</dir>
      	</form>
      	<h3>Select Teams</h3>
      	<ul class="list-group">
      		@foreach($users as $user)
      		<li class="list-group-item">
	      		<label>
		      		<input type="checkbox" name="teams[]" value="{{$user->id}}">
		      		{{$user->name}} <i class="text-muted">({{$user->email}})</i>
            </label>
            <input type="text" class="pull-right" placeholder="As">
      		</li>
      		@endforeach
      	</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Create New</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->