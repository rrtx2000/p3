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


Route::get('/trip/{var}', 'TripController@show');
Route::get('/trip/', 'TripController@show');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TripController@index');
Route::get('/show-results', 'TripController@showResults');

/*
    Route::get('/trip/{var}', function($var) {
        Debugbar::addMessage(__FILE__ . ': Route::get /trip/{var}', 'Tracing');
        return view('trip.show')->with(['var' => $var]);
        //return 'Results for the var: ' . $var;
    });
*/


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');

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

Route::get('/debugbar', function () {
    $data = ['foo' => 'bar'];
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error message here');
    Debugbar::warning('Warning message here');
    Debugbar::addMessage('Another message', 'mylabel');
    return 'Check out the Debugbar';
});