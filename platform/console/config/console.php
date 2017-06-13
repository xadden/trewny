<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'pt-PT',
                    'basePath' => '@app/messages'
                ]
            ]
        ],
        'throttledmailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '',
                'username' => '',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls'
            ]
        ]
    ],
    'params' => $params,
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationTable' => 'YiiMigrationCtl',
            'templateFile' => '@console/views/migration.php',
            'migrationPath' => '@container/migrations',
            'interactive' => 0
        ]
    ]
];

return $config;

