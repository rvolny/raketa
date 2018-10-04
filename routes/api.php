<?php

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

//Route::post('/signup', 'UserApiController@signup');
//Route::post('/logout', 'UserApiController@logout');
//Route::post('/verify', 'UserApiController@verify');
//Route::post('/auth/facebook', 'Auth\SocialLoginController@facebookViaAPI');
//Route::post('/auth/google', 'Auth\SocialLoginController@googleViaAPI');
//Route::post('/forgot/password', 'UserApiController@forgot_password');
//Route::post('/reset/password', 'UserApiController@reset_password');

Route::group([
    'middleware' => ['auth:api'],
    'prefix'     => 'v1',
], function () {
    /*
     * GET = read
     * POST = create
     * PUT = update
     * DELETE = delete
     * PATCH = ?
     */

    // Actions for User

    // Actions for Sender

    // Actions for Courier

    // Actions for Package

    // Actions for Message

    // Actions for Wallet

    // TODO: delete below me

    Route::get('me', 'UserController@getUserInfo')->middleware('can:user_read');

    // List of all my packages
//    Route::get('packages', 'PackageController@getUserPackages');
    // Create new package
//    Route::post('packages', 'PackageController@createPackage');
    // Update existing package
//    Route::put('packages', 'PackagesController@updatePackage');
    //

});
