<?php

class ViralController extends Controller
{
    public function actionGet()
    {
        // Prevent timeout
        set_time_limit(0);
        ini_set('memory_limit', '128M');

        $location = 1;
        if (isset($_POST['submit'])) {
            $csvFile = ($_FILES["file"]["tmp_name"]);
            $newName = 'link-' . ($_FILES["file"]["name"]);

            $data = FbServices2::readCSV($csvFile);
            $res = array();
            foreach ($data as $item) {
                $url = $item[$location];
                $link = $this->getOneLink($item[$location]);
                $item[1] = $link;
                $item[2] = $url;
                $res[] = join(",", $item);
            }

            $this->returnFile($newName, join("\r\n", $res));
        }
        $this->render('get');
    }

    private function returnFile($fileName, $content)
    {
        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        die($content);
    }

    public function actionOne()
    {
        $res = array();
        $links = array();
        if (request("links")) {
            $links = explode(PHP_EOL, request("links"));
            $links = array_filter($links);
            foreach ($links as $link) {
                $res[] = $this->getOneLink($link);
            }
        }
        $this->render('one', array(
            'res' => $res,
            'links' => $links,
        ));
    }

    private function getLink($item)
    {

    }

    function get_http_response_code($url)
    {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    private function getOneLink($link)
    {
        $link = trim($link);
        if ($this->get_http_response_code($link) != '200')
            return "Can not get image";

        $content = file_get_contents($link);
        $re = "/<img src=\"([^\"]+)\" data-element=\"SELECT-PRODUCT-PROD/i";
        preg_match_all($re, $content, $matches);

        if (isset($matches[1]) && isset($matches[1][0]))
            return $matches[1][0];
        return "Can not get image";
    }
}