<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 8/30/15
 * Time: 6:06 PM
 */
class Links extends LinksBase
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @param $src
     * @param $des
     * @return Links
     */
    public static function create($src, $des, $key = 'luckymancvp')
    {
        $model = new Links();
        $model->src = $src;
        $model->des = $des;
        $model->key = $key;

        $model->save();
        return $model;
    }

    public function getLink()
    {
//        return 'tools.luckymanvp.com/links/'.$this->id;
        return Yii::app()->createAbsoluteUrl('links/view', array('id'=>$this->id));
    }

    /**
     * Create goo.gl link
     * @return mixed|string
     */
    public function getShorten()
    {
        $googl = new Googl();
        $this->shorten = $googl->shorten($this->getLink());
        $this->save();
        return $this->shorten;
    }

    public function process()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $agent = strtolower($agent);
        if (strpos($agent, 'google') !== false){
            header('Location: ' . $this->src, true, 301);
        }
        else
            header('Location: '.$this->des, true, 301);
    }
}