<?php

return [
    'app' => [
        'name'  => app_env('APP_NAME', 'my-slim'),
        'debug' => app_env('APP_DEBUG', true)
    ],
    'logging' => [
        'enable' => app_env('LOG_ENABLE', false),
        'detail' => app_env('LOG_DETAIL', false),
        'filename' => 'app.log'
    ],
    'db' => [
        'driver'    => 'mysql',
        'host'      => app_env('DB_HOST'),
        'database'  => app_env('DB_NAME'),
        'username'  => app_env('DB_USERNAME'),
        'password'  => app_env('DB_PASSWORD'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]
];
