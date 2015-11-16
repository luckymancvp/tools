<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 8/30/15
 * Time: 6:06 PM
 */
class Settings extends SettingsBase
{
    const IS_FREE_ALL = 1;
    const IS_NOT_FREE_ALL = 0;


    private static $instance;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return Settings
     */
    public static function getInstance()
    {
        if (self::$instance != null)
            return self::$instance;

        self::$instance = self::model()->find();
        return self::$instance;
    }

    public function getClientFetchTime()
    {
        $time = strtotime($this->fetch_time);
        $time = strtotime("-1 week", $time);
        $time = date("Y-m-d H:i:s", $time);
        return $time;
    }

    public function isFreeAll()
    {
        return $this->is_free_all;
    }
}