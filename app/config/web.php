<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Гостевая книга',
    'defaultRoute' => 'guest-book/create',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@vendor' => dirname(__DIR__, 2) . '/vendor',
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],  
    'components' => [
        'request' => [
            'cookieValidationKey' => 'QIHFE45Q3yCtRo3M8bfWhEchedYWcycD',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
               '<action>' => 'site/<action>',
            ],
        ],
        'assetManager' => [
            // 'linkAssets' => true, // For symlinks
            # Замена стандартных библиотек jQuery
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // не публиковать пакет
                    'js' => [
                        // Last working from CDN
                        'https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js',

                    ]
                ],
                'yii\widgets\PjaxAsset' => [
                    'sourcePath' => null,   // не публиковать пакет
                    'js' => [
                        'https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js',
                    ]
                ],
            ],
        ],
    ],
    'modules'=>
    [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
