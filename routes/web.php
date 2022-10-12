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

Route::get('/home', 'JobController@index');
Route::get('apply/{id}', 'JobController@jobApply');
Route::get('deleteJob/{id}', 'JobController@deleteJobById');
Route::get('getUpdateJob/{id}', 'JobController@getUpdateJob');
Route::post('updateJob/{id}', 'JobController@updateJob');
Route::post('addJob', 'JobController@addJob');
Route::get('admin', 'JobController@getJobs');
Route::post('updatename','UserController@updateNameById');
Route::post('updateemail','UserController@updateEmailById');
Route::post('updateimage','UserController@updateImage');
Route::get('deleteImg','UserController@deleteImgById');
Route::get('applications','UserController@getApplication');
Route::post('sendemail','MailController@mailsend');
Route::get('login', 'Auth\LoginController@index');
Route::post('post-login', 'Auth\LoginController@postLogin');
Route::get('registration', 'Auth\LoginController@registration');
Route::post('post-registration', 'Auth\LoginController@postRegistration');
Route::get('welcome', 'JobController@index');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('profile', function () {
    return view('profile');
});