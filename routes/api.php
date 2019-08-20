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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});



Route::group([
    'prefix' => 'parent'
], function () {
    Route::post('login', 'SparentController@login');
    Route::post('signup', 'SparentController@signup');
  
    Route::group([
      'middleware' => 'parent:api'
    ], function() {
        Route::get('logout', 'SparentController@logout');
        Route::get('user', 'SparentController@user');
    });
});



Route::group([
    'prefix' => 'Bus'
], function () {
    Route::post('login', 'BusController@login');
    Route::post('signup', 'BusController@signup');
  
    Route::group([
      'middleware' => 'Bus:api'
    ], function() {
        Route::get('logout', 'Bus@logout');
        Route::get('user', 'SparentController@user');
    });
});