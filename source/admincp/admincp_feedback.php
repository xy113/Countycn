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
 * $ID: admincp_feedback.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'view'){
	$feedback = $db->GetOne("SELECT * FROM sdw_feedback WHERE id='$id'");
}else {
	if ($delete){
		$db->query("DELETE FROM sdw_feedback WHERE id IN (".implodeids($delete).")");
		cpmessage('drop_success');
	}else {
		$messages = array();
		$pagesize = 20;
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_feedback");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT id,subject,username,email,tel,dateline FROM sdw_feedback ORDER BY id DESC LIMIT $limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$messages[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_feedback');
?>