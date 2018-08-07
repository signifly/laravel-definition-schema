<?php

namespace Signifly\DefinitionSchema;

use Illuminate\Support\ServiceProvider;
use Signifly\DefinitionSchema\Commands\DefinitionMakeCommand;
use Signifly\DefinitionSchema\Http\Controllers\DefinitionController;

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
                DefinitionController::class.'@show'
            );
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                DefinitionMakeCommand::class,
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
