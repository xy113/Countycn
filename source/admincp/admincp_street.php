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
 * $ID: admincp_street.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminsite')) die('Access Denied!');
if (!$areaid)die('Access Denied!');
cpheader();
if ($submit == 'yes'){
	if ($delete){
		$db->query("DELETE FROM sdw_street WHERE streetid IN (".implodeids($delete).")");
	}
	if ($newstreet){
		foreach ($newstreet as $streetid=>$street){
			$db->update('sdw_street',$street,"streetid='$streetid'");
		}
	}
	if ($newstreetname){
		foreach ($newstreetname as $key=>$streetname){
			$db->insert('sdw_street',array('areaid'=>$areaid,'streetname'=>$streetname,'displayorder'=>$neworder[$key]));
		}
	}
	cpmessage('modi_success');
}else {
	$streets = array();
	$query = $db->query("SELECT streetid,streetname,displayorder FROM sdw_street WHERE areaid='$areaid' ORDER BY displayorder,streetid");
	while ($data = $db->fetch_array($query)){
		$streets[] = $data;
	}
	include template('admin_street');
}
?>