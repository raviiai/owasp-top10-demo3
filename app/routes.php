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

	$account = Account::findById($id);

	if (!$account) {
		App::abort(404);
	} else if ($account->getOwner()->id != Auth::user()->id) {
		App::abort(503);
	}

	return View::make('accounts/show', ['account' => $account]);
}]);

Route::get('/transactions/create', ['as' => 'transactions.create', function() {
	if (Auth::guest()) {
		return Redirect::to('/');
	}

	return View::make('transactions/create');
}]);

Route::post('/transactions', ['as' => 'transactions.store', function() {
	if (Auth::guest()) {
		return Redirect::to('/');
	}

	$from = Account::findById(Input::get('sender_account_id'));
	$to = Account::findById(Input::get('receiver_account_id'));
	$amount = (float)Input::get('amount');
	$text = Input::get('text');

	// Validate input data
	if (! $from || ! $to || ! $amount || $from->id == $to->id) {
		return Redirect::route('transactions.create')->withInput();
	}

	$transaction = Transaction::create([
		'sender_account_id' => $from->id,
		'receiver_account_id' => $to->id,
		'amount' => $amount,
		'created_at' => time(),
		'text' => $text
	]);
	$transaction->save();

	return Redirect::route('accounts.show', $from->id);
}]);

Route::get('/decrypt', function() {
	$encrypter = new \Illuminate\Encryption\Encrypter('YourSecretKey!!!');
	$data = $encrypter->decrypt("eyJpdiI6Ikc5bmxTYVJ4dXNCTTBpZTg5SzQxXC8yb3IyTkNKMnhYNzQ4dCtLeGNheTY0PSIsInZhbHVlIjoiaDI0aHBKcStUWnMwMDNJb1VrRnJSV2d4WDJRWW8wRVc0M0VERTVXRE1FRnBpazFSME9KT1FnSWFOZ3F0NFIxd1ozcHhEaFhoZnJDcm5mN0k2ZTVicGozSklTTEtWYW53bmdpRnMyK0RWMG5WZFwvbXIrS3JiVW9yaU1jeEhXdlZqM1UwemVWSE9VeWU0QVliNHlrOGpQR3RFTDY4UHdERzlKQzFPWXM2aUw3RFhVRjJXZnd4aVJHRWpyNU9vNkN3SFJyTUNtXC91N1l6NHdxVWJaVkh3VHFSdlhcL2JsdEtmVXRGdkdIYWxabVphUjI0cXVQVjNZSWgyYWJLb1dYQmFEaGZ2MkRuM0E1WXk5blJzZHVQT0htbDZ1VHhodXFtSlUwQ010c2d4WUJUTlFvdjB4YlZ2dmJ3Skg5SFZDc3J0OU9ic1l6KzY2WW9IUVBNdkRKTkM3QUF3PT0iLCJtYWMiOiJlN2NhNmU0NTY5MGYwMWE4OGJiODc1YWYzN2Y2ZTRlMTAzNzUzYjUwZjg4ZWM2ZmQ3YjJlN2UwMjRiZjY0MGExIn0");
	var_dump($data); die;
});