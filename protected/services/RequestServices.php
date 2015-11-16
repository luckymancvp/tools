<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 9/4/15
 * Time: 3:08 PM
 */
class RequestServices
{

    public static function isDebug()
    {
        return isset($_GET['d']) && ($_GET['d'] == 'true');
    }

    public static function getRequest()
    {
        if (self::isDebug())
            return $_GET['r'];

        return file_get_contents('php://input');
    }

    public static function getDecryptedRequest($isJSON = true)
    {
        $mcrypt = new MCrypt();
        $decrypted = $mcrypt->decrypt(self::getRequest());
        $decrypted = $isJSON ? json_decode($decrypted) : $decrypted;
        Logs::saveLog($decrypted);
        return $decrypted;
    }
}