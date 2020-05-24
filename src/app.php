<?php

use App\Controllers\HomeController;

/** @var Slim\App $app */

$app->get('/', HomeController::class . ':home');
