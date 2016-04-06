<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-16
 * $ID: admincp_index.php
*/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
/* 系统信息 */
$gd_info=gd_info();
$sys_info['os']            = PHP_OS;
$sys_info['ip']            = $_SERVER['SERVER_ADDR'];
$sys_info['web_server']    = $_SERVER['SERVER_SOFTWARE'];
$sys_info['php_ver']       = PHP_VERSION;
$sys_info['mysql_ver']     = $db->server_info();
$sys_info['zlib']          = function_exists('gzclose') ? $lang['yes'] : $lang['no'];
$sys_info['safe_mode']     = (boolean) ini_get('safe_mode') ? $lang['yes'] : $lang['no'];
$sys_info['safe_mode_gid'] = (boolean) ini_get('safe_mode_gid') ? $lang['yes'] : $lang['no'];
$sys_info['timezone']      = function_exists("date_default_timezone_get") ? date_default_timezone_get() : $lang['no_timezone'];
$sys_info['socket']        = function_exists('fsockopen') ? $lang['yes'] : $lang['no'];
/* 允许上传的最大文件大小 */
$sys_info['max_filesize']  = ini_get('upload_max_filesize');
$sys_info['gd']            = $gd_info['GD Version'];
$sys_info['charset']       = $config['output']['charset'];
include template('admin_index');
?>