<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function()
        {
        	return realpath(base_path().'/../public_html');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        HeadingRowFormatter::extend('heading-product', function($value, $key) {
            return config('constraint.heading')[$key];
        });

        HeadingRowFormatter::default('heading-product');
    }
}
