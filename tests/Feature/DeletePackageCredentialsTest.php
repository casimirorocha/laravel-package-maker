<?php

namespace Casimirorocha\LaravelPackageMaker\Tests\Feature;

use Casimirorocha\LaravelPackageMaker\Tests\TestCase;
use Illuminate\Support\Facades\Cache;

class DeletePackageCredentialsTest extends TestCase
{
    /** @test */
    public function it_can_delete_package_credentials_from_cache()
    {
        $this->artisan('package:use', [
            'namespace' => 'Test\Package',
            'path' => './tests/Support/package',
        ]);

        $this->artisan('package:delete');

        $this->assertNull(Cache::get('package:namespace'));
        $this->assertNull(Cache::get('package:path'));
    }
}
