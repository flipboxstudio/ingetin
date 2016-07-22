<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	/**
	 * get login user
	 *
	 * @param Request $request
	 * @return response view
	 */
	public function getLogin(Request $request)
	{
		return view('auth.login');
	}

	/**
	 * post login user
	 *
	 * @param Request $request
	 * @return response view
	 */
	public function postLogin(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);
		
		if ($validate->fails()) {
			return back()->withInput($request->only('email'))
				->withErrors($validate);
		}

		$credentials = array_merge($request->only(['email','password']), ['role'=>'admin']);

		if (Auth::attempt($credentials)) {
			redirect('/');
		}

		return back()->withErrors(['login'=>'Email or password not match']);
	}

	/**
	 * get logout
	 *
	 * @return redirect
	 */
	public function logout()
	{
		Auth::logout();

		return redirect('login');
	}
}
