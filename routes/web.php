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

Route::get('/', 'TripController@show');

/**
 * Week 7 show configuration
 */
Route::get('/env', function () {
    dump('app.name = ' . config('app.name'));
    dump('app.env = ' . config('app.env'));
    dump('app.debug = ' . config('app.debug'));
    dump('app.url = ' . config('app.url'));
    dump('App::environment = ' . App::environment());
});

