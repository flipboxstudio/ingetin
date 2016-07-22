<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	 * The attributes that should be visible in arrays.
	 *
	 * @var array
	 */
	protected $visible = ['id', 'name'];
	
	/**
	 * Get the teams record associated with the Project.
	 */
	public function teams()
	{
		return $this->hasMany('App\Team');
	}

	/**
	 * Get the tasks record associated with the Team.
	 */
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}

	/**
	 * current user
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeCurrentUser($query)
	{
		$currentUserId = Auth::guard('api')->user()->id;

		return $query->whereHas('teams', function($query) use ($currentUserId) {
			$query->where('teams.user_id', $currentUserId);
		});
	}
}
