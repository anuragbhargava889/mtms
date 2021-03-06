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
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('regions', 'RegionController');
Route::resource('inspections', 'InspectionController');
Route::resource('towers', 'TowerController');
Route::get('tokens', function(){
    return view('token.index');
});