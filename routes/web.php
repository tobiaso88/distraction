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

Route::group(array('middleware' => 'auth'), function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index');

    Route::group(array('prefix' => 'employees'), function() {
        Route::get('/', 'EmployeesController@all');
        Route::post('increase/{id}', 'EmployeesController@increase');
        Route::post('decrement/{id}', 'EmployeesController@decrement');
    });
});
