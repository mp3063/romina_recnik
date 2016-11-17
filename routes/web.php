<?php
Route::resource('recnik', 'RecniciController');
Route::get('/', 'RecniciController@index');
Route::get('search', 'RecniciController@search');
Route::get('/{id}/destroy', 'RecniciController@destroy');
Route::post('/ime_recnika', 'RecniciController@create');