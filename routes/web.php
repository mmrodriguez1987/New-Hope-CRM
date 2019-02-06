<?php


Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::prefix('admin')->group(function () {
    
    
    //Persons
    Route::get('person', 'PersonController@index');
    Route::post('person', ['as' => 'person.store','uses' => 'PersonController@store']);
    Route::put('person/{id}', ['as' => 'person.update', 'uses' => 'PersonController@update']);
    Route::delete('person/{id}', ['as' => 'person.destroy','uses' => 'PersonController@destroy']);
    Route::get('personList', ['as' => 'person.list','uses' => 'PersonController@list']);

    //Postions
    Route::get('position', ['as' => 'position.index', 'uses' => 'PositionController@index']);
    Route::post('position', ['as' => 'position.store', 'uses' => 'PositionController@store']);
    Route::put('position/{id}', ['as' => 'position.update', 'uses' => 'PositionController@update']);
    Route::delete('position/{id}', ['as' => 'position.delete', 'uses' => 'PositionController@delete']);

    //Person types
    Route::get('persontype', ['as' => 'persontype.index', 'uses' => 'PersontypeController@index']);
    Route::post('persontype', ['as' => 'persontype.store', 'uses' => 'PersontypeController@store']);
    Route::put('persontype/{id}', ['as' => 'persontype.update', 'uses' => 'PersontypeController@update']);
    Route::delete('persontype/{id}', ['as' => 'persontype.delete', 'uses' => 'PersontypeController@delete']);

    //DropDowns
    Route::get('positionList', ['as' => 'position.list', 'uses' => 'PositionController@positionList']);
    Route::get('personTypeList', ['as' => 'persontype.list', 'uses' => 'PersontypeController@personTypelist']);
});


// Localization
Route::get('/js/lang.js', function () {
    $strings = Cache::rememberForever('lang.js', function () {
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