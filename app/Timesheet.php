<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['task_type', 'description', 'datetime'];

	/**
	 * The attributes that should be visible in arrays.
	 *
	 * @var array
	 */
	protected $visible = ['task','task_type', 'description', 'datetime'];

	/**
	 * Get the task record associated with the Timesheet.
	 */
	public function task()
	{
		return $this->belongsTo('App\Task');
	}
}
