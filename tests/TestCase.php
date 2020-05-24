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

        if (in_array(InteractsWithDB::class, array_keys(class_uses_recursive(static::class)))) {
            $this->migrate();
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        if (in_array(InteractsWithDB::class, array_keys(class_uses_recursive(static::class)))) {
            $this->rollback();
        }
    }

    protected function createApp(): App
    {
        $app =  require 'conf/bootstrap.php';
        require 'src/app.php';
        return $app;
    }

    protected function request($method, $uri, $data = null): ResponseInterface
    {
        $factory = new ServerRequestFactory();
        $request = $factory->createServerRequest($method, $uri);
        if ($data) {
            $request = $request->withParsedBody($data);
        }
        return $this->app->handle($request);
    }
}
