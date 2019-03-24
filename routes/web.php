<?php

use Yajra\DataTables\DataTables;

use App\Team;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ActivePersonController;
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
    return view('/auth/login');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('people', 'PersonController');

Route::resource('teams','TeamController');

Route::resource('active_people','ActivePersonController');

// Route::get('/addPlayerToTeam', [
// 'uses' => 'ActivePersonController@addPlayerToTeam',
//     'as'   => 'addPlayerToTeam'
//   ]);

Route::post('/teams/addperson', 'ActivePersonController@addPersonToTeam');
Route::post('/teams/removeperson', 'ActivePersonController@removePersonFromTeam');

Route::post('/people/editPerson', 'PersonController@edit');
Route::post('/people/createPerson', 'PersonController@create');
Route::post('/teams/editTeam', 'TeamController@edit');
Route::post('/teams/createTeam', 'TeamController@create');
Route::post('/activePeople/editActivePerson', 'ActivePersonController@edit');