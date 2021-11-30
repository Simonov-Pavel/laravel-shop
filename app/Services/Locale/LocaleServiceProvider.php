<?php

namespace App\Services\Locale;

use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Locale', 'App\Services\Locale\LocaleService');
    }
}