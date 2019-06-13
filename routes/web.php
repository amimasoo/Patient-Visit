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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/visit/add','PatientController@index');
Route::post('/visit/add','PatientController@store');
Route::get('/visits','PatientController@visitListView');
Route::get('/visit/delete/{visit}','VisitController@destroy');
