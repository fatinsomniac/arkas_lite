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
    return view('home');
});

Route::controller(App\Http\Controllers\ActivityController::class)->group(function(){
    Route::get('activities', 'index')->name('activities.index');
    Route::post('activities', 'store')->name('activities.store');
    Route::get('activities/{uuid}/edit', 'edit')->name('activities.edit');
    Route::put('activities/{uuid}', 'update')->name('activities.update');
    Route::delete('activities/{uuid}', 'destroy')->name('activities.destroy');
});

Route::controller(App\Http\Controllers\ItemController::class)->group(function(){
    Route::get('items', 'index')->name('items.index');
    Route::post('items', 'store')->name('items.store');
    Route::get('items/{uuid}/edit', 'edit')->name('items.edit');
    Route::put('items/{uuid}', 'update')->name('items.update');
    Route::delete('items/{uuid}', 'destroy')->name('items.destroy');
});

Route::controller(App\Http\Controllers\TransactionController::class)->group(function(){
    Route::get('transactions', 'index')->name('transactions.index');
    Route::post('transactions', 'store')->name('transactions.store');
    Route::get('transactions/{uuid}/edit', 'edit')->name('transactions.edit');
    Route::put('transactions/{uuid}', 'update')->name('transactions.update');
    Route::delete('transactions/{uuid}', 'destroy')->name('transactions.destroy');
});
