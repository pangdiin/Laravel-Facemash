<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('images/stats','ImageController@stats');
Route::resource('images','ImageController');

Route::resource('game','GameController');
