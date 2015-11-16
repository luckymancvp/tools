<meta charset="utf-8" />
<?php
set_time_limit(0);
ini_set('memory_limit', '128M');
function flush_buffers(){
    echo str_pad('',4096);
    ob_end_flush();
    ob_flush();
    flush();
    ob_start();
} 

function stringExtract($s,$s1,$s2){
		$p1=strpos($s,$s1);
		if($p1===FALSE)return $p1;
		$p1+=strlen ($s1);
		$p2=strpos($s,$s2,$p1+1);
		if($p2===FALSE)return $p2;
		return substr($s,$p1,$p2-$p1);
	}

function bit_ly_short_url($longUrl)
{
$c = curl_init('http://saintpatrickdayshirt.com/');
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, 'longurl='.$longUrl.'&key=2666&submit=Make+Short');
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
$response = curl_exec($c);
curl_close($c);
 flush_buffers();

$GroupID = stringExtract($response,'">http://saintpatrickdayshirt.com/','</a></p>');
$linkhttp = "http://saintpatrickdayshirt.com".$GroupID;

return $linkhttp;
    
    
    
}


echo bit_ly_short_url("http://google.com"); echo "<br>";


?>