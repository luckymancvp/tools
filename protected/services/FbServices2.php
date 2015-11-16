<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 2/3/15
 * Time: 2:03 AM
 */

class FbServices2 {

    const NAME_COLUMN = 0;
    const LINK_COLUMN = 2;
    const IMAGES_COLUMN = 1;

    const ERROR_TOKEN = 'ERROR_TOKEN';
    const ERROR_PAGE_NOT_FOUND = 'ERROR_PAGE_NOT_FOUND';

    private $accessToken, $pageAccessToken, $pageId;

    /**
     * @param String $pageId
     * @param String $pageAccessToken
     */
    public function setPageAccessToken($pageId, $pageAccessToken)
    {
        $this->pageId = $pageId;
        $this->pageAccessToken = $pageAccessToken;
    }

    public function post2Page($csvFile, $contentTemplate, $start = -1)
    {
        // Prevent timeout
        set_time_limit(0);
        ini_set('memory_limit', '128M');

        $data= self::readCSV($csvFile);
        $data = array_filter($data);
        $res = array();
        foreach ($data as $item){
            $name = $item[self::NAME_COLUMN];

            if ($name == $start)
                $start = -1;

            if ($start == -1) {
                $res[] = $this->postAlbum2Feed($item, $contentTemplate);

            }
        }

        return $res;
    }

    private function getContent($item, $contentTemplate)
    {
        $content = $contentTemplate;
        $name = $item[self::NAME_COLUMN];
        $names = explode("-", $name);

        $content = str_replace('{1}', $names[0], $content);
        if (count($names) > 1)
            $content = str_replace('{2}', $names[0], $content);

        $content = str_replace('{link}', $item[self::LINK_COLUMN], $content);
        $content = str_replace('{..}', '➨', $content);

        return $content;
    }

    public static function readCSV($csvFile){
        ini_set('auto_detect_line_endings', true);
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return array_filter($line_of_text);
    }

    private function uploadAlbum($item, $content_template)
    {
        // Create Album
        $album = new stdClass();
        $album->id = $this->createAlbum($item, $content_template);
        if (!$album->id)
            return $album;
        $album->images = array();
        for ($i = self::IMAGES_COLUMN; $i < sizeof($item); $i++){
            $album->images[] = $this->uploadPhoto($album->id, $item[$i]);
        }

        return $album;
    }

    private function isLink($url)
    {
        return preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $url);
    }

    private function uploadPhoto($albumId, $imageFile) {
        $param = array(
            'access_token' => $this->pageAccessToken,
            'no_story' => true,
        );
        /*if ($this->isLink($imageFile))
            $param['url'] = $imageFile;
        else
            $param['source'] = self::getCurlValue($imageFile);*/

        $param['url'] = $imageFile;

        $response = $this->callAPI($albumId .'/photos', $param);
        return isset($response->id) ? $response->id : $response;
    }

    private function createAlbum($item, $content_template)
    {
        $param = array(
            'access_token' => $this->pageAccessToken,
            'name' => 'T.Shirt',
            'message' => $this->getContent($item, $content_template),
            'no_story' => true,
        );
        $response = $this->callAPI($this->pageId .'/albums', $param);

        return isset($response->id) ? $response->id : null;
    }

    public static function getCurlValue($filename, $contentType = 'image/jpeg', $postname = 'photo.jpg')
    {
        // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
        // See: https://wiki.php.net/rfc/curl-file-upload
        if (function_exists('curl_file_create')) {
            return curl_file_create($filename, $contentType, $postname);
        }

        // Use the old style if using an older version of PHP
        $value = "@{$filename};filename=" . $postname;
        if ($contentType) {
            $value .= ';type=' . $contentType;
        }

        return $value;
    }

    public function getPageAccessToken($page_id, $access_token)
    {
        $result = $this->callAPI('me/accounts', array(
            'access_token' => $access_token
        ),'GET');

        if (isset($result->error))
            return self::ERROR_TOKEN;

        if (!isset($result->data)){
            die(json_encode($result));
            return self::ERROR_TOKEN;
        }

        if (sizeof($result->data) == 1)
            return $result->data[0]->access_token;
        foreach ($result->data as $item)
            if ($item->id == $page_id)
                return $item->access_token;
        return self::ERROR_PAGE_NOT_FOUND;
    }

    /**
     * @param $endPoint
     * @param $params
     * @param string $method
     * @return Object
     */
    private function callAPI($endPoint, $params, $method = 'POST')
    {
        switch ($method) {
            case 'POST':
                $ch = curl_init('https://graph.facebook.com/v2.2/'. $endPoint);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case 'GET':
                $query = $params && sizeof($params) ? '?'. http_build_query($params) : null;
                $ch = curl_init('https://graph.facebook.com/v2.2/'. $endPoint . $query);
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

    private function getEncodedName($name)
    {
        if (!$name)
            return $name;
        $encoded = '【' . $name[0];
        $symbol = array('-', '.');
        $counter = 0;
        for ($i = 0; $i < strlen($name) - 1; $i++) {
            $encoded .= $symbol[$counter] . $name[$i+1];
            $counter = 1 - $counter;
        }
        $encoded .= '】';
        return $encoded;
    }

    private function postAlbum2Feed($item, $content_template)
    {
        if (!is_array($item))
            return "PLEASE CHECK LINE " . $item;
        if (sizeof($item) < 3)
            return "PLEASE CHECK LINE " . join(',', $item);
        $param = array(
            'access_token' => $this->pageAccessToken,
            'message' => $this->getContent($item, $content_template),
        );

        if ($this->isLink($item[self::IMAGES_COLUMN]))
            $param['url'] = $item[self::IMAGES_COLUMN];
        else
            $param['source'] = self::getCurlValue($item[self::IMAGES_COLUMN]);

        $response = $this->callAPI($this->pageId .'/photos', $param);
        return isset($response->post_id) ? $response->post_id : json_encode($response);
    }

    private function getAlbumInfo($albumId)
    {
        $res = $this->callAPI($albumId, array('access_token' => $this->pageAccessToken), 'GET');
        $params = explode('?', $res->link);
        $params = explode('&', $params[1]);
        $params = explode('=', $params[2]);
        $params = $params[1];
        $res->setUrl = "https://www.facebook.com/media/set/?set=a.{$albumId}.{$params}.{$this->pageId}";
        return $res;
    }

    public function getStringInside($str, $start, $end = null) {
        $strList = explode($start, $str);
        if (sizeof($strList) < 2)
            return false;

        if (!$end)
            return $strList[1];
        $strList = explode($end, $strList[1]);
        if (sizeof($strList) < 1)
            return false;
        return $strList[0];
    }

    public function getPostIds()
    {
        $response = $this->callAPI($this->pageId . '/posts', array('fields'=>'id,link,message','access_token'=>$this->pageAccessToken), 'GET');
        $data = $response->data;
        $page = 1;
        while (isset($response->paging) && isset($response->paging->next)) {
            $response = json_decode(file_get_contents($response->paging->next));
            $data = array_merge($data, $response->data);
        }

        foreach ($data as $item){
            echo "{$item->id}|{$item->link}|". $this->getStringInside($item->message, '【','】') . "<br>";
        }
    }
}