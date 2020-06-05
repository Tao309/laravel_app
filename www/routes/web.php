<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Index\IndexController@index')->name('home');

Auth::routes();

