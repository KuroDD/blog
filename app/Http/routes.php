<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('/blog','BlogController');

Route::post('/blog/{id}','BlogController@update');

Route::get('/destroy/{id}','BlogController@destroy');

Route::get('/blog/search','BlogController@show');
