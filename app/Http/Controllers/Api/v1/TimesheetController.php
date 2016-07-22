<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Carbon\Carbon;
use App\Timesheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;

class TimesheetController extends Controller
{
	/**
	 * list of timesheet
	 *
	 * @param Request $request
	 * @return json
	 */
	public function getList(Request $request)
	{
		$myId = Auth::guard('api')->user()->id;

		$timesheets = Timesheet::with('task.project')->whereHas('task', function($query) use ($myId) {
			$query->user_id = $myId;
		})->orderBy('datetime', 'DESC')->get();

		return ApiResponse::success('Timesheets', $timesheets->groupBy(function($model){
			return Carbon::parse($model->datetime)->format('Y-m-d');
		})->toArray());
	}
}
