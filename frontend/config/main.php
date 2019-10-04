<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$home_url = $_SERVER['HTTP_HOST'] === 'localhost' ? '/thewatch-v2' : '/';
$base_url = $_SERVER['HTTP_HOST'] === 'localhost' ? '/thewatch-v2' : '';

return [
    'id' => 'app-frontend',
    'name' => 'The Watch Co.',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => $home_url, // hosted home url
    'components' => [
        'request' => [
            'baseUrl'=>$base_url, // hosted base url
			'class' => 'common\components\Request',
			'web'=> '/frontend/web'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
