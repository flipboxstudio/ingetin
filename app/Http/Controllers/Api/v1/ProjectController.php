<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
	/**
	 * get list of project
	 *
	 * @param Request $request
	 * @return json
	 */
	public function getList(Request $request)
	{
		$projects = Project::currentuser()->get();
		$data = [];

		foreach ($projects as $project) {
			$data[] = [
				'id' => $project->id,
				'name' => $project->name,
				'as' => $this->getAs($project),
				'task' => $this->getTasks($project),
			];
		}

		return $data;
	}

	/**
	 * get as form project
	 *
	 * @param Project $project
	 * @return string
	 */
	protected function getAs(Project $project)
	{
		$myId = Auth::guard('api')->user()->id;
		
		return $project->teams()->whereUserId($myId)->first()->as;
	}

	/**
	 * get task from project
	 *
	 * @param Project $project
	 * @return array
	 */
	protected function getTasks(Project $project)
	{
		$myId = Auth::guard('api')->user()->id;

		$tasks = $project->tasks()->whereUserId($myId)->orderBy('tasks.index', 'ASC')->get();
		return [
			'count' => $tasks->count(),
			'data' => $tasks->toArray(),
		];
	}
}
