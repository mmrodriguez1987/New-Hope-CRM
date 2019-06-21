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

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
});

// Route::prefix('auth')->group(function () {
//     Route::post('register', 'AuthController@register');
//     Route::post('login', 'AuthController@login');
//     Route::get('refresh', 'AuthController@refresh');

//     Route::group(['middleware' => 'auth:api'], function(){
//         Route::get('user', 'AuthController@user');
//         Route::post('logout', 'AuthController@logout');
//     });
// });

// Route::group(['middleware' => 'auth:api'], function(){
//     // Users
//     Route::get('users', 'UserController@index')->middleware('isAdmin');
//     Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
// });

// Route::prefix('admin')->group(function () {   
    
//     //Persons
//     Route::get('person', 'PersonController@index');
//     Route::post('person', ['as' => 'person.store','uses' => 'PersonController@store']);
//     Route::put('person/{id}', ['as' => 'person.update', 'uses' => 'PersonController@update']);
//     Route::delete('person/{id}', ['as' => 'person.destroy','uses' => 'PersonController@destroy']);
//     Route::get('personList', ['as' => 'person.list','uses' => 'PersonController@list']);

 
// });