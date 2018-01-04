<?php

Route::post('/register','registerController@registerCheck');
Route::post('/search','searchController@search');
Route::get('/renew/{id}','userController@renew');
Route::get('/','loginController@index');
Route::get('/update','userController@update');
Route::post('/home','loginController@conform');


