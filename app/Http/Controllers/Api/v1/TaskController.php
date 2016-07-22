<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use App\Task;
use App\Timesheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;

class TaskController extends Controller
{
	/**
	 * start task
	 *
	 * @param Request $request
	 * @param string $id
	 * @return json
	 */
	public function putStart(Request $request, $id)
	{
		$myId = Auth::guard('api')->user()->id;

		$task = Task::whereId($id)->whereUserId($myId)->whereState('waiting')->first();

		if (is_null($task)) {
			return ApiResponse::error('Can not found any task', null, 400);
		}

		$task->actual_start_datetime = date('Y-m-d H:i:s');
		$task->state = 'ongoing';
		$task->precent = '0';
		$task->save();

		//create new timehseet
		$description = "Start task {$task->name}";
		$task->timesheets()->save(new Timesheet([
			'start_type' => 'start',
			'description' => $description,
			'datetime' => date('Y-m-d H:i:s')
		]));

		return ApiResponse::success('Task has been stated', $task->toArray());
	}

	/**
	 * start task
	 *
	 * @param Request $request
	 * @param string $id
	 * @return json
	 */
	public function putUpdate(Request $request, $id)
	{
		$myId = Auth::guard('api')->user()->id;

		$task = Task::whereId($id)->whereUserId($myId)->whereState('ongoing')->first();

		if (is_null($task)) {
			return ApiResponse::error('Can not found any task', null, 400);
		}

		$task->precent = $request->progress;
		$task->save();
		
		//create timesheet
		$description = "Update task {$task->name} on progress {$request->progress}%";
		$task->timesheets()->save(new Timesheet([
			'start_type' => 'update',
			'description' => $description,
			'datetime' => date('Y-m-d H:i:s')
		]));

		return ApiResponse::success('Task has been updated', $task->toArray());	}

	/**
	 * start task
	 *
	 * @param Request $request
	 * @param string $id
	 * @return json
	 */
	public function putFinish(Request $request, $id)
	{
		$myId = Auth::guard('api')->user()->id;

		$task = Task::whereId($id)->whereUserId($myId)->whereState('ongoing')->first();

		if (is_null($task)) {
			return ApiResponse::error('Can not found any task', null, 400);
		}

		$task->actual_end_datetime = date('Y-m-d H:i:s');
		$task->state = 'finish';
		$task->precent = '100';
		$task->save();
		
		//create timesheet
		$description = "Finish task {$task->name}";
		$task->timesheets()->save(new Timesheet([
			'start_type' => 'finish',
			'description' => $description,
			'datetime' => date('Y-m-d H:i:s')
		]));

		return ApiResponse::success('Task has been finished', $task->toArray());
	}
}
