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

Route::post('/abc/register', 'API\UserController@register');
Route::post('/abc/login', 'API\UserController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {

});

Route::post('/add','MatieresController@add');

Route::put('/update','MatieresController@update');

Route::post('/search','MatieresController@search');

Route::delete('/delete','MatieresController@delete');

Route::get('/getList','MatieresController@getList');

Route::get('/getDetails/{id}','MatieresController@getDetails');

Route::get('/count','MatieresController@count');