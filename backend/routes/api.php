<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([ 'prefix' => 'app' ], function() {
    Route::post('create-user', 'App\Http\Controllers\UserController@createUser');
    Route::post('login', 'App\Http\Controllers\AuthController@authenticate');

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        Route::post('create-company', 'App\Http\Controllers\CompanyController@createCompany');
        Route::put('company/add-user/{companyId}', 'App\Http\Controllers\CompanyController@addUserInCompany');
    });
});

