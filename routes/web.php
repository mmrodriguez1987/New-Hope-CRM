<?php
use newhopecrm\Person;

Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    
     // Route::get('person-test', function(){
    //     //$pasteles = Pastel::where('sabor','vainilla')->get();
    //     $persons = Person::with(['persontype','profession','position'])->get();
    //     dd($persons);
    // });


    //Persons
    Route::get('person', 'PersonController@index')->name('api.person.index');   
    Route::post('person', 'PersonController@store')->name('api.person.store');
    Route::put('person/{id}', 'PersonController@update')->name('api.person.update');
    Route::delete('person/{id}', 'PersonController@destroy')->name('api.person.destroy');
    Route::get('personList', 'PersonController@list')->name('api.person.list');

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