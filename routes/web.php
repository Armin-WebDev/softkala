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

Route::prefix('administrator')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\MainController::class, 'masterPage']);
    Route::resource('categories' , \App\Http\Controllers\Backend\CategoryController::class);
    Route::get('categories/{id}/settings' , [\App\Http\Controllers\Backend\CategoryController::class , 'indexSetting']);
    Route::post('categories/settings' , [\App\Http\Controllers\Backend\CategoryController::class , 'saveSetting']);
    Route::resource('attributes-group' , \App\Http\Controllers\Backend\AttributeGroupController::class);
    Route::resource('attributes-value' , \App\Http\Controllers\Backend\AttributeValueController::class);
    Route::resource('products' , \App\Http\Controllers\Backend\ProductController::class);

});
