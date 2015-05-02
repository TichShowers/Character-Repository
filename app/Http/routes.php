<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('degeso', function() {
    return "Degeso";
});

//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

Route::get('login', 'AuthController@login');
Route::get('login', 'AuthController@authenticate');
Route::post('logout', 'AuthController@logout');

Route::group(['prefix' => 'admin'], function(){
    Route::resource('users', 'UsersController');
});

Route::get('/', ['as' => 'Home', 'uses' => 'CharacterController@index']);
Route::get('{category}/{character}', ['as' => 'Character', 'uses' => 'CharacterController@show']);
Route::get('{category}/{character}/gallery', ['as' => 'Gallery', 'uses' => 'CharacterController@gallery']);



