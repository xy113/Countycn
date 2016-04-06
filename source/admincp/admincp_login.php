<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-18
 * $ID: admincp_login.php
**/
if (!defined('IN_XSCMS')||!defined('IN_ADMINCP'))die('Access Denied!');
if ($operation == 'chklogin'){
	$admin->AdminLogin($username,$password,$randcode);
}else {
	include template('admin_login');
}
?>