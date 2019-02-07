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



Route::prefix('admin')->group(function () {
    
    
    //Persons
    Route::get('person', 'PersonController@index');
    Route::post('person', ['as' => 'person.store','uses' => 'PersonController@store']);
    Route::put('person/{id}', ['as' => 'person.update', 'uses' => 'PersonController@update']);
    Route::delete('person/{id}', ['as' => 'person.destroy','uses' => 'PersonController@destroy']);
    Route::get('personList', ['as' => 'person.list','uses' => 'PersonController@list']);

 
});