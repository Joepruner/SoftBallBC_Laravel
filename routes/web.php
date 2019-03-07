<?php

use Yajra\DataTables\DataTables;

use App\Team;
use App\Http\Controllers\TeamController;
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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('people', 'PersonController');

Route::resource('teams','TeamController');

Route::resource('active_people','ActivePersonController');

// Route::get('teams', 'TeamController@index')->name('teams.index');

