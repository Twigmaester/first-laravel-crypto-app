<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

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

Route::view('login', 'login');
Route::post('login', 'App\Http\Controllers\LoginController@authenticate');

Route::get('register', 'App\Http\Controllers\RegistrationController@create');
Route::post('register', 'App\Http\Controllers\RegistrationController@store');

Route::post('crypto', 'App\Http\Controllers\CryptoController@viewPair');
Route::view('crypto', 'getPrice');
