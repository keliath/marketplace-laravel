<?php

use Illuminate\Support\Facades\Route;

use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','MenuController@menu');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth', function(){
    return view('backend.admin.index');
});


//admin
Route::group(['prefix'=>'auth'], function(){
    Route::resource('/category','CategoryController');//dependiendo la ruta ejecutara un metodo ej: category/create ejecuta metodo create
    Route::resource('/subcategory','SubcategoryController');
    Route::resource('/childcategory','ChildcategoryController');
});


//ads
Route::get('/ads/create', 'AdvertisementController@create')->middleware('auth');
Route::post('/ads/stores', 'AdvertisementController@store')->middleware('auth')->name('ads.store');
Route::get('/ads', 'AdvertisementController@index')->middleware('auth');


