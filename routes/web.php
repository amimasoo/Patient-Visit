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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/visit/add','PatientController@add');
Route::post('/visit/add','PatientController@store');
Route::get('/patients','PatientController@index');
Route::get('/delete/{patient}','PatientController@destroy');
Route::get('/edit/{patient}','PatientController@edit');
Route::post('/edit/{patient}','PatientController@update');
Route::get('/searchpatient','PatientController@searchPatient');
Route::post('/searchpatient','PatientController@isPatient');
Route::post('/searchpatient/addvisit/{visit}','VisitController@store');
Route::get('/existpatient','PatientController@isPatient');
