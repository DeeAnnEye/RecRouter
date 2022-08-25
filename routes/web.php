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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', 'JobController@index');

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/apply', function () {
//     return view('home');
// });

// Route::get('/', 'Auth\LoginController@index');
Route::get('login', 'Auth\LoginController@index');
Route::post('post-login', 'Auth\LoginController@postLogin');
Route::get('welcome', 'Auth\LoginController@welcome');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
