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
 * $ID: admincp_province.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminsite')) die('Access Denied!');
cpheader();
if ($submit){
	if ($delete){
		$db->query("DELETE FROM sdw_province WHERE provinceid IN (".implodeids($delete).")");
	}
	if ($newprovince){
		foreach ($newprovince as $provinceid=>$province) {
			$db->update('sdw_province',$province,"provinceid='$provinceid'");
		}
	}
	if ($newprovincename){
		foreach ($newprovincename as $key=>$provincename){
			if ($provincename){
				$db->insert('sdw_province',array('provincename'=>$provincename,
				'provincepy'=>$newprovincepy[$key],'displayorder'=>$neworder[$key]));
			}
		}
	}
	updatecache('province');
	cpmessage('modi_success');
}else {
	$provinces = array();
	$query = $db->query("SELECT * FROM sdw_province ORDER BY displayorder,provinceid");
	while ($data = $db->fetch_array($query)){
		$provinces[] = $data;	
	}
	include template('admin_province');
}
?>