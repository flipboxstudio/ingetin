<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	/**
	 * get index
	 *
	 * @param Request $request
	 * @return response view
	 */
	public function getIndex(Request $request)
	{
		$data = [
			'projects' => Project::get(),
			'users' => User::whereRole('user')->get(),
		];

		return view('admin.index')->with($data);
	}
}
