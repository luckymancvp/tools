<?php

class LinkController extends Controller
{
    public function actionShorten()
    {
        set_time_limit(0);
        ini_set('memory_limit', '128M');

        $raw = request('raw');
        $res = array();
        if ($raw) {
            $googl = new Googl();
            $data = explode(PHP_EOL, $raw);
            foreach ($data as $item) {
                $item = $googl->shorten(trim($item));
                $res[] = $item;
                sleep(2);
            }

            die(implode('<br>', $res));
        }
        $this->render('shorten', array(
            'res' => implode(PHP_EOL, $res),
            'raw' => $raw
        ));
    }



    public static function stringExtract($s,$s1,$s2){
        $p1=strpos($s,$s1);
        if($p1===FALSE)return $p1;
        $p1+=strlen ($s1);
        $p2=strpos($s,$s2,$p1+1);
        if($p2===FALSE)return $p2;
        return substr($s,$p1,$p2-$p1);
    }

    public static function bit_ly_short_url($longUrl)
    {
        $host = 'http://cheaptshirtssale.com/sales/';
        $longUrl = trim($longUrl) . '?37125';
        $c = curl_init($host);
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, 'longurl='.$longUrl.'&key=4113&submit=Make+Short');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        $response = curl_exec($c);
        curl_close($c);

        $GroupID = self::stringExtract($response,'">'.$host,'</a></p>');
        $linkhttp = $host.$GroupID;

        return $linkhttp;



    }

    public function actionShorten2()
    {
        set_time_limit(0);
        ini_set('memory_limit', '128M');

        $raw = request('raw');
        $res = array();
        if ($raw) {
            $googl = new Googl();
            $data = explode(PHP_EOL, $raw);
            foreach ($data as $item) {
//                $item = $googl->shorten(trim($item));
                $res[] = self::bit_ly_short_url($item);
            }

            die(implode('<br>', $res));
        }
        $this->render('shorten', array(
            'res' => implode(PHP_EOL, $res),
            'raw' => $raw
        ));
    }
}