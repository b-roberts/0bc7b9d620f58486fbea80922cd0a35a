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


Route::resource('schematic', 'SchematicController');
Route::get('/schematic/{id}/download', 'SchematicController@download')->name('schematic.download');
Route::post('/schematic/{id}/like', 'SchematicController@like')->name('schematic.like');

Route::resource('comment', 'CommentController');
Auth::routes();


Route::resource('profile', 'ProfileController');

Route::get('/', 'HomeController@index')->name('home');
