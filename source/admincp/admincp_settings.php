<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-20
 * $ID: admincp_settings.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
!$operation && $operation = 'basic';
if (!$admin->checkadminpriv('allowadminsetting')) die('Access Denied!');
cpheader();
if ($submit == 'yes'){
	foreach ($settingnew as $key=>$value){
		if (is_array($value)) $value = serialize($value);
		$db->insert('sdw_settings',array('skey'=>$key,'svalue'=>$value),FALSE,TRUE);
	}
	updatecache('settings');
	$admin->cplog($lang['cplog_edit_settings']);
	cpmessage('setting_modi_succeed');
}else {
	include template('admin_settings');
}
?>