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
    Route::get('person', ['as' => 'api.person.index', 'uses' => 'PersonController@index']);
    Route::post('person', ['as' => 'api.person.store', 'uses' => 'PersonController@store']);
    Route::put('person/{id}', ['as' => 'api.person.update', 'uses' => 'PersonController@update']);
    Route::delete('person/{id}', ['as' => 'api.person.delete', 'uses' => 'PersonController@delete']);
});
