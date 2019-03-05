<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('people', 'PersonController');

Route::resource('teams','TeamController');

Route::resource('active_people','ActivePersonController');
// Route::post('account', 'UserController@store')->name('account.store');
