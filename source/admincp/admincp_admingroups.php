<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-06-18
 * $ID: admincp_admingroups.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->isfounder)die('Access Denied!');
cpheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		cpmessage('undefiend_action','error');
	}
	if ($operation == 'edit'){
		$db->update('sdw_admingroups',$admingroupnew,"admingid='$admingid'");
		cpmessage('modi_success');
	}else {
		if (is_array($delete)){
			$db->query("DELETE FROM sdw_admingroups WHERE admingid IN (".implodeids($delete).")");
			$db->query("DELETE FROM sdw_usergroups WHERE groupid IN (".implodeids($delete).")");
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
					$admingid = $db->insert('sdw_usergroups',array('groupname'=>$groupname,'radminid'=>$newradminid[$key],'type'=>$newtype[$key]),TRUE);
					$db->insert('sdw_admingroups',array('admingid'=>$admingid),FALSE,TRUE);
				}
			}
		}
		updatecache('usergroups');
		updatecache('admingroups');
		cpmessage('save_success');
	}
}else {
	if ($operation == 'edit'){
		$admingroup = $db->GetOne("SELECT * FROM sdw_admingroups WHERE admingid='$admingid'");
	}else {
		$admingroups = array();
		$query = $db->query("SELECT a.admingid,g.groupid,g.groupname,g.radminid,g.type,g.creditshigher,g.creditslower FROM sdw_admingroups a LEFT JOIN 
		sdw_usergroups g ON g.groupid=a.admingid ORDER BY a.admingid");
		while ($data = $db->fetch_array($query)){
			$data['typename'] = $lang['usergroup_type_'.$data['type']];
			$data['level'] = $lang['usergroup_level_'.$data['radminid']];
			$admingroups[] = $data;
		}
	}
}
include template('admin_admingroups');
?>