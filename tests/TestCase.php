<?php

namespace Ashraam\Capjs\Tests;

use Ashraam\Capjs\CapjsServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CapjsServiceProvider::class,
        ];
    }
}
