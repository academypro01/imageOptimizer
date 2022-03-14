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

Route::namespace('App\Http\Controllers')->middleware(['setLocale'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::resource('image', 'ImageController');
    Route::get('/changeLanguage', 'HomeController@changeLanguage')->name('change.lang');
});
