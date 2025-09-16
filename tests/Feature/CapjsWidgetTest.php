<?php

namespace Ashraam\Capjs\Tests\Feature;

use Ashraam\Capjs\Tests\TestCase;

class CapjsWidgetTest extends TestCase
{
    /** @test */
    public function it_renders_the_capjs_widget_component()
    {
        $this->app['config']->set('capjs.host', 'host.com');
        $this->app['config']->set('capjs.key', 'test-key');

        $view = $this->blade('<x-capjs-widget />');

        $view->assertSee('cap-widget');
        $view->assertSee('data-cap-api-endpoint="host.com/test-key/"', false);
    }
}
