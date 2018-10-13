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

//Route::post('/logout', 'UserApiController@logout');
//Route::post('/verify', 'UserApiController@verify');
//Route::post('/auth/facebook', 'Auth\SocialLoginController@facebookViaAPI');
//Route::post('/auth/google', 'Auth\SocialLoginController@googleViaAPI');
//Route::post('/forgot/password', 'UserApiController@forgot_password');
//Route::post('/reset/password', 'UserApiController@reset_password');


// APIs that do not require authenticated user, but require prefix
Route::group([
    'prefix' => 'v1',
], function () {
    // Create user
    Route::post('users', 'UserPublicController@createUser');
});

// APIs that require authenticated user
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

    /* Actions for User */

    // Get info about logged in user
    Route::get('me', 'UserController@getCurrentUserInfo')
        ->middleware('can:user_read');

    // Update logged in user
    Route::patch('users/{user_id}', 'UserController@updateUser')
        ->where(['user_id' => '[0-9]+'])
        ->middleware('can:user_update');

    /* Actions for Wallet */
    // Get the wallet
//    Route::get('users/{user_id}/wallet');
    // Add wallet transaction
//    Route::post('users/{user_id}/wallet/transactions');

    /* Actions for Sender */

    // Create sender
    Route::post('users/{user_id}/sender', 'SenderController@createSender')
        ->where(['user_id' => '[0-9]+'])
        ->middleware('can:sender_create');

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
    Route::post('users/{user_id}/courier', 'CourierController@createCourier')
        ->where(['user_id' => '[0-9]+'])
        ->middleware('can:courier_create');

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
    Route::post('packages', 'PackageController@createPackage')
        ->middleware('can:package_create');

    // Read packages for logged in sender
    Route::get('packages/sender', 'PackageController@getCurrentSenderPackages')
        ->middleware('can:package_read');

    // Read packages for logged in courier
    Route::get('packages/courier',
        'PackageController@getCurrentCourierPackages')
        ->middleware('can:package_read');

    // Read package
    Route::get('packages/{package_id}', 'PackageController@getPackage')
        ->middleware('can:package_read');

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

    /* Actions for lists */

    // Get list of document types
    Route::get('lists/document-types',
        'ListDocumentTypeController@getDocumentTypes');

    // Get list of insurance ranges
    Route::get('lists/insurance-ranges',
        'ListInsuranceRangeController@getInsuranceRanges');

    // Get list of package types
    Route::get('lists/package-types',
        'ListPackageTypeController@getPackageTypes');

    // Get list of transportation types
    Route::get('lists/transportation-types',
        'ListTransportationTypeController@getTransportationTypes');

});
