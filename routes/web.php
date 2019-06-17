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
    
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/liveData', 'HomeController@liveData')->name('liveData');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController');
Route::resource('expenses', 'ExpensesController');
