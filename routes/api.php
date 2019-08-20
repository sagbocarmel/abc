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



//Routes vers les notes
Route::post('note', 'NotesController@insertNote');
Route::post('note/update', 'NotesController@updateNote');
Route::post('note/delete', 'NotesController@deleteNote');
Route::post('note/search', 'NotesController@searchNote');
Route::post('note/index', 'NotesController@getListNote');

//Routes vers les moyennes
Route::post('moyenne/matiere', 'MoyennesController@updateMoyenneMatiere');
Route::post('moyenne/periode', 'MoyennesController@updateMoyennePeriode');
Route::post('moyenne/annuelle', 'MoyennesController@updateMoyenneAnnuelle');

//Routes vers les evaluations
Route::post('evaluation/add', 'EvaluationsController@add');
Route::post('evaluation/update', 'EvaluationsController@update');
Route::get('evaluation/search', 'EvaluationsController@search');
Route::post('evaluation/delete', 'EvaluationsController@delete');
Route::get('evaluation/index', 'EvaluationsController@getList');
Route::get('evaluation/details', 'EvaluationsController@getDetails');
Route::get('evaluation/count', 'EvaluationsController@count');
Route::post('evaluation/attr', 'EvaluationsController@attribuerNotes');

