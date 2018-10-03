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
    Route::get('me', 'UserController@getUserInfo');
});
