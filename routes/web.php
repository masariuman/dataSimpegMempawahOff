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

Route::get('/', 'App\Http\Controllers\DataController@index');
Route::get('/pns', 'App\Http\Controllers\DataController@pns');
Route::get('/cpns', 'App\Http\Controllers\DataController@cpns');
Route::get('/pppk', 'App\Http\Controllers\DataController@pppk');
Route::get('/pensiun', 'App\Http\Controllers\DataController@pensiun');
Route::get('/pindah', 'App\Http\Controllers\DataController@pindah');
Route::get('/all', 'App\Http\Controllers\DataController@all');
Route::get('/{id}', 'App\Http\Controllers\DataController@show');
