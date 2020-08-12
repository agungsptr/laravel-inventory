<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// disable route '/register'
Route::match(["GET", "POST"], "/register", function () {
    return abort(404);
});

Route::get('/', function () {
    return redirect()->route('inventory.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route("inventory.index");
    });
    Route::resource('inventory', 'InventoryController');
    Route::resource('fund', 'FundController');
    Route::resource('category', 'CategoryController');
});

Route::group(['prefix' => 'getdata'], function () {
    Route::get('inventory', 'DataTableController@getInventory')->name('getdata.inventory');
    Route::get('category', 'DataTableController@getCategory')->name('getdata.category');
    Route::get('fund', 'DataTableController@getFund')->name('getdata.fund');
});
