<?php

class CheckController extends Controller
{
    public function actionIndex()
    {
        $request = RequestServices::getDecryptedRequest();
        $version = $request->version;

        $response = "";
        switch ($request->app_name) {
            case TeechipServices::APP_NAME:
                $response = TeechipServices::check($request);
        }

        echo "Normal";
    }
}