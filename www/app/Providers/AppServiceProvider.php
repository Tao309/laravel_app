<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\News\Post::observe(\App\Observers\News\PostObserver::class);
        \App\Models\News\Category::observe(\App\Observers\News\CategoryObserver::class);
    }
}
