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
    Route::delete('person/{id}', 'PersonController@delete')->name('api.person.destroy');
    Route::get('personList', 'PersonController@list')->name('api.person.list');

    //Professions
    Route::get('profession', 'ProfessionController@index')->name('api.profession.index');   
    Route::post('profession', 'ProfessionController@store')->name('api.profession.store');
    Route::put('profession/{id}', 'ProfessionController@update')->name('api.profession.update');
    Route::delete('profession/{id}', 'ProfessionController@delete')->name('api.profession.destroy');
    Route::get('professionList', 'ProfessionController@list')->name('api.profession.list');

    //Postions
    Route::get('position', ['as' => 'position.index', 'uses' => 'PositionController@index']);
    Route::post('position', ['as' => 'position.store', 'uses' => 'PositionController@store']);
    Route::put('position/{id}', ['as' => 'position.update', 'uses' => 'PositionController@update']);
    Route::delete('position/{id}', ['as' => 'position.delete', 'uses' => 'PositionController@delete']);
    Route::get('positionList', ['as' => 'position.list', 'uses' => 'PositionController@positionList']);

    //Person types
    Route::get('persontype', 'PersontypeController@index')->name('api.persontype.index');
    Route::post('persontype', 'PersontypeController@store')->name('api.persontype.store');
    Route::put('persontype/{id}', 'PersontypeController@update')->name('api.persontype.update');
    Route::delete('persontype/{id}', 'PersontypeController@delete')->name('api.persontype.delete');
    Route::get('persontypeList','PersontypeController@list')->name('api.persontype.list');

    
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