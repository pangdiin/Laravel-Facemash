<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('images','ImagesController');

Route::resource('game','GameController');
