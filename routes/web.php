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
Route::get('/', 'App\Http\Controllers\controller@index');

Route::post('/search', 'App\Http\Controllers\controller@searchCustomer');
Route::post('/newClient', 'App\Http\Controllers\controller@newClient');

Route::get('/client/{clientId}', 'App\Http\Controllers\controller@viewClient');
Route::post('/updateClient', 'App\Http\Controllers\controller@updateClient');