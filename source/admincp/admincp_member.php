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
 * $ID: admincp_member.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminmember')) die('Access Denied!');
cpheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		cpmessage('undefined_action','error');
	}
	if ($operation == 'add'){
		$membernew['random'] = random(4);
		$membernew['password'] = md5(md5($membernew['password']).md5($membernew['random']));
		$membernew = array_merge($membernew,array('regdate'=>$timestamp,'regip'=>$ipaddr));
		$uid = $db->insert('sdw_members',$membernew,true);
		$usergroup = $db->GetOne("SELECT radminid FROM sdw_usergroups WHERE groupid='$membernew[groupid]'");
		if ($usergroup['radminid']>0){
			$db->update('sdw_members',array('adminid'=>$usergroup['radminid']),"uid='$uid'");
		}
		$admin->cplog($lang['cplog_edit_user'].$membernew['username']);
		cpmessage('save_success');
	}elseif ($operation == 'edit'){
		if (strlen($membernew['password'])>5){
			$membernew['random'] = random(4);
			$membernew['password'] = md5(md5($membernew['password']).md5($membernew['random']));
		}else {
			unset($membernew['password']);
		}
		if ($admin->founder($uid)){
			$membernew['adminid'] = $membernew['groupid'] = 1;
		}
		$db->update('sdw_members',$membernew,"uid='$uid'");
		$usergroup = $db->GetOne("SELECT radminid FROM sdw_usergroups WHERE groupid='$membernew[groupid]'");
		if ($usergroup['radminid']>0){
			$db->update('sdw_members',array('adminid'=>$usergroup['radminid']),"uid='$uid'");
		}else {
			$db->update('sdw_members',array('adminid'=>'0'),"uid='$uid'");
		}
		$admin->cplog($lang['cplog_edit_user'].$membernew['username']);
		cpmessage('modi_success');
	}else {
		if (is_array($delete)){
			$query = $db->query("SELECT uid,username FROM sdw_members WHERE uid IN (".implodeids($delete).")");
			while ($data = $db->fetch_array($query)){
				if (!$admin->founder($data['uid'])){
					$admin->cplog($lang['cplog_drop_user'].daddslashes($data['username']));
					$db->query("DELETE FROM sdw_members WHERE uid='$data[uid]'");
				}
			}
			cpmessage('drop_success');
		}else {
			cpmessage('no_select','error');
		}
	}
}else {
	if ($operation == 'add'){
		$usergroups = array();
		$query = $db->query("SELECT radminid,groupid,groupname,type FROM sdw_usergroups ORDER BY groupid");
		while ($data = $db->fetch_array($query)){
			$usergroups[$data['type']][] = $data;
		}
	}elseif ($operation == 'edit'){
		$user = $db->GetOne("SELECT * FROM sdw_members WHERE uid='$uid'");
		$usergroups = array();
		$query = $db->query("SELECT radminid,groupid,groupname,type FROM sdw_usergroups ORDER BY groupid");
		while ($data = $db->fetch_array($query)){
			$usergroups[$data['type']][] = $data;
		}
	}else {
		$pagesize = 50;
		$users = array();
		$sqladd = "WHERE m.username LIKE '%$keywords%'";
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_members m LEFT JOIN sdw_usergroups g ON g.groupid=m.groupid $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT m.uid,m.adminid,m.username,m.groupid,m.regdate,m.lastvisit,m.lastip,m.posts,m.credits,g.groupname FROM sdw_members m 
		LEFT JOIN sdw_usergroups g ON g.groupid=m.groupid $sqladd ORDER BY m.uid ASC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['regdate'] = date('Y-m-d H:i',$data['regdate']);
			$data['lastvisit'] = date('Y-m-d H:i',$data['lastvisit']);
			$data['isfounder'] = $admin->founder($data['uid']);
			$users[] = $data;
		}
		$pagelink = adminpage($page,$pagecount,"keywords=$keywords");
	}
}
include template('admin_member');
?>