<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'globals.php';
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.services.*',
        'application.dao.*',
        'application.services.*',
    ),

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'xx',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
        'admin' => array(
            'defaultController' => 'orders',
        )
    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => false,
            'rules'=>array(
                'danh-muc/<name:.*>'=>'/category/index',
                'san-pham/<name:.*>'=>'/product/view',
                'tin-tuc/<name:.*>'=>'/news/view',
                'hang-xe/<name:.*>'=>'/branch/view',
                'dich-vu/<name:.*>'=>'/service/view',

                'tin-tuc'=>'/category',
                'dich-vu'=>'/service',
                'hang-xe'=>'/branch',
                'san-pham'=>'/branch',
                'lien-he'=>'/site/contact',

                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=tools',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'xxxxx',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'  =>'CFileLogRoute',
                    'levels' =>'warning',
                    'logFile'=> 'waring.log'
                ),
                // デバッグのログをファイルに集める。
                array(
                    'class'  =>'CFileLogRoute',
                    'levels' =>'debug, info',
                    'logFile'=>'debug.log',
                ),
                // エラーのログをファイルに集める。
                array(
                    'class'  =>'CFileLogRoute',
                    'levels' =>'error',
                    'logFile'=>'error.log',
                ),
                // 全部のログをファイルに集める。
                array(
                    'class'  =>'CFileLogRoute',
                    'logFile'=>'application.log',
                ),
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'luckymancvp@gmail.com',
    ),
    'sourceLanguage'=>'en',
    'language'=>'vi',
    'defaultController' => 'home',
);