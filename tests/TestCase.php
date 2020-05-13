<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Slim\Factory\AppFactory;
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

    public function createApp()
    {
        $app = AppFactory::create();
        require 'src/app.php';
        return $app;
    }
}