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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([ 'prefix' => 'auth' ], function () 
{
//     Route::post('login', 'App\Http\Controllers\AuthController@login');
//     Route::post('signup', 'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::group([ 'middleware' => 'auth:api' ], function() 
    {
       
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        
        Route::get('me', 'App\Http\Controllers\AuthController@user');
      //  Route::get('list', 'App\Http\Controllers\UserController@list');

        Route::post('create', 'App\Http\Controllers\CVController@create');
        


        
        Route::group(['prefix' => 'admin'], function()
        {

            Route::group(['middleware' => 'User-Account-Admin'], function()
            {

                Route::get('list', 'App\Http\Controllers\CVController@list');

                Route::get('find/{id}', 'App\Http\Controllers\CVController@find');

                Route::post('done/{id}', 'App\Http\Controllers\CVController@done');

                Route::get('getuser/{id}', 'App\Http\Controllers\CVController@getUser');

                Route::get('reject/{id}', 'App\Http\Controllers\CVController@reject');

                Route::post('createconfirm', 'App\Http\Controllers\ConfirmController@create');

                Route::get('listconfirm', 'App\Http\Controllers\ConfirmController@list');

                Route::get('check', 'App\Http\Controllers\UserController@check');

                Route::get('valueconfirm/{id}', 'App\Http\Controllers\CVController@valueConfirm');

                Route::post('approve/{id}', 'App\Http\Controllers\CVController@approve');

            });
            


        });

        

        
    });
});


?>