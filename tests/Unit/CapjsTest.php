<?php

namespace Ashraam\Capjs\Tests\Unit;

use Ashraam\Capjs\Capjs;
use Ashraam\Capjs\Tests\TestCase;

class CapjsTest extends TestCase
{
    /** @test */
    public function it_returns_the_script_tag()
    {
        $expected = '<script src="https://cdn.jsdelivr.net/npm/@cap.js/widget"></script>';

        $this->assertEquals($expected, (new Capjs())->script());
    }
}
