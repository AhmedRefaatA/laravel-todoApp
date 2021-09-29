<?php

use App\Http\Controllers\UsersController;
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

Route::get('/index','UsersController@index');
Route::get('/register', 'UsersController@create');
Route::post('/store', 'UsersController@store');
Route::get('/login', 'UsersController@login')->name('login');
Route::get('/logout', 'UsersController@logout');
Route::post('/doLogin', 'UsersController@doLogin');
Route::resource('todo','TodoController');
