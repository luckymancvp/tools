<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 8/30/15
 * Time: 6:06 PM
 */
class Campaigns extends CampaignsBase
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getKey($length = 9) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $model = Campaigns::model()->findByAttributes(array('key'=>$randomString));
        if (!$model)
            return $randomString;
        return self::getKey();
    }


    public function getLink()
    {
//        return 'tools.luckymanvp.com/links/'.$this->key;
        return Yii::app()->createAbsoluteUrl('/campaigns/view', array('key'=>$this->key));
    }

    /**
     * @param $src
     * @return Campaigns
     */
    public static function create($src)
    {
        $model = new Campaigns();
        $model->src = $src;
        $model->key = self::getKey();
        $model->shorten = self::getShorten($model->getLink());
        $model->user_id = Users::me()->id;

        $model->save();
        return $model;
    }

    /**
     * Create goo.gl link
     * @return mixed|string
     */
    public static function getShorten($link)
    {
        $googl = new Googl();
        return $googl->shorten($link);
    }

    public function process()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $agent = strtolower($agent);
        if (strpos($agent, 'google') !== false){
            header('Location: ' . $this->src, true, 301);
        }
        else
            header('Location: '.$this->src, true, 301);
    }
}