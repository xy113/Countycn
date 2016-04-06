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
 * $ID: admincp_area.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminsite')) die('Access Denied!');
cpheader();
if ($submit == 'yes' && $cityid){
	if ($delete){
		$areaid = implodeids($delete);
		$query = $db->query("SELECT areaname FROM sdw_area WHERE areaid IN ($areaid)");
		while ($data = $db->fetch_array($query)){
			$admin->cplog($lang['cplog_drop_area'].$data['areaname']);
		}
		$db->query("DELETE FROM sdw_area WHERE areaid IN ($areaid)");
	}
	if ($newarea){
		foreach ($newarea as $areaid=>$area){
			$db->update('sdw_area',$area,"areaid='$areaid'");
			$admin->cplog($lang['cplog_edit_area'].$area['areaname']);
		}
	}
	if ($newareaname){
		foreach ($newareaname as $key=>$areaname){
			if ($areaname){
				$db->insert('sdw_area',array('cityid'=>$cityid,'areaname'=>$areaname,'displayorder'=>$neworder[$key]));
				$admin->cplog($lang['cplog_add_area'].$areaname);
			}
		}
	}
	updatecitycache($cityid);
	cpmessage('modi_success');
}else {
	$pagesize = 20;
	$areas = array();
	$sqladd = "WHERE a.areaname LIKE '%$keywords%'";
	$sqladd.= $cityid ? " AND a.cityid='$cityid'" : "";
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_area a LEFT JOIN sdw_city c ON c.cityid=a.cityid $sqladd");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT a.areaid,a.cityid,a.areaname,a.displayorder,c.cityname FROM sdw_area a LEFT JOIN sdw_city c ON c.cityid=a.cityid $sqladd ORDER BY a.displayorder,a.areaid LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$areas[] = $data;
	}
	$pagelink = adminpage($page,$pagecount,"cityid=$cityid&keywords=$keywords");
	$querystring = "cityid=$cityid&keywords=$keywords&page=$page";
	if ($cityid) $city = $db->GetOne("SELECT cityname FROM sdw_city WHERE cityid='$cityid'");
	include template('admin_area');
}
?>