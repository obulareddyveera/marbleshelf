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

Route::get('/', 'App\Http\Controllers\StudentController@create')->name('home');
Route::get('/create', 'App\Http\Controllers\StudentController@index')->name('create');

Route::get('/hello', function () {
    return "Hello Veera";
});
Route::get('/hello/{name}', function ($name) {
    return "Hello ".$name;
});
