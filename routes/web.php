<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin/account', 'HomeController@account')->name('admin.account');
Route::post('/admin/generate_token', 'HomeController@generateToken')->name('admin.generate_token');
//questa rotta non è navigabile da browser
