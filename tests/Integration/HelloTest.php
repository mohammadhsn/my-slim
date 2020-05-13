<?php

use PHPUnit\Framework\TestCase;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

class HelloTest extends TestCase
{
    /** @test */
    public function it_says_hello()
    {
        $app = AppFactory::create();

        require 'src/app.php';

        $factory = new ServerRequestFactory();

        $response = $app->handle($factory->createServerRequest('GET', '/'));

        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals((string) $response->getBody(), 'Hello world!');
    }
}
