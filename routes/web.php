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
     return view('welcome')->middleware('Authenticated');
 })->middleware('Authenticated');
Route::resource('student', 'StudentController')->middleware('Authenticated');
Route::any('delete/{id}','StudentController@delete');
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');
//Route::get('/student', 'StudentController@index');
Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');
Route::get('/send/email', 'HomeController@mail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
