<?php

//TradePoint
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('trade-point', 'TradePointController')->except(['create', 'show','destroy']);
    Route::get('trade-point/destroy/{id}', 'TradePointController@destroy')->name('trade-point.destroy');
//ClothType
    Route::resource('cloth-type', 'ClothTypeController')->except(['create', 'show','destroy']);
    Route::get('cloth-type/destroy/{id}', 'ClothTypeController@destroy')->name('cloth-type.destroy');
///Customer
    Route::resource('customer', 'CustomerController')->except(['create', 'show','destroy']);
    Route::get('customer/destroy/{id}', 'CustomerController@destroy')->name('customer.destroy');

    //CompletionStage
    Route::resource('completion-stage', 'CompletionStageController')->except(['create', 'show','destroy','index']);
    Route::get('completion-stage/index/{id}', 'CompletionStageController@index')->name('completion-stage.index');
    Route::get('completion-stage/destroy/{id}', 'CompletionStageController@destroy')->name('completion-stage.destroy');

    //OrderCompletionStatus
    Route::resource('completion-status', 'OrderCompletionStatusController')->except(['create', 'show','destroy','index']);
    Route::get('completion-status/index/{id}', 'OrderCompletionStatusController@index')->name('completion-status.index');
    Route::get('completion-status/destroy/{id}', 'OrderCompletionStatusController@destroy')->name('completion-status.destroy');

});


