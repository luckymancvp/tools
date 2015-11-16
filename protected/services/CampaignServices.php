<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 2/3/15
 * Time: 2:03 AM
 */

class CampaignServices{

    /**
     * @param $endPoint
     * @param $params
     * @param string $method
     * @return Object
     */
    private function callAPI($endPoint, $params, $method = 'POST')
    {
        $graphUrl = 'https://graph.facebook.com/v2.2/' . $endPoint;
        switch ($method) {
            case 'POST':
                $ch = curl_init($graphUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case 'GET':
                $query = $params && sizeof($params) ? '?'. http_build_query($params) : null;
                $ch = curl_init($graphUrl . $query);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd () . '/.tmp/fbCookie.jar' );
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd () . '/.tmp/fbCookie.jar' );
        $response = json_decode(curl_exec($ch));

        return $response;
    }

    public function changeCampaignStatus($accessToken, $campaigns, $status = 'PAUSED', $delay)
    {
        $res = array();
        foreach ($campaigns as $campaign) {
            $campaign = trim($campaign);
            $result = $this->callAPI($campaign, array(
                'access_token' => $accessToken,
                'campaign_group_status' => $status,
            ));
            $res[$campaign] = $result;
            sleep($delay);
        }

        return $res;
    }
}