<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login','API\UserAuthController@login');
Route::post('login/{social_account}','API\UserAuthController@socialLogin');
Route::post('new-profile','API\UserRegisterApiController@regiUser');
Route::post('admin-password/email', 'API\UserController@sendResetLinkEmail');

Route::group(['middleware' => ['jwt.verify'], 'prefix'=>'user'], function() {
    Route::get('offers','API\AddListController@myOffers');
    Route::get('me','API\UserController@userDetail');
    Route::post('update-me','API\UserController@updateProfile');
    Route::post('update-password','API\UserController@updatePass');
    Route::post('create-ad','API\AddListController@create');
    Route::post('update-ad/{id}','API\AddListController@update');
    Route::post('delete-ad/{id}','API\AddListController@delete');
    Route::post('offer/{offer_id}/generate-coupon','API\AddListController@generateCoupon');
    Route::post('offer/{offer_id}/post-review','API\AddListController@postReview');
    Route::post('coupon/{coupon_id}/{status}','API\AddListController@changeCouponStatus');
    Route::get('coupons','API\AddListController@coupons');
});

Route::get('search','API\WebAPIController@search');
Route::get('cities','API\WebAPIController@cities');
Route::get('categories','API\WebAPIController@categories');
Route::get('popular','API\WebAPIController@getPopular');
Route::get('latest','API\WebAPIController@getLatest');
Route::get('featured','API\WebAPIController@getFeatured');
Route::get('coupons','API\WebAPIController@coupons');
Route::get('single-post','API\WebAPIController@singlePost');
Route::get('offer/{id}','API\WebAPIController@singleOffer');
Route::get('amenities','API\WebAPIController@amenities');