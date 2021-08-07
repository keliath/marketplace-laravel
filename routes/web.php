<?php

use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\SendMessagesController;
use App\Http\Controllers\SocialLoginController;
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

//admin 
Route::group(['prefix' => 'auth', 'middleware' => 'admin'], function () {
    Route::get('/', function () {
        return view('backend.admin.index');
    })->name('auth');
    Route::resource('/category', 'CategoryController');
    //dependiendo la ruta ejecutara un metodo ej: category/create ejecuta metodo create
    Route::resource('/subcategory', 'SubcategoryController');
    Route::resource('/childcategory', 'ChildcategoryController');

    //admin listing
    Route::get('/allads', 'AdminListingController@index')->name('all.ads');

    //listing reported ads
    Route::get('/reported-ads', 'FraudController@index')->name('all.reported.ads');
});

//user ads
Route::get('/ads/{userId}/view', 'FrontController@viewUserAds')->name('show.user.ads');

//ads
Route::get('/ads/create', 'AdvertisementController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/stores', 'AdvertisementController@store')->middleware('auth')->name('ads.store');
Route::get('/ads', 'AdvertisementController@index')->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', 'AdvertisementController@edit')->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', 'AdvertisementController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', 'AdvertisementController@destroy')->name('ads.destroy')->middleware('auth');
Route::get('/ad-pending', 'AdvertisementController@pendingAds')->name('pending.ad')->middleware('auth');

//profile
Route::get('/profile', 'ProfileController@index')->name('profile.index')->middleware('auth');
Route::put('/profile', 'ProfileController@updateProfile')->name('update.profile')->middleware('auth');

//frontend 
Route::get('/product/{categorySlug}', 'FrontController@findForCategory')->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}', 'FrontController@findForSubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}', 'FrontController@findForChildcategory')->name('childcategory.show');
Route::get('/products/{id}/{slug}', 'FrontController@productDetail')->name('product.view');

//message
Route::post('/send/message', 'SendMessagesController@Store')->middleware('auth');
Route::get('messages', 'SendMessagesController@index')->name('messages')->middleware('auth');
Route::get('/users', 'SendMessagesController@chatWithThisUser')->middleware('auth');
Route::get('/message/user/{id}', 'SendMessagesController@showMessages')->middleware('auth');
Route::post('/start-conversation', 'SendMessagesController@startConversation')->middleware('auth');

//login with facebook
Route::get('auth/facebook', 'SocialLoginController@facebookRedirect');
Route::get('auth/facebook/callback', 'SocialLoginController@loginWithFacebook');

//save ad
Route::post('/ad/save', 'SaveAdController@saveAd')->middleware('auth');
Route::post('/ad/remove', 'SaveAdController@removeAd')->name('remove.ad')->middleware('auth');
Route::get('/saved-ads', 'SaveAdController@getAdsFav')->name('saved.ad')->middleware('auth');

//report ad
Route::post('/report-this-ad', 'FraudController@store')->name('report.ad');
