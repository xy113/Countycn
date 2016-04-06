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
 * $ID: admincp_cplog.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminlog')) die('Access Denied!');
if($operation == 'clearall'){
	$db->query("DELETE FROM sdw_adminlog");
	$operation = 'list';
}elseif ($operation == 'export'){
	$cplogs = array();
	include ROOT_PATH.'/source/class/php_excel.class.php';
	$excel = new Excel_XML('GB2312');
	$query = $db->query("SELECT b.username,a.body,a.dateline,a.ipaddr,a.requesturi FROM sdw_adminlog a LEFT JOIN sdw_members b ON b.uid=a.uid ORDER BY a.id DESC");
	while($data = $db->fetch_array($query)){
		$data['dateline'] = date('Y-m-d h:i',$data['dateline']);
	  	$cplogs[] = $data;
	}
	$excel->addArray($cplogs);
	$excel->generateXML(random(10));
	exit();
}else{
	if ($delete && $isfounder){
		$db->query("DELETE FROM sdw_adminlog WHERE id IN ($delete)");
	}
	cpheader();
	$pagesize = 20;
	$cplogs = array();
	$sqladd = "WHERE a.body LIKE '%$keywords%'";
	$sqladd.= $adminid ? " AND a.uid='uid'" : "";
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_adminlog a LEFT JOIN sdw_members b ON b.uid=a.uid $sqladd");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$page = min(array($page,$pagecount));
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT a.id,a.uid,a.body,a.dateline,a.ipaddr,a.requesturi,b.username FROM sdw_adminlog a LEFT JOIN sdw_members b ON b.uid=a.uid $sqladd ORDER BY a.id DESC LIMIT $start_limit,$pagesize");
	while($data = $db->fetch_array($query)){
		$data['dateline'] = date('Y-m-d h:i',$data['dateline']);
	  	$cplogs[] = $data;
	}
	$pagelink = adminpage($page,$pagecount,"adminid=$adminid&keywords=$keywords");
	$querystring = "adminid=$adminid&keywords=$keywords&page=$page";
	include template('admin_cplog');
}
?>