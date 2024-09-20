<?php

namespace Casimirorocha\LaravelPackageMaker\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SavePackageCredentials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:use
							{namespace : Root namespace of the package (Vendor\Package_name)}
							{path : Relative path to the package\'s directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets the specified package\'s credentials to use them later in other commands.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Cache::forever('package:namespace', $this->argument('namespace'));
        Cache::forever('package:path', $this->argument('path'));
    }
}
