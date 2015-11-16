<?php
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

class FbController extends Controller
{
    public function actionShorten()
    {
        $googl = new Googl();
        // Shorten URL
        die ($googl->shorten('http://www.google.com/'));
        unset($googl);
    }

    public function actionPage()
    {
        set_time_limit(0);
        $model = new PageForm();
        $post = request(PageForm::className());

        if ($post) {
            $model->attributes = $post;
            $model->execute();
        }

        $this->render('page', array(
            'model' => $model,
        ));
    }

    public function actionCampaign()
    {

        $model = new CampaignForm();
        $post = request(CampaignForm::className());

        if ($post) {
            $model->attributes = $post;
            $model->execute();
        }

        $this->render('campaign', array(
            'model' => $model,
        ));
    }

    public function actionPid($accessToken, $pageId) {
        $fbService = new FbServices2();
        $pageAccessToken = $fbService->getPageAccessToken($pageId, $accessToken);

        $fbService->setPageAccessToken($pageId, $pageAccessToken);
        $fbService->getPostIds();
    }
}