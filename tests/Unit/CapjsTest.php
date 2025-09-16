<?php

namespace Ashraam\Capjs\Tests\Unit;

use Ashraam\Capjs\Capjs;
use Ashraam\Capjs\Tests\TestCase;

class CapjsTest extends TestCase
{
    /** @test */
    public function it_returns_the_script_tag()
    {
        app()['config']->set('capjs.host', 'host.com');

        $expected = '<script src="host.com/assets/widget.js"></script>';

        $this->assertEquals($expected, (new Capjs())->script());
    }
}
