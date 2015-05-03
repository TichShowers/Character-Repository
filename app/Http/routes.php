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

function createRouteGroup($groupname, $controllername)
{
    Route::get($groupname.'/', ['as' => 'admin.'.$groupname.'.index', 'uses' => 'Admin\\'.$controllername.'@index']);
    Route::get($groupname.'/new', ['as' => 'admin.'.$groupname.'.create', 'uses' => 'Admin\\'.$controllername.'@create']);
    Route::post($groupname.'/new', ['as' => 'admin.'.$groupname.'.store', 'uses' => 'Admin\\'.$controllername.'@store']);
    Route::get($groupname.'/edit/{id}', ['as' => 'admin.'.$groupname.'.edit', 'uses' => 'Admin\\'.$controllername.'@edit']);
    Route::post($groupname.'/edit/{id}', ['as' => 'admin.'.$groupname.'.update', 'uses' => 'Admin\\'.$controllername.'@update']);
    Route::post($groupname.'/delete/{id}', ['as' => 'admin.'.$groupname.'.delete', 'uses' => 'Admin\\'.$controllername.'@destroy']);
}

Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@authenticate');
Route::post('logout', 'AuthController@logout');

Route::group(['prefix' => 'admin'], function(){
    createRouteGroup('category', 'CategoryController');
    createRouteGroup('users', 'UserController');
});

Route::get('/', ['as' => 'Home', 'uses' => 'CharacterController@index']);
Route::get('{category}/{character}', ['as' => 'Character', 'uses' => 'CharacterController@show']);
Route::get('{category}/{character}/gallery', ['as' => 'Gallery', 'uses' => 'CharacterController@gallery']);



