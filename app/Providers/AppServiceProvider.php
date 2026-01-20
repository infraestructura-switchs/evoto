<?php

namespace diser\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
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
