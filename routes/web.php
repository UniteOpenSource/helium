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
Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/wizard', 'HackathonController@index');

    Auth::routes();
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/exercises', 'ExerciseController@index')->name('exercises');
    Route::get('/exercise/{{$id}}', 'ExerciseController@show')->name('exercises');
    Route::get('/scoreboard', 'TeamController@index')->name('teams');
    Route::get('/my-team', 'TeamController@edit');
    Route::get('/my-account', 'UserController@edit')->name('user');
    Route::get('/more-info', function () {
        return view('more-info');
    });

    Route::get('/backend/users', 'UserController@index')->name('users');
    Route::get('/backend/teams', 'TeamController@index')->name('teams');
    Route::get('/backend/exercises', 'ExerciseController@index')->name('exercises');
    Route::get('/backend/configurations', 'HackathonController@index')->name('hackathons');

    Route::resource('hackathons', 'HackathonController');
    Route::resource('teams', 'TeamController');
    Route::resource('users', 'UserController');
    Route::resource('exercises', 'ExerciseController');
});
