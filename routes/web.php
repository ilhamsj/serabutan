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
    return view('index');
});

Route::get('/admin', 'AdminController@dashboard')->name('admin');
Route::get('/admin/data/user', 'AdminController@dataUser')->name('admin.data.user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
