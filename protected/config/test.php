<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),

            'db'=>array(
                'enableProfiling'=>true,
                'enableParamLogging'=>true,
            ),

            'urlManager'=>array(
                'urlFormat' => 'path',
                'showScriptName' => true,
                'rules'=>array(
                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),

            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    ),

                ),
            ),
            /* uncomment the following to provide test database connection
            'db'=>array(
                'connectionString'=>'DSN for test database',
            ),
            */
        ),
    )
);
