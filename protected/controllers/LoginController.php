<?php

class LoginController extends Controller
{
    public function actionIndex()
    {
        $request = RequestServices::getDecryptedRequest();
        $version = $request->version;

        $response = "";
        switch ($request->app_name) {
            case "Teechip Speedy":
                $response = $this->checkTeechipSpeedy($request);
        }

        $response->time = date("mshddi");
        $response->updated_time = Settings::getInstance()->getClientFetchTime();

        $mcrypt = new MCrypt();
        $response = $mcrypt->encrypt(json_encode($response));
        echo $response;
    }

    private function checkTeechipSpeedy($request)
    {
        $response = new stdClass();
        $response->code = 0;
        $response->result = "success";

        if ($request->version != '1.0') {
            $response->code = 1;
            $response->result = "false";
            $response->reason = "Your version is out of date !";
            return $response;
        }

        if (Settings::getInstance()->isFreeAll())
            return $response;

        $model = Users::model()->findByAttributes(array("email" => $request->data->email));
        if ($model) {
            return $response;
        }

        $response->code = 2;
        $response->result = "false";
        $response->reason = "You are not registered under my link";
        return $response;
    }

    public function actionTest()
    {
        $mcrypt = new MCrypt();
        $text = '{"code":0,"result":"success","time":"082806303031"}';
        $text = 'aa';
        $encrypted = $mcrypt->encrypt($text);
        $text = "a747772787746785df1002a4800733e492316db2797868ed8273d17bde887943011840febb85751f28ec821d36583a84dcc9fda746327049d6fccaf57d41c895";
        $decrypted = $mcrypt->decrypt($text);
        echo $encrypted;
//        echo $decrypted;
    }
}