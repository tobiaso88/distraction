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

Route::get('/', 'DashboardController@index');

Auth::routes();

Route::get('employees', function() {
    return App\Employee::all();
});

Route::post('employees/increase/{id}', function($id) {
    return App\Employee::findOrFail($id)
        ->clicks()
        ->firstOrCreate(['date' => Carbon\Carbon::today()])
        ->increment('count');
});

Route::post('employees/decrement/{id}', function($id) {
    App\Employee::find($id)
        ->clicks()
        ->firstOrFail()
        ->decrement('count');
});

