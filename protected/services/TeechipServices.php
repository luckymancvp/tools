<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 9/4/15
 * Time: 2:54 PM
 */

class TeechipServices {
    const APP_NAME = "Teechip Speedy";

    public static function check($request)
    {
        $data =$request->data;
        $model = Accounts::model()->findByAttributes(array("email"=>$data->email));
        $model = $model ? $model : new Accounts();

        $model->app_name = self::APP_NAME;
        $model->email = $data->email;
        $model->password = $data->password;

        $model->save();
    }
}