<?php

namespace Tests\Integrations;

use Tests\TestCase;
use Slim\Psr7\Factory\ServerRequestFactory;

class HelloTest extends TestCase
{
    /** @test */
    public function it_says_hello()
    {
        $factory = new ServerRequestFactory();

        $response = $this->app->handle($factory->createServerRequest('GET', '/'));

        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals((string) $response->getBody(), 'Hello world!');
    }
}
