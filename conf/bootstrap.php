<?php

use Slim\Factory\AppFactory;
use League\Container\Container;


$BASE_PATH = dirname(dirname(__FILE__));
require "$BASE_PATH/vendor/autoload.php";

$container = new Container();
$container->add('path', $BASE_PATH);

require 'dependencies.php';

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(
    $settings['app']['debug'],
    $settings['logging']['enable'],
    $settings['logging']['detail'],
    $log
);

return $app;
