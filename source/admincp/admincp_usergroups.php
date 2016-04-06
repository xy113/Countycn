<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-21
 * $ID: admincp_usergroups.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		cpmessage('undefiend_action','error');
	}
	if ($operation == 'edit'){
		$db->update('sdw_usergroups',$usergroupnew,"groupid='$groupid'");
		cpmessage('modi_success');
	}else {
		if (is_array($delete)){
			$db->query("DELETE FROM sdw_usergroups WHERE groupid IN (".implodeids($delete).")");
			$db->query("DELETE FROM sdw_admingroups WHERE admingid IN (".implodeids($delete).")");
			$newgroup = $db->GetOne("SELECT groupid FROM sdw_usergroups WHERE type='member' ORDER BY groupid LIMIT 0,1");
			$db->query("UPDATE sdw_members SET groupid='$newgroup[groupid]' WHERE groupid IN (".implodeids($delete).")");
		}
		if ($groupnew){
			foreach ($groupnew as $groupid=>$group){
				$db->update('sdw_usergroups',$group,"groupid='$groupid'");
			}
		}
		if ($newgroupname){
			foreach ($newgroupname as $key=>$groupname){
				if ($groupname){
					$db->insert('sdw_usergroups',array('groupname'=>$groupname,'creditslower'=>$newcreditslower[$key],
					'creditshigher'=>$newcreditshigher[$key],'type'=>'member'));
				}
			}
		}
		updatecache('usergroups');
		cpmessage('save_success');
	}
}else {
	if ($operation == 'edit'){
		$usergroup = $db->GetOne("SELECT * FROM sdw_usergroups WHERE groupid='$groupid'");
	}else {
		$usergroups = array();
		$query = $db->query("SELECT groupid,radminid,groupname,type,creditshigher,creditslower FROM sdw_usergroups ORDER BY groupid");
		while ($data = $db->fetch_array($query)){
			$usergroups[$data['type']][] = $data;
		}
	}
}
include template('admin_usergroups');
?>