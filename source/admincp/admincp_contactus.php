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
 * $ID: admincp_contactus.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'add'){
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			$db->insert('sdw_contactus',$contactnew);
			cpmessage('save_success','',$BASESCRIPT.'?action=contactus');
		}
	}
}elseif ($operation == 'edit'){
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			$db->update('sdw_contactus',$contactnew,"id='$id'");
			cpmessage('modi_success');
		}
	}else {
		$contact = $db->GetOne("SELECT * FROM sdw_contactus WHERE id='$id'");
	}
}else {
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			if ($delete){
				$db->query("DELETE FROM sdw_contactus WHERE id IN (".implodeids($delete).")");
				cpmessage('drop_success');
			}else {
				cpmessage('no_select','error');
			}
		}
	}else {
		$messages = array();
		$query = $db->query("SELECT * FROM sdw_contactus ORDER BY id");
		while ($data = $db->fetch_array($query)){
			$messages[] = $data;
		}
	}
}
include template('admin_contactus');
?>