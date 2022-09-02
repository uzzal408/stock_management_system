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
    return redirect('home');
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

    Route::group(['prefix'=> 'products'],function (){
        Route::get('/','App\Http\Controllers\Admin\ProductController@index')->name('admin.products.index');
        Route::get('/create','App\Http\Controllers\Admin\ProductController@create')->name('admin.products.create');
        Route::post('/store','App\Http\Controllers\Admin\ProductController@store')->name('admin.products.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\ProductController@edit')->name('admin.products.edit');
        Route::post('update','App\Http\Controllers\Admin\ProductController@update')->name('admin.products.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\ProductController@delete')->name('admin.products.delete');
    });

    Route::group(['prefix'=> 'reports'],function (){
        Route::get('/stocks','App\Http\Controllers\Admin\ReportController@stock')->name('admin.reports.stock');
    });
    Route::group(['prefix'=> 'stocks'],function (){
        Route::get('/purchase','App\Http\Controllers\Admin\PurchaseController@purchase')->name('admin.purchase.index');
        Route::post('purchase','App\Http\Controllers\Admin\PurchaseController@searchByCategory')->name('stock.search');
        Route::post('stock-in','App\Http\Controllers\Admin\PurchaseController@inStock')->name('stock.in');
        Route::get('/sell','App\Http\Controllers\Admin\StockOutController@sell')->name('admin.sell.index');
        Route::post('sell','App\Http\Controllers\Admin\StockOutController@searchByCategory')->name('sell.stock.search');
        Route::post('stock-out','App\Http\Controllers\Admin\StockOutController@stockOut')->name('stock.out');
    });
    Route::group(['prefix'=> 'return'],function (){
        Route::get('/','App\Http\Controllers\Admin\ReturnController@index')->name('admin.return.index');
        Route::post('search','App\Http\Controllers\Admin\ReturnController@searchByCategory')->name('return.stock.search');
        Route::post('return-add','App\Http\Controllers\Admin\ReturnController@returnItem')->name('stock.return');
    });

});
