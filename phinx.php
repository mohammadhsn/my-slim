<?php

$app = require 'conf/bootstrap.php';
require 'db/builders/TemplateGenerator.php';
require 'db/Migration.php';

$settings = $app->getContainer()->get('settings')['db'];

return [
    'paths' => [
        'migrations' => 'db/migrations'
    ],
    'migration_base_class' => 'Migration',
    'templates'            => [
        'class' => TemplateGenerator::class,
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => $settings['driver'],
            'host' => $settings['host'],
            'name' => $settings['database'],
            'user' => $settings['username'],
            'pass' => $settings['password'],
            'port' => '3306'
        ]
    ]
];
