<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', function()
{
	return View::make('home');
}]);

Route::post('/login', ['as' => 'login', function() {
	$user = User::findByUsername(Input::get('username'));
	if ($user === null) {
		return Redirect::to('/');
	}

	if ($user->password !== sha1(Input::get('password'))) {
		return Redirect::to('/');
	}

	Auth::loginUsingId($user->id);
	return Redirect::to('/users/'.$user->id);
}]);

Route::post('/logout', ['as' => 'logout', function() {
	Auth::logout();
	return Redirect::to('/');
}]);

Route::get('/users/{id}', ['as' => 'users.show', function($id) {
	if (Auth::guest()) {
		return Redirect::to('/');
	}

	return View::make('users/show', ['user' => User::findById($id)]);
}]);

Route::get('/accounts/{id}', ['as' => 'accounts.show', function($id) {
	if (Auth::guest()) {
		return Redirect::to('/');
	}

	return View::make('accounts/show', ['account' => Account::findById($id)]);
}]);