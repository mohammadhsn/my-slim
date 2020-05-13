<?php

namespace Tests\Integrations;

use Tests\TestCase;

class HelloTest extends TestCase
{
    /** @test */
    public function it_says_hello()
    {
        $response = $this->request('GET', '/');

        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals((string) $response->getBody(), 'Hello world!');
    }
}
