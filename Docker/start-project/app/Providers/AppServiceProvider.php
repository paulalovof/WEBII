<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\{textbox, button, selectbox, datatable};
use Illuminate\Support\Facades\Blade;

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
        Blade::component('components.textbox', 'textbox');
        Blade::component('components.button', 'button');
        Blade::component('components.selectbox', 'selectbox');
        Blade::component('components.datatable', 'datatable');
    }
}

