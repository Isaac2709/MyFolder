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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users', function(){
	return View::make('users');
});

Route::get('auth', array('before' => 'auth', function(){
	return View::make("hello");
}) );


Route::get('login', array(
  'uses' => 'AuthController@getLogin',
  'as' => 'auth.create'
));

Route::post('login', array(
  'uses' => 'AuthController@postLogin',
  'as' => 'auth.store'
));
Route::get('logout', 'AuthController@getLogout');

Route::resource('users', 'UsersController');
Route::get('users', 'UsersController@getIndex');