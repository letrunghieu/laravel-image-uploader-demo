<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/images');

Route::prefix('images')->name('images.')->group(function () {
    Route::get('/', 'ImageController@index')->name('index');
    Route::get('/{image}', 'ImageController@show')->name('show');
    Route::post('/{image}/tags', 'ImageController@addTagToImage')->name('add_tag');
});

Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', 'TagController@index')->name('index');
    Route::get('/{tag}', 'TagController@show')->name('show');
});
