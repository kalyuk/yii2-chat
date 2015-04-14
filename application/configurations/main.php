<?php
/**
 * Created by DOK It-group LLC.
 * User: Dmitry Kalyuk
 * Date: 31.03.2015
 * Time: 11:03
 */

return [
    'id' => 'frontend',
    'basePath' => __DIR__ . '/..',
    'runtimePath' => RUNTIME,
    'vendorPath' => VENDOR,
    'language' => 'ru-RU',
    'sourceLanguage' => 'en',
    'layout' => false,
    'plugins' => [
        'menu' => [
            'class' => '\\app\\modules\\menu\\MenuPlugin'
        ],
        'template' => [
            'class' => '\\app\\modules\\template\\TemplatePlugin'
        ]
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'assetManager' => [
            'forceCopy' => true
        ],
        'request' => [
            'cookieValidationKey' => 'kjg3523n5v2y3485234b52q34dg582f37f4f52ni3ny'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=i09',
            'username' => 'root',
            'password' => 'toor',
            'charset' => 'utf8',
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/user/sign-in'
        ],

        'view' => [
            'class' => 'app\components\View',
            'defaultExtension' => 'twig',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    'options' => [
                        'auto_reload' => true,
                    ]
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => 'app\modules\user\UserModule'
    ]

];