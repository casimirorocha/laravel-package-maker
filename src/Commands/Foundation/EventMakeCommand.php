<?php

namespace Casimirorocha\LaravelPackageMaker\Commands\Foundation;

use Illuminate\Foundation\Console\EventMakeCommand as MakeEvent;
use Casimirorocha\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Casimirorocha\LaravelPackageMaker\Traits\HasNameInput;

class EventMakeCommand extends MakeEvent
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:event';

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
