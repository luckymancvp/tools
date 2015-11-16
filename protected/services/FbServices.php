<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 2/3/15
 * Time: 2:03 AM
 */

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphAlbum;
use Facebook\GraphObject;

class FbServices {
    const FB_APP_ID = '314103792128269';
    const FB_APP_SECRET = '894e6cf849fe059e9e324c5e34c6062f';

    const NAME_COLUMN = 0;
    const LINK_COLUMN = 1;
    const CONTENT_COLUMN = 2;
    const IMAGES_COLUMN = 3;

    private $session = null;

    private $pageId;

    public function __construct($access_token = null)
    {
        FacebookSession::setDefaultApplication(self::FB_APP_ID, self::FB_APP_SECRET);
        session_start();
        $this->session = $access_token == null ? null : new FacebookSession($access_token);
    }

    public function updateToken($access_token = null)
    {
        $this->session = new FacebookSession($access_token);
    }

    public function post2Page($pageId, $csvFile)
    {
        // Prevent timeout
        set_time_limit(0);
        ini_set('memory_limit', '128M');

        $data= self::getDataToPost($csvFile);
        $this->pageId = $pageId;
        $res = array();
        foreach ($data as $item){
            $res[] = $this->uploadAlbum($item);
        }

        return $res;
    }

    private function getDataToPost($filePath)
    {
        $data = self::readCSV($filePath);
        $res = array();
        foreach ($data as $item) {
            $content = $item[self::CONTENT_COLUMN];
            $content = str_replace(PHP_EOL, '\n', $content);
            $content = str_replace('{name}', $item[self::NAME_COLUMN], $content);
            $content = str_replace('{link}', $item[self::LINK_COLUMN], $content);
            $content = str_replace('..', '➨', $content);
            $item[self::CONTENT_COLUMN] = $content;
            $res[] = $item;
        }

        return $res;
    }

    private function readCSV($csvFile){
        ini_set('auto_detect_line_endings', true);
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
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

    private function uploadAlbum($item)
    {
        // Create Album
        $albumId = $this->createAlbum($item);
        $res = array($albumId);
        for ($i = self::IMAGES_COLUMN; $i < sizeof($item); $i++){
            $res[] = $this->uploadPhoto($albumId, $item[$i]);
        }

        return $res;
    }

    private function createAlbum($item)
    {
        $request = new FacebookRequest(
            $this->session,
            'POST',
            "/{$this->pageId}/albums",
            array (
                'name' => $item[self::NAME_COLUMN],
                'message' => $item[self::CONTENT_COLUMN],
            )
        );

        $response = $request->execute();
        /** @var GraphAlbum $graphObject */
        $graphObject = $response->getGraphObject(GraphAlbum::className());
        return $graphObject->getId();
    }

    private function uploadPhoto($albumId, $imageFile) {
        $request = new FacebookRequest(
            $this->session,
            'POST',
            "/{$albumId}/photos",
            array (
                'source' => self::getCurlValue($imageFile),
            )
        );

        $response = $request->execute();
        /** @var GraphObject $graphObject */
        $graphObject = $response->getGraphObject(GraphObject::className());
        return $graphObject->getProperty('id');
    }
}