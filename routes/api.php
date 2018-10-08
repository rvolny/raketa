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
     * GET    = read
     * POST   = create
     * PUT    = update / replace
     * DELETE = delete
     * PATCH  = partial update / modify
     */

    // Get info about logged in user
    Route::get('me', 'UserController@getUserInfo')
        ->middleware('can:user_read');

    /* Actions for User */
    // Create new user
//    Route::post('users');
    // Update logged in user
//    Route::patch('users/{user_id}');

    /* Actions for Wallet */
    // Get the wallet
//    Route::get('users/{user_id}/wallet');
    // Add wallet transaction
//    Route::post('users/{user_id}/wallet/transactions');

    /* Actions for Sender */
    // Create sender
//    Route::post('senders');
    // Read sender
//    Route::get('senders/{sender_id}');
    // Update sender
//    Route::patch('senders/{sender_id}');
    // Create / update documents
//    Route::patch('senders/{sender_id}/document');
    // Read documents
//    Route::get('senders/{sender_id}/document');

    /* Actions for Courier */
    // Create courier
//    Route::post('couriers');
    // Read courier
//    Route::get('couriers/{courier_id}');
    // Update courier
//    Route::patch('couriers/{courier_id}');
    // Create route
//    Route::post('couriers/{courier_id}/routes');
    // Delete route
//    Route::delete('couriers/{courier_id}/routes/{route_id}');
    // Create / update documents
//    Route::patch('couriers/{courier_id}/document');
    // Read documents
//    Route::get('couriers/{courier_id}/document');

    /* Actions for Package */
    // Create new package
//    Route::post('packages', 'PackageController@createPackage');
    // Read packages
//    Route::get('packages', 'PackageController@getUserPackages');
    // Read package
//    Route::get('packages/{package_id}');
    // Update package
//    Route::patch('packages/{package_id}', 'PackagesController@updatePackage);
    // Create transportation offer
//    Route::post('packages/{package_id}/offers');
    // Read offers
//    Route::get('packages/{package_id}/offers');
    // Update offer
//    Route::patch('packages/{package_id}/offers/{offer_id}');

    /* Actions for Message */
    // Get given conversation
    Route::get('conversations/{conversation_id}',
        'ConversationController@getConversation')
        ->where(['conversation_id' => '[0-9]+'])
        ->middleware('can:conversation_read');
    // Create message
    Route::post('messages', 'MessageController@createMessage')
        ->middleware('can:message_create');
});
