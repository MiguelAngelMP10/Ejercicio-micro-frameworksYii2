<?php
return [
    'id' => 'clientes-prospectos',
    // the basePath of the application will be the `clientes-prospectos` directory
    'basePath' => __DIR__,
    // this is where the application will find all controllers
    'controllerNamespace' => 'micro\controllers',
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@micro' => __DIR__,
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=clientes-prospectos',
            'username' => 'root',
            'password' => 'toor',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'cliente-direcciones', 'cliente-telefonos', 'prospectos-direcciones', 'prospectos-telefonos'
                    ],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET direcciones/<id:\d+>/' =>  'cliente-direcciones/direcciones',
                        'GET telefonos/<id:\d+>/' =>  'cliente-telefonos/telefonos',
                        'GET direcciones/<id:\d+>/' =>  'prospectos-direcciones/direcciones',
                        'GET telefonos/<id:\d+>/' =>  'prospectos-telefonos/telefonos',
                    ],
                ],

            ],
        ]
    ],


];