<?php

use Slim\Factory\AppFactory;
use League\Container\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

$container = new Container();

$log = new Logger('name');
$log->pushHandler(new StreamHandler('../app.log'));

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false, $log);

require '../src/app.php';

$app->run();
