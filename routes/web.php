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
Route::get('/home/excel', 'EmployeeController@export');
Route::get('/guest', 'HomeController@guest');
Route::get('/view/{id}', 'HomeController@view');
Route::resource('customsearch', 'HomeController');

/*
|	Employees Web Routes 	|
*/
Route::get('/create/employee', 'EmployeeController@create');
Route::post('/store/employee', 'EmployeeController@store');
Route::get('/edit/employee/{id}', 'EmployeeController@edit');
Route::post('/update/employee/{id}', 'EmployeeController@update');
Route::get('/view/employee/{id}', 'EmployeeController@view');

/*
|	Office Web Routes 	|
*/
Route::get('/create/office', 'OfficeController@create');
Route::post('/store/office', 'OfficeController@store');
Route::get('/edit/office/{id}', 'OfficeController@edit');
Route::post('/update/office/{id}', 'OfficeController@update');

/*
|	Position Web Routes 	|
*/
Route::get('/create/position', 'PositionController@create');
Route::post('/store/position', 'PositionController@store');
Route::get('/edit/position/{id}', 'PositionController@edit');
Route::post('/update/position/{id}', 'PositionController@update');


