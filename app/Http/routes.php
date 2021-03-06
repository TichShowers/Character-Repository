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
    createRouteGroup('user', 'UserController');
    Route::get('user/password/{id}', ['as' => 'admin.user.password', 'uses' => 'Admin\UserController@password']);
    Route::post('user/password/{id}', ['as' => 'admin.user.passwordsave', 'uses' => 'Admin\UserController@passwordsave']);

    createRouteGroup('social-link', 'SocialLinkController');
    createRouteGroup('character', 'CharacterController');
    Route::get('character/image/{id}', ['as' => 'admin.character.image', 'uses' => 'Admin\CharacterController@image']);
    Route::post('character/image/{id}', ['as' => 'admin.character.upload', 'uses' => 'Admin\CharacterController@upload']);
    Route::get('character/assign/{id}', ['as' => 'admin.character.assign', 'uses' => 'Admin\CharacterController@assign']);
    Route::post('character/assign/{id}/add/{image}', ['as' => 'admin.character.add', 'uses' => 'Admin\CharacterController@add']);
    Route::post('character/assign/{id}/remove/{image}', ['as' => 'admin.character.remove', 'uses' => 'Admin\CharacterController@remove']);

    createRouteGroup('image', 'ImageController');
    Route::get('image/image/{id}', ['as' => 'admin.image.image', 'uses' => 'Admin\ImageController@image']);
    Route::post('image/image/{id}', ['as' => 'admin.image.upload', 'uses' => 'Admin\ImageController@upload']);
});

Route::get('/', ['as' => 'Home', 'uses' => 'CharacterController@index']);
Route::get('{category}/{character}', ['as' => 'Character', 'uses' => 'CharacterController@show']);
Route::get('{category}/{character}/gallery', ['as' => 'Gallery', 'uses' => 'CharacterController@gallery']);



