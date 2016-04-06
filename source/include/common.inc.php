<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-11
 * $ID: common.inc.php
*/ 
error_reporting(E_ALL & ~E_NOTICE);
@set_magic_quotes_runtime(0);
@date_default_timezone_set('Asia/Shanghai');
//==========================================
//开始计算页面执行时间
//==========================================
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
define('IN_XSCMS',true);
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
!defined('CURSCRIPT') && define('CURSCRIPT', '');
!defined('TPLDIR') && define('TPLDIR','');
/* 取得当前系统所在的根目录 */
define('ROOT_PATH', str_replace("/source/include/common.inc.php", '', str_replace('\\', '/', __FILE__)));
require_once ROOT_PATH."/config/config.php";
require_once ROOT_PATH."/source/lang/$config[language]/lang.php";
require_once ROOT_PATH."/source/function/function.common.php";
require_once ROOT_PATH."/source/function/function.cache.php";
$cachelost = (@include ROOT_PATH.'/data/cache/settings.php') ? '' : 'settings';
header("Content-type: text/html;charset=".$config['output']['charset']); 
define('FORMHASH',formhash());
@ini_set('session.gc_maxlifetime',600); 
@ini_set('session.auto_start',0);
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('max_execution_time',600);
@ini_set('session.save_path', ROOT_PATH.'/data/sessions');
if (isset($_REQUEST['sessionid'])) session_id($_REQUEST['sessionid']);
session_start();
if(PHP_VERSION < '4.1.0') {
	$_GET    = &$HTTP_GET_VARS;
	$_POST   = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV    = &$HTTP_ENV_VARS;
	$_FILES  = &$HTTP_POST_FILES;
	$_SESSION = &$HTTP_SESSION_VARS;
}
unset($HTTP_GET_VARS,$HTTP_POST_VARS,$HTTP_POST_FILES,$HTTP_COOKIE_VARS,$HTTP_ENV_VARS,$HTTP_SERVER_VARS,$HTTP_SESSION_VARS);
foreach(array('_COOKIE', '_POST', '_GET') as $_request) {
	foreach($$_request as $_key => $_value) {
		$_key{0} != '_' && $$_key = daddslashes($_value);
	}
}
if (!MAGIC_QUOTES_GPC && $_FILES) {
	$_FILES = daddslashes($_FILES);
}
if (!MAGIC_QUOTES_GPC){
	$_GET && $_GET = daddslashes($_GET);
	$_POST && $_POST = daddslashes($_POST);
	$_POST && $_REQUEST = daddslashes($_REQUEST);
}
$_XCOOKIE = $CACHE = $cplang = $lang = $posts = array();
$prelength = strlen($config['cookie']['cookiepre']);
foreach($_COOKIE as $key => $val) {
	if(substr($key, 0, $prelength) == $config['cookie']['cookiepre']) {
		$_XCOOKIE[(substr($key, $prelength))] = MAGIC_QUOTES_GPC ? $val : daddslashes($val);
	}
}
unset($prelength);
$timestamp = time();
$ipaddr = $_SERVER['REMOTE_ADDR'];
$inajax = !empty($inajax);
$action = htmlspecialchars($action);
$page = max(array(1,intval($page)));
$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
$BASESCRIPT = basename($_SERVER['PHP_SELF']);
$serverarray = explode('.',$_SERVER['HTTP_HOST']);
$city = $serverarray[0];
$city = $city && !in_array($city,array('countycn','px37','www','bbs','image','static','px37','localhost:81','mps')) ? $city : '';
unset($serverarray);
$referer = isset($_SERVER['HTTP_REFERER']) ?  $_SERVER['HTTP_REFERER'] : 'index.php';
if ($inajax || defined('IN_ADMINCP')){
	header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-cache, must-revalidate');
	header('Pragma: no-cache');
}
require_once  ROOT_PATH."/source/class/class.mysql.php";
//==========================================
//Mysql Connection
//==========================================
$db = new DB($config['db']['dbhost'], $config['db']['dbuser'], $config['db']['dbpwd'], $config['db']['dbname'], $config['db']['pconnect']);
unset($config['db']['dbhost'], $config['db']['dbuser'], $config['db']['dbpwd'], $config['db']['dbname'], $config['db']['pconnect']);
$cachelost.= (@include ROOT_PATH.'/data/cache/usergroups.php') ? '' : 'usergroups';
$cachelost.= (@include ROOT_PATH.'/data/cache/admingroups.php') ? '' : 'admingroups';
$cachelost.= (@include ROOT_PATH.'/data/cache/category.php') ? '' : 'category';
$cachelost.= (@include ROOT_PATH.'/data/cache/province.php') ? '' : 'province';
$cachelost.= (@include ROOT_PATH.'/data/cache/city.php') ? '' : 'city';
if($cachelost) {
	updatecache();
	exit('Cache List: '.$cachelost.'<br />Caches successfully created, please refresh.');
}
?>