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

//Route::prefix('ordermgnt')->group(function() {
//    Route::get('/', 'OrderMgntController@index');
//});

//order
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('order/assign-tailor/{id}', 'OrderController@assignTailorView')->name('order.assign_tailor-view');
    Route::post('order/assign-tailor', 'OrderController@assignTailor')->name('order.assign_tailor');
    Route::get('order/approve/{id}', 'OrderController@approve')->name('order.approve');
    Route::resource('order', 'OrderController')->except(['create', 'show','destroy']);
    Route::get('order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');

    //Tailor
    Route::resource('tailor', 'TailorsController')->except(['create', 'show','destroy']);
    Route::get('tailor/destroy/{id}', 'TailorsController@destroy')->name('tailor.destroy');
});


