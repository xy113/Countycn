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
 * $ID: admincp_runlog.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
cpheader();
$pagesize = 50;
$cplogs = array();
$data = $db->GetOne("SELECT COUNT(*) FROM sdw_adminlog a LEFT JOIN sdw_members b ON b.uid=a.uid");
$totalrecords = $data['COUNT(*)'];
$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
$page = min(array($page,$pagecount));
$start_limit = ($page-1) * $pagesize;
$query = $db->query("SELECT a.id,a.uid,a.body,a.dateline,a.ipaddr,a.requesturi,b.username FROM sdw_adminlog a LEFT JOIN sdw_members b ON b.uid=a.uid ORDER BY a.id DESC LIMIT $start_limit,$pagesize");
while($data = $db->fetch_array($query)){
	$data['dateline'] = date('Y-m-d h:i',$data['dateline']);
	$cplogs[] = $data;
}
$pagelink = adminpage($page,$pagecount);
include template('admin_runlog');
?>