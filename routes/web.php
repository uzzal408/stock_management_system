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

Route::group(['middleware'=> 'auth'],function () {
    Route::get('/home', function () {
        return view('backend.dashboard.index');
    });

    Route::get('settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings');
    Route::post('settings', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');

    Route::group(['prefix'=> 'categories'],function (){
        Route::get('/','App\Http\Controllers\Admin\CategoryController@index')->name('admin.categories.index');
        Route::get('/create','App\Http\Controllers\Admin\CategoryController@create')->name('admin.categories.create');
        Route::post('/store','App\Http\Controllers\Admin\CategoryController@store')->name('admin.categories.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\CategoryController@edit')->name('admin.categories.edit');
        Route::post('update','App\Http\Controllers\Admin\CategoryController@update')->name('admin.categories.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\CategoryController@delete')->name('admin.categories.delete');
    });
});
