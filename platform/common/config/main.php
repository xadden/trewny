<?php

$db = require(__DIR__ . '/db.php');
$params = require(__DIR__ . '/params.php');

$config = [
    'version' => '',
    'vendorPath' => __DIR__ . '/../../../vendor',
    'language' => 'pt-PT',
    'components' => [
        'cache' => ['class' => 'yii\caching\FileCache'],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '',
                'username' => '',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
                'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ]
        ],
        'db' => $db
    ],
    'params' => $params
];

if (defined('YII_DEBUG')) {
    $config['components']['log'] = [
        'traceLevel' => 3,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning']
            ]
        ]
    ];
}

if (defined('YII_ENV') && YII_ENV == 'dev' && is_file(__DIR__ . '/config.local.php')) {
    include __DIR__ . '/config.local.php';
}

return $config;
