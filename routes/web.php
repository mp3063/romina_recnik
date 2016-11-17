<?php
/**
 * Authentication
 */
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
/**
 * Rute za recnik
 */
Route::resource('recnik', 'RecniciController');
Route::get('/', 'RecniciController@index');
Route::get('search', 'RecniciController@search');
Route::get('/{id}/destroy', 'RecniciController@destroy');
Route::post('/ime_recnika', 'RecniciController@create');
/**
 * Plata
 */
Route::get('/plata', 'IzracunavanjePlateController@index');
Route::post('/plata', 'IzracunavanjePlateController@plata');