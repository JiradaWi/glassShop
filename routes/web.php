<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//index
Route::get('/', 'App\Http\Controllers\controller@index');
Route::post('/search', 'App\Http\Controllers\controller@searchCustomer');
Route::post('/newClient', 'App\Http\Controllers\controller@newClient');

//client
Route::get('/client/{clientId}', [
    'as'    => 'clientRecord', 
    'uses'  => 'App\Http\Controllers\controller@viewClient'
    ]);
Route::post('/updateClient', 'App\Http\Controllers\controller@updateClient');

//eyesight
Route::get('/newEyesight/{clientId}', 'App\Http\Controllers\eyeSightController@newEyeSight');
Route::post('/saveNewEyesight', 'App\Http\Controllers\eyeSightController@saveNewEyesight');

//order
Route::get('/newOrder/{clientId}', 'App\Http\Controllers\orderController@newOrder');
Route::get('/order/{order}', 'App\Http\Controllers\orderController@viewOrder');
Route::post('/saveOrder', 'App\Http\Controllers\orderController@saveOrder');