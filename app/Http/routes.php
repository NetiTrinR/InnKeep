<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('test', function(){
        dd(App\User::all());
    });

    Route::get('/welcome', 'HomeController@welcome')->name('home.welcome');

    // Login required
    Route::group(['middleware'=>'auth'], function(){

        //Character
        Route::resource('character', 'CharacterController');
        Route::post('character/template', 'CharacterController@template')->name('character.store.template');

        // Library
        Route::group(['prefix'=>'library'], function(){
            Route::resource('journal', 'JournalController');
            Route::resource('item', 'ItemController');
            Route::resource('tag', 'TagController');
            Route::get('/', 'LibraryController@index')->name('library.index');
        });

        // Home
        Route::get('/', 'HomeController@index')->name('home');
    });
});
