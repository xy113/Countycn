<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-19
 * $ID: admincp_announce.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'add'){
	if ($submit){
		$article['author'] = $admin->admincp['admin'];
		$article['authorid'] = $admin->adminid;
		$article['dateline'] = $timestamp;
		$db->insert('sdw_announcement',$article);
		cpmessage('save_success','succeed',$BASESCRIPT.'?action=announce');
	}
}elseif ($operation == 'edit'){
	if ($submit){
		$db->update('sdw_announcement',$article,'id='.intval($id));
		cpmessage('modi_success',0,array(array($lang['back_list'],$BASESCRIPT.'?action=announce')));
	}else {
		$article = $db->GetOne("SELECT * FROM sdw_announcement WHERE id=".intval($id));
	}
	
}else {
	if ($delete){
		$db->query("DELETE FROM sdw_announcement WHERE id IN (".implodeids($delete).")");
		cpmessage('drop_success');
	}else {
		$pagesize = 20;
		$articles = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_announcement");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT id,title,poster,dateline FROM sdw_announcement ORDER BY id DESC LIMIT $limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['dateline'] = date('Y-m-d H:i',$data['dateline']);
			$articles[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_announce');
?>