<?php

namespace diser\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->app->bind('path.public', function() {
       //      return base_path('/../public_html/diser/');
       //      });
         date_default_timezone_set('America/Bogota');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
