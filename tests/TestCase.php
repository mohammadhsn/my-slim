<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Factory\ServerRequestFactory;
use Slim\App;

abstract class TestCase extends PHPUnitTestCase
{
    /**
     * @var App
     */
    protected $app;

    protected function setUp(): void
    {
        $this->app = $this->createApp();
    }

    protected function createApp(): App
    {
        $app =  require 'conf/bootstrap.php';
        require 'src/app.php';
        return $app;
    }

    protected function request($method, $uri): ResponseInterface
    {
        $factory = new ServerRequestFactory();
        return $this->app->handle($factory->createServerRequest($method, $uri));
    }
}
