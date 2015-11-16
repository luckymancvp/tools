<?php
$link = "https://www.facebook.com/album.php?fbid=665268540265478&id=663310733794592&aid=1073741856";
$params = explode('?', $link);
$params = explode('&', $params[1]);
$params = explode('=', $params[2]);
$params = $params[1];
die(var_dump($params));


die();

set_time_limit(0);	
ini_set('memory_limit', '128M');
    if($_POST["submit"]=="submit");
    {
    	
function posttopage($token,$name,$img,$url)
{
$loinhan=urlencode("[$name] <Limited Quantity | International Shipping> \n (y) Click to Order ➨ $url \n <3 An Awesome Valentine Gift For Your Boyfriend <3");	
$c = curl_init('https://graph.facebook.com/775123219242614/photos');
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, 'access_token='.$token.'&url='.$img.'&message='.$loinhan);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($c, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
$response = curl_exec($c);
curl_close($c);
echo $page;	
var_dump($response);
var_dump(json_decode($response)); // if you want an array.	
}
function flush_buffers(){
    echo str_pad('',4096);
    ob_end_flush();
    ob_flush();
    flush();
    ob_start();
} 
$token=$_POST["token"];
if( $token)
{
/*
posttopage($token,"AL","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-ALEX-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"AL","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-ALVIN-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"BI","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-BILL-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"CO","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-COREY-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"DA","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-DAN-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"DA","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-DARRELL-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"DE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-DEAN-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"DU","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-DUSTIN-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"FL","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-FLOYD-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"GR","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-GREG-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"JE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-JEROME-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"JO","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-JON-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"JO","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-JORGE-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"LE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-LEO-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"LE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-LEON-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"LE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-LEWIS-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"LL","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-LLOYD-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"MA","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-MAURICE-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"PE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-PEDRO-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"RO","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-RONNIE-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"TI","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-TIM-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"TO","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-TOMMY-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"WA","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-WARREN-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"WE","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-WESLEY-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
posttopage($token,"ZA","https://images.sunfrogshirts.com/2015/01/21/This-Girl-Loves-Her-ZACHARY-Valentines-Day-shirts.jpg");flush_buffers();echo "waiting<br>";
*/

posttopage($token,"ILA","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ALI-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsebDI ");flush_buffers();echo "waiting<br>";
posttopage($token,"ORAVLA","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ALVARO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Ese9M5 ");flush_buffers();echo "waiting<br>";
posttopage($token,"NOTNA","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ANTON-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsebDK ");flush_buffers();echo "waiting<br>";
posttopage($token,"YELHSA","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ASHLEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Ese9M9 ");flush_buffers();echo "waiting<br>";
posttopage($token,"TRAB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BART-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsebU8 ");flush_buffers();echo "waiting<br>";
posttopage($token,"OTINEB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BENITO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esea2x ");flush_buffers();echo "waiting<br>";
posttopage($token,"EILLIB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BILLIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esea2z ");flush_buffers();echo "waiting<br>";
posttopage($token,"TERB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BRET-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esea2E ");flush_buffers();echo "waiting<br>";
posttopage($token,"ECYRB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BRYCE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsebUk ");flush_buffers();echo "waiting<br>";
posttopage($token,"YDDUB","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-BUDDY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esea2I ");flush_buffers();echo "waiting<br>";
posttopage($token,"YERAC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CAREY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esea2O ");flush_buffers();echo "waiting<br>";
posttopage($token,"NEMRAC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CARMEN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsecaG ");flush_buffers();echo "waiting<br>";
posttopage($token,"ESAHC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CHASE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsecaK ");flush_buffers();echo "waiting<br>";
posttopage($token,"KCUHC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CHUCK-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsecaO ");flush_buffers();echo "waiting<br>";
posttopage($token,"DNALEVELC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CLEVELAND-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsecYi ");flush_buffers();echo "waiting<br>";
posttopage($token,"FFILC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-CLIFF-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsecaU ");flush_buffers();echo "waiting<br>";
posttopage($token,"ELOC","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-COLE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esecra ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAIMAD","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-DAMIAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejD7 ");flush_buffers();echo "waiting<br>";
posttopage($token,"ENAD","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-DANE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejDd ");flush_buffers();echo "waiting<br>";
posttopage($token,"SINED","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-DENIS-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EselLi ");flush_buffers();echo "waiting<br>";
posttopage($token,"LLENNOD","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-DONNELL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejDl ");flush_buffers();echo "waiting<br>";
posttopage($token,"NALYD","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-DYLAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EselLm ");flush_buffers();echo "waiting<br>";
posttopage($token,"YDDE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-EDDY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejTF ");flush_buffers();echo "waiting<br>";
posttopage($token,"NIARFE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-EFRAIN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejTK ");flush_buffers();echo "waiting<br>";
posttopage($token,"ILE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ELI-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EselLr ");flush_buffers();echo "waiting<br>";
posttopage($token,"TOILLE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ELLIOT-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EselLv ");flush_buffers();echo "waiting<br>";
posttopage($token,"LEUNAMME","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-EMMANUEL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsejTP ");flush_buffers();echo "waiting<br>";
posttopage($token,"NIWRE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ERWIN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esem1R ");flush_buffers();echo "waiting<br>";
posttopage($token,"NABETSE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ESTEBAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esem1X ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAHTE","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ETHAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esem23 ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAIBAF","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-FABIAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esekac ");flush_buffers();echo "waiting<br>";
posttopage($token,"YDDERF","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-FREDDY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esekae ");flush_buffers();echo "waiting<br>";
posttopage($token,"DNALRAG","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-GARLAND-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esekam ");flush_buffers();echo "waiting<br>";
posttopage($token,"YRREG","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-GERRY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esekaq ");flush_buffers();echo "waiting<br>";
posttopage($token,"MAHARG","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-GRAHAM-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekqG ");flush_buffers();echo "waiting<br>";
posttopage($token,"OIROGERG","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-GREGORIO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esemil ");flush_buffers();echo "waiting<br>";
posttopage($token,"LAH","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-HAL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekqN ");flush_buffers();echo "waiting<br>";
posttopage($token,"YELRAH","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-HARLEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esemip ");flush_buffers();echo "waiting<br>";
posttopage($token,"HTAEH","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-HEATH-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esemiv ");flush_buffers();echo "waiting<br>";
posttopage($token,"OTREBMUH","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-HUMBERTO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekqV ");flush_buffers();echo "waiting<br>";
posttopage($token,"NOSKCAJ","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-JACKSON-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekHb ");flush_buffers();echo "waiting<br>";
posttopage($token,"DORRAJ","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-JARROD-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekHf ");flush_buffers();echo "waiting<br>";
posttopage($token,"SSEJ","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-JESS-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekHh ");flush_buffers();echo "waiting<br>";
posttopage($token,"NIUQAOJ","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-JOAQUIN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekHl ");flush_buffers();echo "waiting<br>";
posttopage($token,"ROINUJ","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-JUNIOR-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsekHr ");flush_buffers();echo "waiting<br>";
posttopage($token,"LLADNEK","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-KENDALL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esemz1 ");flush_buffers();echo "waiting<br>";
posttopage($token,"KCIRDNEK","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-KENDRICK-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esemz3 ");flush_buffers();echo "waiting<br>";
posttopage($token,"ODRANOEL","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-LEONARDO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsemPl ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAGOL","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-LOGAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsemPp ");flush_buffers();echo "waiting<br>";
posttopage($token,"EIUOL","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-LOUIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsemPt ");flush_buffers();echo "waiting<br>";
posttopage($token,"NOSAM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MASON-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsenD3 ");flush_buffers();echo "waiting<br>";
posttopage($token,"DRANYAM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MAYNARD-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsemPx ");flush_buffers();echo "waiting<br>";
posttopage($token,"HACIM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MICAH-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsemPA ");flush_buffers();echo "waiting<br>";
posttopage($token,"LEHCIM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MICHEL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esen5O ");flush_buffers();echo "waiting<br>";
posttopage($token,"YEKCIM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MICKEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsenTo ");flush_buffers();echo "waiting<br>";
posttopage($token,"SELIM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MILES-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esen62 ");flush_buffers();echo "waiting<br>";
posttopage($token,"SESIOM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MOISES-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esen64 ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAGROM","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-MORGAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsenTw ");flush_buffers();echo "waiting<br>";
posttopage($token,"NALON","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-NOLAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsenTz ");flush_buffers();echo "waiting<br>";
posttopage($token,"EILLO","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-OLLIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esen67 ");flush_buffers();echo "waiting<br>";
posttopage($token,"ERREIP","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-PIERRE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esenmt ");flush_buffers();echo "waiting<br>";
posttopage($token,"EIGGER","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-REGGIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esenmz ");flush_buffers();echo "waiting<br>";
posttopage($token,"ODLANYER","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-REYNALDO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseqi1 ");flush_buffers();echo "waiting<br>";
posttopage($token,"OTREBOGIR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RIGOBERTO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseoa6 ");flush_buffers();echo "waiting<br>";
posttopage($token,"YELIR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RILEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseqi5 ");flush_buffers();echo "waiting<br>";
posttopage($token,"BOR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ROB-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseoab ");flush_buffers();echo "waiting<br>";
posttopage($token,"EIBBOR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ROBBIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseoqp ");flush_buffers();echo "waiting<br>";
posttopage($token,"YKCOR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ROCKY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseqi9 ");flush_buffers();echo "waiting<br>";
posttopage($token,"DOR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-ROD-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseoqv ");flush_buffers();echo "waiting<br>";
posttopage($token,"OGIRDOR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RODRIGO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoqB ");flush_buffers();echo "waiting<br>";
posttopage($token,"YROR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RORY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseqyx ");flush_buffers();echo "waiting<br>";
posttopage($token,"LESSUR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RUSSEL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoqH ");flush_buffers();echo "waiting<br>";
posttopage($token,"YTSUR","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-RUSTY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eseqyz ");flush_buffers();echo "waiting<br>";
posttopage($token,"EIMMAS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-SAMMIE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqyB ");flush_buffers();echo "waiting<br>";
posttopage($token,"YTTOCS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-SCOTTY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqyD ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAITSABES","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-SEBASTIAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoH5 ");flush_buffers();echo "waiting<br>";
posttopage($token,"YBLEHS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-SHELBY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqyH ");flush_buffers();echo "waiting<br>";
posttopage($token,"NOMOLOS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-SOLOMON-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoXs ");flush_buffers();echo "waiting<br>";
posttopage($token,"YECATS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-STACEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoXw ");flush_buffers();echo "waiting<br>";
posttopage($token,"YCATS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-STACY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqP7 ");flush_buffers();echo "waiting<br>";
posttopage($token,"NATS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-STAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqP9 ");flush_buffers();echo "waiting<br>";
posttopage($token,"NAHPETS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-STEPHAN-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqPf ");flush_buffers();echo "waiting<br>";
posttopage($token,"GNILRETS","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-STERLING-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqPh ");flush_buffers();echo "waiting<br>";
posttopage($token,"YDDET","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-TEDDY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseoXI ");flush_buffers();echo "waiting<br>";
posttopage($token,"TNERT","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-TRENT-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EseqPl ");flush_buffers();echo "waiting<br>";
posttopage($token,"YT","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-TY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eser5D ");flush_buffers();echo "waiting<br>";
posttopage($token,"ECNAV","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-VANCE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esepe4 ");flush_buffers();echo "waiting<br>";
posttopage($token,"ETNECIV","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-VICENTE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eser5N ");flush_buffers();echo "waiting<br>";
posttopage($token,"ECNIV","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-VINCE-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Eserm5 ");flush_buffers();echo "waiting<br>";
posttopage($token,"YELIW","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-WILEY-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esermd ");flush_buffers();echo "waiting<br>";
posttopage($token,"ODERFLIW","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-WILFREDO-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1Esermn ");flush_buffers();echo "waiting<br>";
posttopage($token,"LLIW","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-WILL-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsepL0 ");flush_buffers();echo "waiting<br>";
posttopage($token,"SMAILLIW","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-WILLIAMS-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EserCJ ");flush_buffers();echo "waiting<br>";
posttopage($token,"REIVAX","https://images.sunfrogshirts.com/2015/01/29/This-Girl-Loves-Her-XAVIER-Valentines-Day-shirts-For-You.jpg","http://bit.ly/1EsepLa ");flush_buffers();echo "waiting<br>";


	}}	
	?>
	
	   <form action="post.php" id="usrform" METHOD=POST>



<br><table><tr><td>
Token :</td><td><input type="text" value="" size=65 name="token"></td></tr>

	<tr>
<td>List</td><td><textarea rows="4" cols="50" name="text" form="usrform">
</textarea> </td></tr>
	
<tr><td></td><td><input type="submit" value="submit">
	</form></td></tr>	
	
		</table><br>