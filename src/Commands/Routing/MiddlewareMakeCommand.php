<?php

namespace Casimirorocha\LaravelPackageMaker\Commands\Routing;

use Illuminate\Routing\Console\MiddlewareMakeCommand as MakeMiddleware;
use Casimirorocha\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Casimirorocha\LaravelPackageMaker\Traits\HasNameInput;

class MiddlewareMakeCommand extends MakeMiddleware
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:middleware';

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
