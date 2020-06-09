<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Index\IndexController@index')->name('home');

Auth::routes();

Route::group([
    'namespace' => 'News',
//    'prefix' => 'news',
    'as' => 'news.',
], function() {
    $methods = ['index', 'show'];
    Route::resource('/news', 'PostController')
        ->parameter('post', 'id')
        ->only($methods);
});

Route::group([
    'namespace' => 'News\Admin',
    'prefix' => 'admin',
    'as' => 'news.admin.',
], function() {
    Route::resource('/posts', 'PostController')
        ->parameter('post', 'id')
        ->except(['show']);

    Route::resource('/categories', 'CategoryController')
        ->parameter('category', 'id')
        ->except(['show']);
});
