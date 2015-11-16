<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'xxxxx',
                'charset' => 'utf8',
            ),
        ),
    )
);
