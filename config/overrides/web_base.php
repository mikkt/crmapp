<?php
return [
    'id' => 'crmapp',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'hPaXY5W0if'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'customer/<id:\d+>' => 'customer-records/view',
                [
                    'class' => 'app\utilities\UsernameUrlRule'
                ]
            ]
        ],
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
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'bootstrap' => ['debug'],
];