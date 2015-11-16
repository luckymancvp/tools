<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=tools',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'xxxxxx',
                'charset' => 'utf8',
            ),
        ),
    )
);
