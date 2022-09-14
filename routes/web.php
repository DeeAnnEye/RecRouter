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

// Route::get('/apply/{id}', function () {
//     return view('apply');
// });
Route::get('apply/{id}', 'JobController@jobApply');
Route::post('updatename','UserController@updateNameById');
Route::post('sendemail','MailController@mailsend');

Route::get('profile/{id}', function () {
    return view('profile');
});

// Route::get('/', 'Auth\LoginController@index');
Route::get('login', 'Auth\LoginController@index');
Route::post('post-login', 'Auth\LoginController@postLogin');
Route::get('registration', 'Auth\LoginController@registration');
Route::post('post-registration', 'Auth\LoginController@postRegistration');
Route::get('welcome', 'JobController@index');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
