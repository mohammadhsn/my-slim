<?php

use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$env = DotEnv::createImmutable($BASE_PATH);
$env->load();

$settings = require "$BASE_PATH/src/settings.php";

$log = new Logger($settings['app']['name']);
$log->pushHandler(new StreamHandler("$BASE_PATH/{$settings['logging']['filename']}"));
