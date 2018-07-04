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

Route::get('/', 'ListaController@index');

Route::get('/dyn_pdf/pdf', 'DynamicPDFController@pdf');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');


Auth::routes();
Route::resource('listings', 'ListaController');

Route::get('/dashboard', 'DashboardController@index');
