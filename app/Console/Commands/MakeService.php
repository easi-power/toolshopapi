<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    public $name = 'make:service';

    public $description = 'Create a new service class';

    protected $type = 'Service';

    protected function getStub()
    {
        return base_path('/stubs/service.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }
}
