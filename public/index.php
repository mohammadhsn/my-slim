<?php

use Slim\Factory\AppFactory;
use League\Container\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

$settings = require '../src/settings.php';

$container = new Container();

$log = new Logger($settings['app']['name']);
$log->pushHandler(new StreamHandler("../{$settings['logging']['filename']}"));

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(
    $settings['app']['debug'],
    $settings['logging']['enable'],
    $settings['logging']['detail'],
    $log
);

require '../src/app.php';

$app->run();
