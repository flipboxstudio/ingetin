<?php

namespace App\Http\Controllers\Api\v1;

use Hash;
use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;

class AuthController extends Controller
{
	/**
	 * me
	 *
	 * @param Request $request
	 * @return json
	 */
	public function me(Request $request)
	{
		$user = Auth::guard('api')->user();

		return ApiResponse::success('Data me', $user->toArray());
	}

	/**
	 * user login
	 *
	 * @param Request $request
	 * @return json
	 */
	public function login(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);
		
		if ($validate->fails()){
			return ApiResponse::error($validate->errors()->first(), null, 400);
		}

		if (Auth::validate(array_merge($request->only(['email', 'password']), ['role'=>'user']))) {
			$user = User::whereEmail($request->email)->first();
			$user->api_token = str_random(60);
			$user->save();

			return ApiResponse::success('Success login', $user->toArray());
		}
		
		return ApiResponse::error('Email or password not match', null, 401);
	}

	/**
	 * user login
	 *
	 * @param Request $request
	 * @return json
	 */
	public function logout(Request $request)
	{
		$user = Auth::guard('api')->user();
		$user->api_token = null;
		$user->save();

		return ApiResponse::success('Success Logout');
	}

	/**
	 * register login
	 *
	 * @param Request $request
	 * @return json
	 */
	public function register(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'name' => 'required|min:3|max:50',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|max:20',
		]);
		
		if ($validate->fails()){
			return ApiResponse::error($validate->errors()->first(), null, 400);
		}

		$user = new User($request->only(['name', 'email', 'password']));
		$user->save();

		return ApiResponse::success('Success register', $user->toArray());
	}
}
