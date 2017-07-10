<?php
return [
    'id' => 'crmapp',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'request' => [
            'cookieValidationKey' => 'hPaXY5W0if'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],
        'db' => require(__DIR__ . '/db.php'),
        'view' => [
            'renderers' => [
                'md' => [
                    'class' => 'app\utilities\MarkdownRenderer'
                ]
            ],
            'theme' => [
                'class' => yii\base\Theme::classname(),
                'basePath' => '@app/themes/snowy',
            ]
        ],
        'response' => [
            'formatters' => [
                'yaml' => [
                    'class' => 'app\utilities\YamlResponseFormatter'
                ]
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\user\UserRecord'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        /*'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'class' => 'yii\redis\Connection',
                'hostname' => 'localhost',
                'port' => '8080',
                'database' => '0',
            ]
        ],*/
    ],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*']
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
        ]
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'bootstrap' => ['debug'],
];