<?php


//Auth::routes();

Route::get('/', 'Admin\DashController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {

     //Persons
    Route::get('person', 'PersonController@index')->name('api.person.index');   
    Route::post('person', 'PersonController@store')->name('api.person.store');
    Route::put('person/{id}', 'PersonController@update')->name('api.person.update');
    Route::delete('person/{id}', 'PersonController@delete')->name('api.person.delete');
    Route::get('personList', 'PersonController@list')->name('api.person.list');

    //Professions
    Route::get('profession', 'ProfessionController@index')->name('api.profession.index');   
    Route::post('profession', 'ProfessionController@store')->name('api.profession.store');
    Route::put('profession/{id}', 'ProfessionController@update')->name('api.profession.update');
    Route::delete('profession/{id}', 'ProfessionController@delete')->name('api.profession.delete');
    Route::get('professionList', 'ProfessionController@list')->name('api.profession.list');

    //Postions
    Route::get('position', 'PositionController@index')->name('api.position.index');
    Route::post('position', 'PositionController@store')->name('api.position.store');
    Route::put('position/{id}', 'PositionController@update')->name('api.position.update');
    Route::delete('position/{id}','PositionController@delete')->name('api.position.delete');
    Route::get('positionList', 'PositionController@positionList')->name('api.position.list');

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
            $files = glob(resource_path('lang/' . $lang . '/*.php'));
            $strings = [];
            foreach ($files as $file) {
                $name = basename($file, '.php');
                $strings[$name] = require $file;
            }
            return $strings;
        });

        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        exit();
    })->name('assets.lang');