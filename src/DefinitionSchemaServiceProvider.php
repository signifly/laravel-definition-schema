<?php

namespace Signifly\DefinitionSchema;

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
