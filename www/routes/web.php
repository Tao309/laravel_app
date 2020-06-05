<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Index\IndexController@index')->name('home');

Auth::routes();

Route::group([
    'namespace' => 'News',
    'prefix' => 'news',
], function() {
    Route::get('/', 'IndexController@index')->name('news.list');
});
