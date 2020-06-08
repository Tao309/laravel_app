<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Index\IndexController@index')->name('home');

Auth::routes();

Route::group([
    'namespace' => 'News',
//    'prefix' => 'news',
    'as' => 'news.',
], function() {
    Route::resource('/news', 'NewsController')->parameter('news', 'id');
});

Route::group([
    'namespace' => 'News\Admin',
    'prefix' => 'admin',
    'as' => 'news.admin.',
], function() {
    Route::resource('/categories', 'CategoryController')->parameter('category', 'id');
});
