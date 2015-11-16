<?php

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('ENV', 'dev');
    define('DATA_FOLDER', 'data/');
} else {
    define('ENV', 'prod');
    define('DATA_FOLDER', '/var/www/go2minecraft.com/');
}

/**
 * Dump a variable to output buffer
 * @param mixed $var a variable to dump
 * @return string HTML dump of parameter
 */
function dump($var) {
	die (CVarDumper::dumpAsString($var, 10, true));
}

/**
 * Shortcut to Yii::trace()
 * @param mixed $x the message to trace
 * @return mixed the argument passed in
 * @param bool $export to var_export the value of $x
 */
function trace($x, $export = false) {
	Yii::trace($export ? var_export($x, true) : $x);
	return $x;
}

/**
 * Shortcut to Yii::log()
 */
function logged($msg, $level ="debug", $category = "") {
	Yii::log($msg,$level,$category);
}

/**
 * DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);

/**
 * @return CApplication Yii::app()
 */
function app() {
    return Yii::app();
}

/**
 * @return CClientScript Yii::app()->clientScript
 */
function cs() {
    return Yii::app()->getClientScript();
}

/**
 * @return CAuthManager Yii::app()->authManager
 */
function am() {
    return Yii::app()->getAuthManager();
}

/**
 * @return CWebUser Yii::app()->user
 */
function user() {
    return Yii::app()->getUser();
}

/**
 * Sets or gets user state. getter if $val is null. setter otherwise
 * @param string $key state store key
 * @param null $val key for the stored data
 * @return mixed the stored data
 */
function state($key, $val = null) {
	if ($val === null)
		return Yii::app()->getUser()->getState($key);
	else
		return Yii::app()->getUser()->getState($key, $val);
}

/**
 * Shortcut to Yii::app()->createUrl()
 * @param string $route controller/action-type route
 * @param array $params
 * @param string $ampersand
 * @return string
 */
function url($route, $params=array(), $ampersand='&') {
    return Yii::app()->createUrl($route,$params,$ampersand);
}

/**
 * Shortcut to CHtml::encode
 * @param string $text raw text to encode
 * @return string
 */
function h($text) {
    return htmlspecialchars($text, ENT_QUOTES, Yii::app()->charset);
}

/**
 * Shortcut to CHtml::link()
 * @param string $text raw link text
 * @param string $url link URL or route
 * @param array $htmlOptions
 * @return string HTML link tag
 */
function l($text, $url = '#', $htmlOptions = array()) {
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * Shortcut to Yii::t() with default category = 'user'
 * @param string $category translation library
 * @param string $message soure language text
 * @param array $params string params
 * @param string $source source language
 * @param string $language target language
 * @return string translated text
 */
function t($message, $category = 'user',$params = array(), $source = null, $language = null) {
    return Yii::t($category, $message, $params, $source, $language);
}

/**
 * Quotes a string value for use in a query.
 * @param string $s string to be quoted
 * @return string the properly quoted string
 * @see 
 */
function q($s) {
	return Yii::app()->db->quoteValue($s);
}

/**
 * Shortcut to Yii::app()->request->getParam();
 * @param of $param
 * @param null $default
 * @return value of param
 */
function request($param, $default = null) {
	return Yii::app()->request->getParam($param, $default);
}

/**
 * Shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 *  string $url a relative url to prefix with baseUrl
 *  string
 */
function bu($url=null) {
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

/**
 * Shortcut to Yii::app()->params[$name].
 *  $name
 *  mixed the named application parameter
 */
function param($name) {
    return Yii::app()->params[$name];
}

/**
 *  string $str subject of test for integerness
 *  bool true if argument is an integer string
 */
function intStr($str) {
	return !!preg_match('/^\d+$/', $str);
}

/**
 * Pulish assets : js or css
 * a shorten function by Yii
 * @param string $str
 */
function publish($str){
	return Yii::app()->assetManager->publish($str);
}

/**
 *
 * @param string $data
 * @param yyyy/MM/dd HH:mm:ss $inputPattern
 * @param Y-m-d H:i:s $outputPattern
 */
function formatDateTime($data,$inputPattern,$outputPattern){
    if ($data == null)
        return null;
    $timestamp = CDateTimeParser::parse($data,$inputPattern);
    return CTimestamp::formatDate($outputPattern,$timestamp);
}

/**
 * Makes the given URL relative to the /js directory
 */
function jsUrl($url)
{
    return Yii::app()->baseUrl . '/js/' . $url;
}

function getUrl($url)
{
    return Yii::app()->baseUrl . '/' . $url;
}

function uploadsUrl($url)
{
    return Yii::app()->baseUrl . '/uploads/' . $url;
}

function jqueryCssUrl($url)
{
    return Yii::app()->baseUrl . '/js/jqueryUI/theme/' . $url;
}


/********** For Theming *********/


/**
 * Makes the given URL relative to the /theme/image directory
 */
function imageThemeUrl($url)
{
    return Yii::app()->theme->baseUrl . '/images/' . $url;
}

/**
 * Makes the given URL relative to the /theme/css directory
 */
function cssThemeUrl($url)
{
    return Yii::app()->theme->baseUrl . '/css/' . $url;
}

/**
 * Makes the given URL relative to the /theme/js directory
 */
function jsThemeUrl($url)
{
    return Yii::app()->theme->baseUrl . '/js/' . $url;
}

function vn_str_filter($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }

    $str = preg_replace('/-/', '', $str);
    $str = preg_replace('/,/', '', $str);
    $str = preg_replace('/\?/', '', $str);
    $str = preg_replace('/\./', '', $str);
    $str = preg_replace('/!/', '', $str);
    $str = preg_replace("/\s+/i", '-', $str);
    return $str;
}