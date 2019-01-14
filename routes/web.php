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

Route::prefix('api/admin')->middleware(['auth'])->group(function () {

    //Persons
    Route::get('getPersons', ['as' => 'get.person','uses' => 'PersonController@listPersons']);
    Route::post('createPerson', ['as' => 'create.person','uses' => 'PersonController@store']);
    Route::put('person/{id}', ['as' => 'update.person', 'uses' => 'PersonController@update']);
    Route::delete('person/{id}', ['as' => 'destroy.person','uses' => 'PersonController@destroy']);
    Route::get('personList', ['as' => 'list.person','uses' => 'PersonController@list']);



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

    //DropDowns
    Route::get('positionList', ['as' => 'api.position.list', 'uses' => 'PositionController@list']);
    Route::get('persontypeList', ['as' => 'api.persontype.list', 'uses' => 'PersontypeController@list']);
});


// Localization
Route::get('/js/lan.js', function () {
    $strings = Cache::remember('lan.js', 0, function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');
