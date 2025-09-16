<?php

namespace Ashraam\Capjs\Tests\Unit;

use Ashraam\Capjs\Rules\Capjs;
use Ashraam\Capjs\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class CapjsValidationRuleTest extends TestCase
{
    /** @test */
    public function it_passes_when_the_token_is_valid()
    {
        Http::fake([
            '*' => Http::response(['success' => true]),
        ]);

        $rule = new Capjs();

        $this->assertTrue($rule->passes('attribute', 'valid-token'));
    }

    /** @test */
    public function it_fails_when_the_token_is_invalid()
    {
        Http::fake([
            '*' => Http::response(['success' => false, 'error' => 'Invalid token']),
        ]);

        $rule = new Capjs();

        $this->assertFalse($rule->passes('attribute', 'invalid-token'));
        $this->assertEquals('Invalid token', $rule->message());
    }
}
