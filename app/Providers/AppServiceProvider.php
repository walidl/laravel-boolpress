<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

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

      view()->composer('parts.header', function($view) {
          $view->with('categories', Category::all());
        });
    }
}
