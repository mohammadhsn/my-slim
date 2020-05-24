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
    ]
];