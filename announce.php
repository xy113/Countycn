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
 * $ID: announce.php
*/ 
require_once './source/include/common.inc.php';
$pagesize = 10;
$articles = array();
$data = $db->GetOne("SELECT COUNT(*) FROM sdw_announcement");
$totalrecords = $data['COUNT(*)'];
$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
$start_limit = ($page-1) * $pagesize;
$query = $db->query("SELECT * FROM sdw_announcement ORDER BY id DESC LIMIT $start_limit,$pagesize");
while ($data = $db->fetch_array($query)){
	$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
	$articles[] = $data;
}
$pagelink = pagination($page,$pagecount,'',$BASESCRIPT);
include template('announce');
?>