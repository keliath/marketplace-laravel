<?php

use App\Http\Controllers\SendMessagesController;
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

Route::get('/', 'FrontendAdsController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'auth', 'middleware' => 'admin'], function () {
    //admin
    Route::get('/', function () {
        return view('backend.admin.index');
    })->name('auth');
    Route::resource('/category', 'CategoryController'); //dependiendo la ruta ejecutara un metodo ej: category/create ejecuta metodo create
    Route::resource('/subcategory', 'SubcategoryController');
    Route::resource('/childcategory', 'ChildcategoryController');
});


//ads
Route::get('/ads/create', 'AdvertisementController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/stores', 'AdvertisementController@store')->middleware('auth')->name('ads.store');
Route::get('/ads', 'AdvertisementController@index')->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', 'AdvertisementController@edit')->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', 'AdvertisementController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', 'AdvertisementController@destroy')->name('ads.destroy')->middleware('auth');

//profile
Route::get('/profile', 'ProfileController@index')->name('profile.index')->middleware('auth');
Route::put('/profile', 'ProfileController@updateProfile')->name('update.profile')->middleware('auth');

//frontend 
Route::get('/product/{categorySlug}', 'FrontController@findForCategory')->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}', 'FrontController@findForSubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}', 'FrontController@findForChildcategory')->name('childcategory.show');
Route::get('/products/{id}/{slug}', 'FrontController@productDetail')->name('product.view');

//message
Route::post('/send/message', 'SendMessagesController@Store');