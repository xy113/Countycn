<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-22
 * $ID: admincp_admin.php
**/
if (!defined('IN_XSCMS')) die('Access Denied!');
if (!$admin->isfounder) die('Access Denied!');
cpheader();
if ($operation == 'add'){
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			$data = $db->GetOne("SELECT adminid FROM sdw_admins WHERE admin='$adminnew[admin]'");
			if ($data){
				cpmessage('admin_exists','error');
			}else {
				$adminid = $db->insert('sdw_admins',$adminnew,TRUE);
				$random = random(4);
				$password = md5(md5($newpassword).md5($random));
				$adminuser['random'] = $random;
				$adminuser['password'] = $password;
				$adminuser['groupid'] = $newgroupid;
				$adminuser['email'] = $newemail;
				$adminuser['telephone'] = $newtelephone;
				$adminuser['userim'] = $newuserim;
				$adminuser['realname'] = $adminnew['realname'];
				$adminuser['adminid'] = $adminid;
				$data = $db->GetOne("SELECT uid FROM sdw_members WHERE username='$adminnew[admin]'");
				if ($data){
					$db->update('sdw_members',$adminuser,"uid='$data[uid]'");
					$admin->cplog($lang['cplog_edit_user'].$adminnew['admin']);
				}else {
					$adminuser['username'] = $adminnew['admin'];	
					$adminuser['regdate'] = $timestamp;
					$adminuser['regip'] = $ipaddr;
					$db->insert('sdw_members',$adminuser);
					$admin->cplog($lang['cplog_add_user'].$adminnew['admin']);
				}
				cpmessage('save_success');
			}
		}
	}
}elseif ($operation == 'edit'){
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefiend_action','error');
		}else {
			$db->update('sdw_admins',$adminnew,"adminid='$adminid'");
			if (strlen($newpassword)>5){
				$adminuser['random'] = random(4);
				$adminuser['password'] = md5(md5($newpassword).md5($adminuser['random']));
			}
			$username = trim($_POST['username']);
			$adminuser['groupid'] = $newgroupid;
			$adminuser['adminid'] = $adminid;
			$adminuser['email'] = $newemail;
			$adminuser['telephone'] = $newtelephone;
			$adminuser['userim'] = $newuserim;
			$adminuser['realname'] = $adminnew['realname'];
			$data = $db->GetOne("SELECT uid FROM sdw_members WHERE username='$username'");
			if ($data){
				$db->update('sdw_members',$adminuser,"uid='$data[uid]'");
				$admin->cplog($lang['cplog_edit_user'].$username);
			}else {
				$adminuser['username'] = $username;
				$adminuser['regdate'] = $timestamp;
				$adminuser['regip'] = $ipaddr;
				$db->insert('sdw_members',$adminuser);
				$admin->cplog($lang['cplog_add_user'].$username);
			}	
			cpmessage('modi_success');
		}
	}else {
		$adminuser = $db->GetOne("SELECT a.*,m.uid,m.username,m.groupid,m.email,m.telephone,m.userim FROM sdw_admins a LEFT JOIN sdw_members m ON m.adminid=a.adminid WHERE a.adminid='$adminid'");
	}
}else {
	if ($submit == 'yes'){
		if ($formhash == FORMHASH){
			if ($delete){
				$query = $db->query("SELECT adminid,admin FROM sdw_admins WHERE adminid IN (".implodeids($delete).")");
				while ($data = $db->fetch_array($query)){
					$admin->cplog($lang['cplog_drop_user'].$data['admin']);
					$db->query("DELETE FROM sdw_admins WHERE adminid='$data[adminid]'");
					$db->query("DELETE FROM sdw_members WHERE adminid='$data[adminid]'");
				}
				cpmessage('drop_success');
			}else {
				cpmessage('no_select','error');
			}
		}else {
			cpmessage('undefined_action','error');
		}
	}else {
		$pagesize = 50;
		$admins = array();
		$sqladd = "WHERE (a.admin LIKE '%$keywords%')";
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_admins a LEFT JOIN sdw_members m ON m.adminid=a.adminid $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT a.adminid,a.admin,a.realname,a.cityid,m.uid,m.groupid,m.lastvisit,m.lastip FROM sdw_admins a 
		JOIN sdw_members m ON m.adminid=a.adminid $sqladd ORDER BY a.adminid ASC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['isfounder'] = $admin->founder($data['adminid']);
			$data['groupname'] = $data['isfounder'] ? $lang['founder'] : $CACHE['usergroups'][$data['groupid']]['groupname'];
			$data['cityname'] = $data['cityid']>0 ? $CACHE['cities'][$data['cityid']]['cityname'] : $CACHE['usergroups'][$data['groupid']]['groupname'];
			$data['lastvisit'] = date('Y-m-d H:i',$data['lastvisit']);
			$admins[] = $data;
		}
		$pagelink = adminpage($page,$pagecount,"keywrods=$keywords");
	}
}
include template('admin_admin');
?>