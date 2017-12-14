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

Route::get('/', function () {
    return view('admin_template');
});


Route::get('/test', 'TestController@index');
Route::post('/test', 'TestController@index_submit');
Route::get('/getPassengerMonth2017', 'TestController@show_chart_2017');
