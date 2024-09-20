<?php

namespace Casimirorocha\LaravelPackageMaker\Tests\Feature;

use Casimirorocha\LaravelPackageMaker\Tests\TestCase;
use Illuminate\Support\Facades\Cache;

class SavePackageCredentialsTest extends TestCase
{
    /** @test */
    public function it_can_save_the_given_credentials_to_the_cache()
    {
        $namespace = 'Test\Package';
        $path = './tests/Support/package';

        $this->artisan('package:use', [
            'namespace' => $namespace,
            'path' => $path,
        ]);

        $this->assertEquals($namespace, Cache::get('package:namespace'));
        $this->assertEquals($path, Cache::get('package:path'));
    }
}
