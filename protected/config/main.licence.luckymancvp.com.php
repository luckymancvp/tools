<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=licence_db',
                'emulatePrepare' => true,
                'username' => 'licence_db',
                'password' => 'xxxxx',
                'charset' => 'utf8',
            ),
        ),
    )
);
