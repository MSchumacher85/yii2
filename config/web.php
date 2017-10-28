<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	//'layout'=>'basic',/*Глобально меняем шаблон*/
    'bootstrap' => ['log'],
    'language' => 'ru',/*Устанавливаем язык для нашего приложения*/
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'azhTBhOykxCiTIFSp42CO7SDOVwTbQq_',
            'baseUrl' => '',/*Прописываем пустую строку, необходимо для ЧПУ*/


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
            'enablePrettyUrl' => true,/*активирует формат ЧПУ, если пропишем true*/
            'showScriptName' => false,/*это свойство определяет необходимость включения имени входного скрипта в создаваемый URL. Например, при его значении false, вместо /index.php/post/100, будет сгенерирован URL /post/100*/
            'suffix' =>'.html',/*Теперь у нас во всех ссылках в конце добавится .html*/
            'rules' => [
                '<action:\w+>' => 'site/<action>',/*В action мы поместили about|contact|login. Если у нас есть ссылка about или contact или login то они должны приводиться к 'site/<action>'
                                                 мы могли бы не перечислять название ссылок, а просто написать '<action:\w+>' => 'site/<action>',*/
                [
                    'pattern' => '',/*Данное отменит правило suffix. Праило pattern это шаблон, в данном случае шаблон пустая строка то есть главная страница*/
                    'route' => 'site/index',/*При соответствии с шаблоном задаем следующий маршрут 'site/index'*/
                    'suffix' => '', /*Отменяем suffix*/
                ]

            ],
        ],

    ],
    'params' => $params,
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
