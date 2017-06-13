<?php

$params = [];
if (is_file(__DIR__ . '/params.php')) {
    $params = require(__DIR__ . '/params.php');
}

$config = [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'dashboard',
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
        'urlManager' => ['enablePrettyUrl' => true, 'showScriptName' => false],
        'request' => ['cookieValidationKey' => '485hfsdjvsd345dgjwFBgthrSDf'],
        'user' => [
            'identityClass' => 'frontend\models\Account',
            'enableAutoLogin' => true,
            'loginUrl' => ['dashboard/login']
        ],
        'errorHandler' => ['errorAction' => 'dashboard/error']
    ],
    'params' => $params
];

return $config;
