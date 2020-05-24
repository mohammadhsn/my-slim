<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use League\Container\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$BASE_PATH = dirname(dirname(__FILE__));

require "$BASE_PATH/vendor/autoload.php";

$env = DotEnv::createImmutable($BASE_PATH);
$env->load();

$settings = require "$BASE_PATH/src/settings.php";

$container = new Container();

$log = new Logger($settings['app']['name']);
$log->pushHandler(new StreamHandler("$BASE_PATH/{$settings['logging']['filename']}"));

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
