<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	/**
	 * Get the project record associated with the Team.
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	/**
	 * Get the user record associated with the Team.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
