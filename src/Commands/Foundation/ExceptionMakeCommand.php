<?php

namespace Casimirorocha\LaravelPackageMaker\Commands\Foundation;

use Illuminate\Foundation\Console\ExceptionMakeCommand as MakeException;
use Casimirorocha\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Casimirorocha\LaravelPackageMaker\Traits\HasNameInput;

class ExceptionMakeCommand extends MakeException
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:exception';

    /**
     * Get the destination class path.
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'src';
    }
}
