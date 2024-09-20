<?php

namespace Casimirorocha\LaravelPackageMaker\Commands\Foundation;

use Illuminate\Foundation\Console\RequestMakeCommand as MakeRequest;
use Casimirorocha\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Casimirorocha\LaravelPackageMaker\Traits\HasNameInput;

class RequestMakeCommand extends MakeRequest
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:request';

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
