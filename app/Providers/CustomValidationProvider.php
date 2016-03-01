<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('pin', function($attribute, $value, $parameters, $validator){
            return $value == env('REGISTRATION_PIN');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
