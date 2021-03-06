<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'util' => [

            'class' => 'app\components\Util',
        ],
        'imageResize' => [

            'class' => 'app\components\ImageResize',
        ],
        'messengerBot' => [

            'class' => 'app\components\MessengerBot',
        ],
        'scribd' => [

            'class' => 'app\components\Scribd',
        ],
        'moss' => [

            'class' => 'app\components\Moss',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mtAsnDCTuuZoahYt1ER838WsACPcmlV3',
            'enableCsrfValidation' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
          //  'enableStrictParsing' => true,
            //  'urlFormat'=>'path',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'giang-vien/nganh/<id:\d+>' => 'teacher/get-teachers-by-department',
                'giang-vien' => 'teacher/get-teachers',
                'chuong-trinh-dao-tao' => 'program/index',
                'tai-lieu' => 'document/get-latest-documents',
                'tai-lieu/mon-hoc/<id:\d+>' => 'document/get-document-by-subject',
                'tai-lieu/<id:\d+>' => 'document/item',
                'giang-vien/<id:\d+>' => 'teacher/item',
                'tim-kiem/<search-string>/<attr>' => 'search/index'
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\AdminModule',
        ],
    ],
    'defaultRoute' => 'document/get-latest-documents',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
