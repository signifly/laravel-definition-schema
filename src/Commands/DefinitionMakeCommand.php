<?php

namespace Signifly\DefinitionSchema\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class DefinitionMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:definition';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Definition class.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Definition';

    /**
     * Get the default namespace for the class.
     *
     * @param  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('view')) {
            return "{$rootNamespace}\Definitions\View";
        };

        return "{$rootNamespace}\Definitions\Table";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('view')) {
            return __DIR__ . '/stubs/view.stub';
        }

        return __DIR__ . '/stubs/table.stub';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['view', null, InputOption::VALUE_NONE, 'Indicates if the generated definition should be a view definition.'],
        ];
    }
}
