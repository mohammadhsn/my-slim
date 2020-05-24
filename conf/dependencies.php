<?php

use App\Providers\SettingsServiceProvider;
use League\Container\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/** @var Container $container */

$container = $app->getContainer();
$app->getContainer()->addServiceProvider(SettingsServiceProvider::class);

$settings = $container->get('settings');

$log = new Logger($settings['app']['name']);
$log->pushHandler(new StreamHandler("$BASE_PATH/{$settings['logging']['filename']}"));
