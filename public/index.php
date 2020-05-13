<?php

use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = AppFactory::create();

require '../src/app.php';

$app->run();
