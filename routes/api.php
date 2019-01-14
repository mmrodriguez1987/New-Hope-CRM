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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('api/admin')->group(function() {
  Route::get('getPersons', ['as' => 'get.persons','uses' => 'PersonControler@listPersons']);
  Route::post('createPersons', ['as' => 'create.persons', 'uses' => 'PersonController@store']);
  Route::put('perosn/{id}', ['as' => 'update.person', 'uses' => 'PersonController@update']);
  Route::delete('person/{id}', ['as' => 'delete.person', 'uses' => 'PersonController@destroy']);
  Route::get('personList',['as' => 'list.person', 'uses' => 'PersonControler@list']);

})
