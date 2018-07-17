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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
//Route::post('details', 'API\UserController@details')->middleware('auth:api');
//Route::post('all', 'API\ArticleController@all')->middleware('auth:api');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'API\UserController@details');
    Route::get('Articles', 'API\ArticleController@Articles');
    Route::get('Articles/{id}', 'API\ArticleController@Article');
    Route::delete('Articles/{id}', 'API\ArticleController@Remove');
    Route::post('Articles', 'API\ArticleController@Create');
    Route::put('Articles/{id}', 'API\ArticleController@Update');

});