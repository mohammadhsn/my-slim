<?php

use App\Handlers\HttpErrorHandler;
use App\Handlers\ShutdownHandler;
use League\Container\Container;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

$BASE_PATH = dirname(dirname(__FILE__));

require "$BASE_PATH/vendor/autoload.php";

$container = new Container();

$container->add('path', $BASE_PATH);
$app = AppFactory::createFromContainer($container);

require 'dependencies.php';

$settings = $app->getContainer()->get('settings');

$errorHandler = new HttpErrorHandler(
    $app->getCallableResolver(),
    $app->getResponseFactory(),
    $app->getContainer()->get('logger')
);

$shutdownHandler = new ShutdownHandler(
    ServerRequestCreatorFactory::create()->createServerRequestFromGlobals(),
    $errorHandler,
    $settings['app']['debug'],
    $settings['logging']['enable'],
    $settings['logging']['detail'],
);
register_shutdown_function($shutdownHandler);

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$em = $app->addErrorMiddleware(
    $settings['app']['debug'],
    $settings['logging']['enable'],
    $settings['logging']['detail'],
);

$em->setDefaultErrorHandler($errorHandler);

return $app;
