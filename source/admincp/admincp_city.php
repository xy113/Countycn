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
 * $ID: admincp_city.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminsite')) die('Access Denied!');
cpheader();
if ($operation == 'merger'){
	if ($submit == 'yes'){
		if ($source && $target){
			$cityid = implodeids($source);
			$query = $db->query("SELECT cityid,cityname FROM sdw_city WHERE cityid IN($cityid) AND cityid<>$target");
			while ($data = $db->fetch_array($query)){
				$admin->cplog($lang['cplog_drop_city'].$data['cityname']);
			}
			$db->query("UPDATE sdw_threads SET cityid='$target' WHERE cityid IN ($cityid)");
			$db->query("UPDATE sdw_area SET cityid='$target' WHERE cityid IN ($cityid)");
			$db->query("DELETE FROM sdw_city WHERE cityid IN($cityid) AND cityid<>$target");
			updatecache('city');
			updatecache('area');
		}
		updatecache('city');
		cpmessage('modi_success');
	}else {
		$provinces = $cities = array();
		$query = $db->query("SELECT provinceid,provincename FROM sdw_province ORDER BY displayorder,provinceid");
		while ($data = $db->fetch_array($query)){
			$provinces[] = $data;
		}
		$query = $db->query("SELECT cityid,cityname,provinceid FROM sdw_city ORDER BY displayorder,cityid");
		while ($data = $db->fetch_array($query)){
			$cities[$data['provinceid']][] = $data;
		}
		include template('admin_city');
	}
}elseif ($operation == 'move'){
	if ($submit == 'yes'){
		if ($provinceid && $cityid){
			$db->query("UPDATE sdw_city SET provinceid='$provinceid' WHERE cityid IN (".implodeids($cityid).")");
		}
		cpmessage('modi_success');
	}else {
		$provinces = $cities = array();
		$query = $db->query("SELECT provinceid,provincename FROM sdw_province ORDER BY displayorder,provinceid");
		while ($data = $db->fetch_array($query)){
			$provinces[] = $data;
		}
		$query = $db->query("SELECT cityid,cityname,provinceid FROM sdw_city ORDER BY displayorder,cityid");
		while ($data = $db->fetch_array($query)){
			$cities[$data['provinceid']][] = $data;
		}
		include template('admin_city');
	}
}elseif ($operation == 'admins'){
	if ($formsubmit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}
		if (is_array($delete)){
			$deleteuids = implodeids($delete);
			$db->query("DELETE FROM sdw_city_admins WHERE cityid='$cityid' AND uid IN ($deleteuids)");
		}
		if ($displayorder){
			foreach ($displayorder as $key=>$val){
				$db->update('sdw_city_admins',array('displayorder'=>$val),"cityid='$cityid' AND uid='$key'");
			}
		}
		if ($newusername){
			$member = $db->GetOne("SELECT uid FROM sdw_members WHERE username='$newusername'");
			if (!$member){
				cpmessage('no_user','error');
			}else {
				//$db->insert('sdw_city_admins',array('uid'=>$user['uid'],'cityid'=>$cityid),FALSE,TRUE);
				$db->query("REPLACE INTO sdw_city_admins(uid,cityid,displayorder)VALUES('$member[uid]','$cityid','$neworder')");
				$db->query("UPDATE sdw_members SET adminid='$newadminid',groupid='$newadminid' WHERE uid='$member[uid]' AND adminid NOT IN (1,2)");
			}
		}
		$admins = $comm = '';
		$query = $db->query("SELECT m.username FROM sdw_city_admins a LEFT JOIN sdw_members m ON m.uid=a.uid WHERE a.cityid='$cityid' ORDER BY a.displayorder");
		while ($data = $db->fetch_array($query)){
			$admins .= $comm.addslashes($data['username']);
			$comm = ',';
		}
		$db->query("UPDATE sdw_city SET admins='$admins' WHERE cityid='$cityid'");
		cpmessage('save_success');
	}else {
		$users = array();
		$query = $db->query("SELECT a.*,m.username,m.groupid FROM sdw_city_admins a LEFT JOIN sdw_members m 
		ON m.uid=a.uid WHERE a.cityid='$cityid' ORDER BY a.uid");
		while ($data = $db->fetch_array($query)){
			$data['groupname'] = $lang['usergroup_level_'.$data['groupid']];
			$users[] = $data;
		}
		include template('admin_cityadmins');
	}
}else {
	if ($submit == 'yes'){
		if ($delete){
			$query = $db->query("SELECT cityid,cityname FROM sdw_city WHERE cityid IN (".implodeids($delete).")");
			while ($data = $db->fetch_array($query)){
				$admin->cplog($lang['cplog_drop_city'].$data['cityname']);
			}
			$db->query("DELETE FROM sdw_city WHERE cityid IN (".implodeids($delete).")");
		}
		if ($newcity){
			foreach ($newcity as $cityid=>$city){
				$city['cityletter'] = strtoupper($city['cityletter']);
				$db->update('sdw_city',$city,"cityid='$cityid'");
				$admin->cplog($lang['cplog_edit_city'].$city['cityname']);
			}
		}
		if ($newcityname){
			foreach ($newcityname as $key=>$cityname){
				if ($cityname){
					$db->insert('sdw_city',array('cityname'=>$cityname,'provinceid'=>$newprovinceid[$key],
					'citypy'=>$newcitypy[$key],'cityletter'=>strtoupper($newcityletter[$key]),'cityhost'=>$newcityhost[$key]
					));
					$admin->cplog($lang['cplog_add_city'].$cityname);
				}
			}
		}
		updatecache('city');
		cpmessage('modi_success');
	}else {
		$pagesize = 20;
		$cities = array();
		$provinceid = intval($provinceid);
		$sqladd = "WHERE cityname LIKE '%$keywords%'";
		$sqladd.= $provinceid ? " AND provinceid='$provinceid'" : "";
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_city $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT cityid,provinceid,cityname,citypy,cityletter,displayorder,cityhost,admins FROM sdw_city $sqladd ORDER BY displayorder ASC,cityid ASC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$cities[] = $data;
		}
		$pagelink = adminpage($page,$pagecount,"provinceid=$provinceid&keywords=$keywords");
		$querystring = "provinceid=$provinceid&keywords=$keywords&page=$page";
		include template('admin_city');
	}
}
?>