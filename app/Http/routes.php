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
        return view('test');
    });
    Route::get('/welcome', 'HomeController@welcome')->name('home.welcome');
    Route::group(['middleware'=>'auth'], function(){

        Route::resource('character', 'CharacterController');
        Route::post('character/template', 'CharacterController@template')->name('character.store.template');
        // Route::resource('campaign', 'characterController');
        Route::get('library', 'LibraryController@index')->name('library.index');

        Route::get('/', 'HomeController@index')->name('home');
    });
});
