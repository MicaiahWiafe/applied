<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/genre', function () {
    return view('genre');
});

Route::get('/showing', array(
	'uses' => 'MovieController@index',
	'as' => 'index'
));

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/movie/new', array(
	'uses' => 'MovieController@newMovie',
	'as' => 'newMovie'
));

Route::post('/movie/new', array(
	'uses' => 'MovieController@addMovie',
	'as' => 'addMovie'
));

Route::get('/movie/{id}', array(
	'uses' => 'MovieController@viewMovie',
	'as' => 'viewMovie'
));

Route::post('/buy', array(
	'uses' => 'TicketController@test',
	'as' => 'buy'
));

Route::get('/send', array(
	'uses' => 'TicketController@send',
	'as' => 'send'
));

// Route::post('/buy', array(
// 	'uses' => 'MovieController@create',
// 	'as' => 'create'
// ));