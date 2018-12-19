<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return new UserResource($request->user());
    });

    Route::get('users', 'UserController@index');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

Route::group(['prefix' => '/categories'], function () {
    Route::get('', 'CategoryController@index');
    Route::post('', 'CategoryController@store')->middleware(['auth', 'admin']);
    Route::get('/{category}', 'CategoryController@show');
    Route::patch('/{category}', 'CategoryController@update')->middleware(['auth', 'admin']);
    Route::delete('/{category}', 'CategoryController@destroy')->middleware(['auth', 'admin']);
});

Route::group(['prefix' => '/events'], function () {
    Route::get('', 'EventController@index');
    Route::post('', 'EventController@store')->middleware('auth');
    Route::get('/{event}', 'EventController@show');
    Route::post('/{event}', 'EventController@update')->middleware('auth');
    Route::patch('/{event}/approve', 'EventController@approve')->middleware(['auth', 'approver']);
    Route::delete('/{event}', 'EventController@destroy')->middleware(['auth', 'approver']);
});


Route::group(['middleware' => ['auth:api', 'admin'], 'prefix' => '/privileges'], function () {
    Route::get('', 'PrivilegeController@index');
    Route::post('', 'PrivilegeController@store');
    Route::delete('{privilege}', 'PrivilegeController@destroy');
});