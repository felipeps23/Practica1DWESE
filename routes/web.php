<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('forgoten','newController@forgoten');
Route::get('welcome','newController@welcome');
Route::any('signin/{msj?}','newController@signin');
Route::any('userhome/','newController@userhome');
Route::get('home/','PrimerController@home');

Route::resource('Producto','ProductoController');

Route::fallback(function() {
    return '<h1>Error 404</h1>';
});