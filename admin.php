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
 * $ID: admin.php
**/
define('NOROBOT', TRUE);
define('IN_ADMINCP', TRUE);
define('CURSCRIPT', 'admin');
define('TPLDIR','admincp');
define('ADMINSCRIPT', basename(__FILE__));
require_once './source/include/common.inc.php';
require_once './source/admincp/admin.class.php';
require_once './source/admincp/function.common.php';
require_once "./source/lang/$config[language]/admincp.php";
$operation = htmlspecialchars($operation);
$lang = array_merge($lang,$cplang);
$admin = new Admin();
$admincp = $admin->admincp;
$isfounder = $admin->isfounder;
if ($admin->cpaccess==0) {
	require_once ROOT_PATH.'/source/admincp/admincp_login.php';
}elseif ($action=='logout'){
	$admin->AdminLogout();
}else {
	if (!empty($action)){
		include "./source/admincp/admincp_$action.php";
		cpfooter();
	}else {
		include './source/admincp/admincp_main.php';
	}
}
?>