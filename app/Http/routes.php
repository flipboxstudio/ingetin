<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//api
Route::group(['namespace'=>'Api\v1', 'prefix'=>'api/v1/', 'middleware'=>'cors'], function(){
	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	
	Route::group(['middleware'=>'auth:api'], function(){
		Route::get('me', 'AuthController@me');
		Route::get('logout', 'AuthController@logout');

		Route::controller('project', 'ProjectController');
		Route::controller('task', 'TaskController');
		Route::controller('timesheet', 'TimesheetController');
	});
});

//admin
Route::group(['namespace'=>'Admin', 'middleware'=>'web'], function(){

	Route::group(['middleware'=>'guest'], function(){
		Route::get('register', 'AuthController@getRegister');
		Route::post('register', 'AuthController@postRegister');
		Route::get('login', 'AuthController@getLogin');
		Route::post('login', 'AuthController@postLogin');
	});	
	
	Route::group(['middleware'=>'auth'], function(){
		Route::get('logout', 'AuthController@logout');

		Route::controller('project', 'ProjectController');
		Route::controller('task', 'ProjectController');
		Route::controller('/', 'AdminController');
	});
});