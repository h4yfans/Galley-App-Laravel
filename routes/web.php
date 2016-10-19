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

Route::get('/', function () {
    return view('users.login');
});

Route::group(['prefix' => '/users'], function () {

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as'   => 'user.signin'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as'   => 'user.signup'
    ]);


});

//, 'middleware' => 'auth'

Route::group(['prefix' => '/gallery'], function () {

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
});

Route::post('/image/do-upload', [
    'uses' => 'GalleryController@postImageUpload',
    'as'   => 'post.image'
]);