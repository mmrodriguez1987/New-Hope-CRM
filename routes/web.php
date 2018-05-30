<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::group(['prefix' => 'api/v1'], function () {
    //Persons
    Route::get('person', ['as' => 'api.person.index', 'uses' => 'PersonController@index']);
    Route::post('person', ['as' => 'api.person.store', 'uses' => 'PersonController@store']);
    Route::put('person/{id}', ['as' => 'api.person.update', 'uses' => 'PersonController@update']);
    Route::delete('person/{id}', ['as' => 'api.person.delete', 'uses' => 'PersonController@delete']);

    //Postions
    Route::get('position', ['as' => 'api.position.index', 'uses' => 'PositionController@index']);
    Route::post('position', ['as' => 'api.position.store', 'uses' => 'PositionController@store']);
    Route::put('position/{id}', ['as' => 'api.position.update', 'uses' => 'PositionController@update']);
    Route::delete('position/{id}', ['as' => 'api.position.delete', 'uses' => 'PositionController@delete']);

    //Person types
    Route::get('persontype', ['as' => 'api.persontype.index', 'uses' => 'PersontypeController@index']);
    Route::post('persontype', ['as' => 'api.persontype.store', 'uses' => 'PersontypeController@store']);
    Route::put('persontype/{id}', ['as' => 'api.persontype.update', 'uses' => 'PersontypeController@update']);
    Route::delete('persontype/{id}', ['as' => 'api.persontype.delete', 'uses' => 'PersontypeController@delete']);
});
