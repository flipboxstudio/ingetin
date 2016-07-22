<div class="headeing">
	<h1>Teams</h1>
</div>

<ul class="list-group">	
@foreach($users as $user)
	<li class="list-group-item">{{$user->name}} <i class="text-muted">{{$user->email}}</i></li>
@endforeach
</ul>
