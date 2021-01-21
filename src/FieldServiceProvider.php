<?php

namespace Lhilton\TextAutoComplete;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('text-auto-complete', __DIR__.'/../dist/js/field.js');
            Nova::style('text-auto-complete', __DIR__.'/../dist/css/field.css');
        });
    }
}
