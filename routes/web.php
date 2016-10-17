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
    return view('welcome');
});

Route::get('gallery/list', [
    'uses' => 'GalleryController@getGalleryList',
    'as' => 'get.gallery'
]);

Route::post('gallery/save', [
    'uses' => 'GalleryController@postGallery',
    'as' => 'post.gallery'
]);

Route::get('gallery/view/{id}', [
    'uses' => 'GalleryController@getGalleryPics',
    'as' => 'get.galleryPics'
]);

Route::post('image/do-upload', [
    'uses' => 'GalleryController@postImageUpload',
    'as' => 'post.image'
]);