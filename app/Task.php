<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * The attributes that should be visible in arrays.
	 *
	 * @var array
	 */
	protected $visible = ['id', 'project_id', 'project', 'name', 'target_start_datetime', 'actual_end_datetime', 'actual_start_datetime', 'target_end_datetime', 'precent', 'state'];
	/**
	 * Get the user record associated with the Task.
	 */
	public function user()
	{
		return $this->belongsto('App\User');
	}

	/**
	 * Get the project record associated with the Task.
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	/**
	 * Get the timesheets record associated with the Task.
	 */
	public function timesheets()
	{
		return $this->hasMany('App\Timesheet');
	}
}
