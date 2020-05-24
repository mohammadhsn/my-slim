<?php

use Slim\Factory\AppFactory;
use League\Container\Container;

require '../vendor/autoload.php';

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();

require '../src/app.php';

$app->run();
