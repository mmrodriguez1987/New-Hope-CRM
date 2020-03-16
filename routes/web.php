<?php
    Route::get('robots.txt', 'RobotsController');
     Auth::routes();
     Route::post('/login', 'Auth\LoginController@doLogin');
     Route::post('/register', 'Auth\RegisterController@register');
     Route::get('/logout', 'Auth\LoginController@logout');

     Route::prefix('admin')->middleware(['auth'])->group(function () {

         Route::get('/', 'Admin\DashController@index')->name('HomeAdmin');
        //Persons
         Route::get('person', 'Admin\PersonController@index')->name('api.person.index');   
         Route::post('person', 'Admin\PersonController@store')->name('api.person.store');
         Route::put('person/{id}', 'Admin\PersonController@update')->name('api.person.update');
         Route::delete('person/{id}', 'Admin\PersonController@delete')->name('api.person.delete');
         Route::get('personList', 'Admin\PersonController@list')->name('api.person.list');

        // Professions
         Route::get('profession', 'Admin\ProfessionController@index')->name('api.profession.index');   
         Route::post('profession', 'Admin\ProfessionController@store')->name('api.profession.store');
         Route::put('profession/{id}', 'Admin\ProfessionController@update')->name('api.profession.update');
         Route::delete('profession/{id}', 'Admin\ProfessionController@delete')->name('api.profession.delete');
         Route::get('professionList', 'Admin\ProfessionController@list')->name('api.profession.list');

         //Postions
         Route::get('position', 'Admin\PositionController@index')->name('api.position.index');
         Route::post('position', 'Admin\PositionController@store')->name('api.position.store');
         Route::put('position/{id}', 'Admin\PositionController@update')->name('api.position.update');
         Route::delete('position/{id}','Admin\PositionController@delete')->name('api.position.delete');
         Route::get('positionList', 'Admin\PositionController@positionList')->name('api.position.list');

         //Person types
         Route::get('persontype', 'Admin\PersontypeController@index')->name('api.persontype.index');
         Route::post('persontype', 'Admin\PersontypeController@store')->name('api.persontype.store');
         Route::put('persontype/{id}', 'Admin\PersontypeController@update')->name('api.persontype.update');
         Route::delete('persontype/{id}', 'Admin\PersontypeController@delete')->name('api.persontype.delete');
         Route::get('persontypeList','Admin\PersontypeController@list')->name('api.persontype.list');
     });


      //Localization
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