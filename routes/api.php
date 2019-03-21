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

Route::group([
    'prefix' => 'auth',
    'middleware' => 'api'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
    Route::get('refresh', 'AuthController@refresh');
});

Route::group([
    'prefix' => 'projects'
], function() {
    Route::group([
        'middleware' => 'auth:api'
      ], function() {
        Route::post('/', 'ProjectsController@create');
        Route::get('/{projectId?}', 'ProjectsController@list');
        Route::delete('/{projectId}', 'ProjectsController@delete');

        Route::post('{projectId}/tags', 'ProjectsController@createTag');
        Route::get('{projectId}/tags', 'ProjectsController@listTags');
      });
});