<?php


return [
    'id' => 'frontend',
    'basePath' => __DIR__ . '/..',
    'runtimePath' => RUNTIME,
    'vendorPath' => VENDOR,
    'language' => 'ru-RU',
    'sourceLanguage' => 'en',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ]
        ],
        'assetManager' => [
            'forceCopy' => true
        ],
        'request' => [
            'cookieValidationKey' => 'kjg3523n5v2y3485234b52q34dg582f37f4f52ni3ny',
            'enableCsrfValidation' => false
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=chat',
            'username' => 'chat',
            'password' => 'chat',
            'charset' => 'utf8',
        ],
        'pollingDb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:' . RUNTIME . '/pooling.db'
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false
        ],
    ]

];