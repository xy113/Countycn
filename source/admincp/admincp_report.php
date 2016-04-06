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
 * $ID: admincp_report.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($delete){
	$db->query("DELETE FROM sdw_report WHERE id IN (".implodeids($delete).")");
	cpmessage('drop_success');
}else {
	$pagesize = 20;
	$messages = array();
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_report");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT a.*,t.title FROM sdw_report a LEFT JOIN sdw_threads t ON t.tid=a.tid ORDER BY a.id DESC LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$data['typename'] = $lang['report_type'][$data['type']];
		$data['dateline'] = date('Y-m-d H:i');
		$messages[] = $data;
	}
	include template('admin_report');
}
?>