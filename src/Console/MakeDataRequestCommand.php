<?php

namespace Arshidkv12\DataRequest\Console;

use Illuminate\Console\GeneratorCommand;

class MakeDataRequestCommand extends GeneratorCommand
{
    protected $name = 'make:datarequest';

    protected $description = 'Create a new form data request class';

    protected $type = 'FormDataRequest';

    protected function getStub(): string
    {
        return __DIR__ . '/stubs/datarequest.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Http\Requests';
    }
}
