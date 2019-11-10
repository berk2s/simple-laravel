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

Route::get('/', 'Login\LoginController@get_index')->middleware('guest');
Route::post('/', 'Login\LoginController@post_handle')->middleware('auth');

Route::get('/anasayfa', 'Dashboard\DashboardController@get_index')->middleware('auth');

Route::get('/canli', 'Orders\LiveOrdersController@get_index')->middleware('auth');
