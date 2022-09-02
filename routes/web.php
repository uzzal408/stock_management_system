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

    Route::group(['prefix'=> 'customers'],function (){
        Route::get('/','App\Http\Controllers\Admin\CustomerController@index')->name('admin.customers.index');
        Route::get('/create','App\Http\Controllers\Admin\CustomerController@create')->name('admin.customers.create');
        Route::post('/store','App\Http\Controllers\Admin\CustomerController@store')->name('admin.customers.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\CustomerController@edit')->name('admin.customers.edit');
        Route::post('update','App\Http\Controllers\Admin\CustomerController@update')->name('admin.customers.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\CustomerController@delete')->name('admin.customers.delete');
    });

    Route::group(['prefix'=> 'suppliers'],function (){
        Route::get('/','App\Http\Controllers\Admin\SupplierController@index')->name('admin.suppliers.index');
        Route::get('/create','App\Http\Controllers\Admin\SupplierController@create')->name('admin.suppliers.create');
        Route::post('/store','App\Http\Controllers\Admin\SupplierController@store')->name('admin.suppliers.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\SupplierController@edit')->name('admin.suppliers.edit');
        Route::post('update','App\Http\Controllers\Admin\SupplierController@update')->name('admin.suppliers.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\SupplierController@delete')->name('admin.suppliers.delete');
    });
});
