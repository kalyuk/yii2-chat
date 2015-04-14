<?php


$config = require_once "main.php";

$config['bootstrap'] = ['log'];
$config['components']['log'] = [
    'traceLevel' => 3,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
    ],
];


$config['bootstrap'][] = 'debug';
$config['modules']['debug'] = ['class' => 'yii\debug\Module', 'allowedIPs' => ['*']];

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = ['class' => 'yii\gii\Module', 'allowedIPs' => ['*']];

return $config;