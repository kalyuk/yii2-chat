<?php


$env = 'prod';

if (php_sapi_name() == 'cli-server' || !empty($_SERVER['DEV']) && $_SERVER['DEV'] === 'true') {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 'On');
    define('YII_DEBUG', true);
    define('YII_ENV', 'dev');
    $env = 'dev';
}

define('VENDOR', __DIR__ . '/../vendor');
define('RUNTIME', __DIR__ . '/../runtime');


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = array_replace_recursive($_POST, json_decode(file_get_contents("php://input"), true));
}

$config = require_once __DIR__ . '/../app/configurations/' . $env . '.php';

Yii::setAlias('app', __DIR__ . '/../app');

$application = new \yii\web\Application($config);
$application->run();