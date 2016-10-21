<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'GalleryController@getIndex',
    'as'   => 'index'
]);

Route::group(['prefix' => '/users'], function () {

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as'   => 'user.signin'
    ]);

    Route::get('/signup', [
        'uses' => 'UserController@getSignUp',
        'as'   => 'get.user.signup'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as'   => 'post.user.signup'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as'   => 'get.user.logout'
    ]);

});

// '

Route::group(['prefix' => '/gallery', 'middleware' => 'auth'], function () {

    Route::get('/list', [
        'uses' => 'GalleryController@getGalleryList',
        'as'   => 'get.gallery'
    ]);

    Route::post('/save', [
        'uses' => 'GalleryController@postGallery',
        'as'   => 'post.gallery'
    ]);

    Route::get('/view/{id}', [
        'uses' => 'GalleryController@getGalleryPics',
        'as'   => 'get.galleryPics'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'GalleryController@postDeleteGallery',
        'as'   => 'delete.gallery'
    ]);
});

Route::post('/image/do-upload', [
    'uses' => 'GalleryController@postImageUpload',
    'as'   => 'post.doUpload'
]);