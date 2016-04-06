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
 * $ID: admincp_threads.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($submit == 'yes'){
	if ($formhash == FORMHASH){
		if ($delete){
			$query = $db->query("SELECT tid,title FROM sdw_threads WHERE tid IN (".implodeids($delete).")");
			while ($data = $db->fetch_array($query)){			
				$db->query("DELETE FROM sdw_threads WHERE tid='$data[tid]'");
				$db->query("DELETE FROM sdw_typeoptionvars WHERE tid='$data[tid]'");
				$admin->cplog($lang['cplog_drop_thread'].$data['title']);
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
	$threads = $cities = array();
	$sqladd = "WHERE t.title LIKE '%$keywords%'";
	$sqladd.= $audited == -1 ? " AND t.audited=0" : "";
	$sqladd.= $cid ? " AND t.cid='$cid'" : "";
	if ($admincp['adminid'] == 1){
		$sqladd.= $cityid ? " AND t.cityid='$cityid'" : "";
	}elseif ($admincp['adminid'] == 2){
		$ids = $comm = '';
		$query = $db->query("SELECT cityid FROM sdw_city_admins WHERE uid='$admincp[uid]' ORDER BY cityid,uid");
		while ($mod = $db->fetch_array($query)){
			$ids .= $comm.$mod['cityid'];
			$comm = ',';
		}
		!$ids && $ids = 0;
		$sqladd.= $cityid ? " AND (t.cityid='$cityid' AND t.cityid IN ($ids))" : " AND t.cityid IN ($ids)";	
	}else {
		cpmessage('nopriv','error');
	}
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_threads t LEFT JOIN sdw_category c ON c.cid=t.cid LEFT JOIN sdw_city ct ON ct.cityid=t.cityid $sqladd");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT t.tid,t.cid,t.cityid,t.title,t.views,t.dateline,t.ip,t.ip2,c.cname,c.pinyin,ct.cityname,ct.cityhost FROM sdw_threads t LEFT JOIN sdw_category c ON c.cid=t.cid 
	LEFT JOIN sdw_city ct ON ct.cityid=t.cityid $sqladd ORDER BY t.tid DESC LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$data['dateline'] = date('Y-m-d H:i',$data['dateline']);
		$threads[] = $data;
	}
	$pagelink = adminpage($page,$pagecount,"cid=$cid&audited=$audited&cityid=$cityid&keywords=$keywords");
	$querystring = "cid=$cid&audited=$audited&cityid=$cityid&keywords=$keywords&page=$page";
	if ($admincp['adminid'] == 2){
		$query = $db->query("SELECT cityid,cityname FROM sdw_city WHERE cityid IN ($ids)");
		while ($data = $db->fetch_array($query)){
			$cities[] = $data;
		}
	}else {
		$letters = array('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','W','X','Y','Z');
		$query = $db->query("SELECT cityid,cityletter,cityname FROM sdw_city ORDER BY displayorder,cityid");
		while ($data = $db->fetch_array($query)){
			$cities[$data['cityletter']][] = $data;
		}
	}
	include template('admin_threads');
}
?>