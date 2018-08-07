<?php

namespace Signifly\DefinitionSchema;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DefinitionSchemaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Route::macro('definitions', function () {
            return $this->get(
                'definitions/{type}/{entity}',
                Http\Controllers\DefinitionController::class.'@show'
            );
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\DefinitionMakeCommand::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
