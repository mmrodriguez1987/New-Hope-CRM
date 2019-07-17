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


Route::post('/login', 'API\AuthController@login');
Route::post('/register', 'API\AuthController@register');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');

    //Persons
    Route::get('person', 'PersonController@index')->name('api.person.index');   
    Route::post('person', 'PersonController@store')->name('api.person.store');
    Route::put('person/{id}', 'PersonController@update')->name('api.person.update');
    Route::delete('person/{id}', 'PersonController@delete')->name('api.person.delete');
    Route::get('personList', 'PersonController@list')->name('api.person.list');

    Route::get('professionList', 'ProfessionController@list')->name('api.profession.list');
    Route::get('persontypeList', 'PersontypeController@list')->name('api.persontypeList.list');
    Route::get('positionList', 'PositionController@list')->name('api.position.list');
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


