<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 8/30/15
 * Time: 6:06 PM
 */
class Logs extends LogsBase
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function saveLog($request)
    {
        $model = new Logs();
        if (isset($request->data) && isset($request->data->email)) {
            $model->email = $request->data->email;
            $model->app_name = $request->app_name;
        }

        $model->data = json_encode($request);
        $model->save();
    }
}