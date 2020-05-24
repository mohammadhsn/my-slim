<?php

use App\Providers\LogServiceProvider;
use App\Providers\SettingsServiceProvider;
use League\Container\Container;

/** @var Container $container */

$container = $app->getContainer();
$container->addServiceProvider(SettingsServiceProvider::class);
$container->addServiceProvider(LogServiceProvider::class);
