<?php

namespace Signifly\DefinitionSchema;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Signifly\DefinitionSchema\Commands\DefinitionMakeCommand;

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
                '\Signifly\DefinitionSchema\Http\Controllers\DefinitionController@show'
            )->name('definitions.show');
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
