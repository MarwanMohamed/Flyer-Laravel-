<?php

Route::get('/', 'PagesController@home');

Route::resource('flyers', 'FlyersController');
Route::POST('/{zip}/{street}/photos', 'FlyersController@addPhoto');

Route::auth();
Route::get('/home', 'HomeController@index');

Route::delete('photos/{id}', 'PhotosController@destroy');
Route::get('{zip}/{street}', 'FlyersController@show');
