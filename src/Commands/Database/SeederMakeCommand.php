<?php

namespace Casimirorocha\LaravelPackageMaker\Commands\Database;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as MakeSeeder;
use Casimirorocha\LaravelPackageMaker\Traits\CreatesPackageStubs;
use Casimirorocha\LaravelPackageMaker\Traits\HasNameInput;

class SeederMakeCommand extends MakeSeeder
{
    use CreatesPackageStubs, HasNameInput;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:seeder';

    /**
     * Get the destination class path.
     *
     * @return string
     */
    protected function resolveDirectory()
    {
        return $this->getDirInput().'/database/seeds/';
    }
}
