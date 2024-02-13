<?php

namespace App\Providers;

use App\Models\wn_web_setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        view()->composer("layout.layout", function ($view) {
            $view->with("settings", wn_web_setting::all());
        });
    }
}
