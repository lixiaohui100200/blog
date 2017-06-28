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
//前台
Route::get('/', 'Home\IndexController@index');
Route::get('/about', 'Home\AboutController@index');
Route::get('/features', 'Home\FeaturesController@index');
Route::get('/codes', 'Home\CodesController@index');
Route::get('/contact', 'Home\ContactController@index');
Route::get('/fashion', 'Home\FashionController@index');
Route::get('/music', 'Home\MusicController@index');
Route::get('/travel', 'Home\FashionController@index');
Route::get('/single', 'Home\SingleController@index');
//后台
Route::any('admin/login','Admin\LoginController@login');
Route::get('admin/code','Admin\LoginController@code');
Route::get('admin/index','Admin\IndexController@index');
Route::get('admin/info','Admin\IndexController@info');
Route::get('admin/add','Admin\IndexController@add');
Route::get('admin/lst','Admin\IndexController@lst');


