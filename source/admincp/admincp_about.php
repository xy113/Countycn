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
 * $ID:admincp_about.php
**/
if (!defined('IN_XSCMS')||!defined('IN_ADMINCP'))die('Access Denied!');
cpheader();
if ($operation == 'add'){
	if ($submit){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			$articlenew['author'] = $admincp['admin'];
			$articlenew['authorid'] = $admincp['adminid'];
			$articlenew['dateline'] = $timestamp;
			$db->insert('sdw_about',$articlenew);
			cpmessage('save_success','succeed',$BASESCRIPT.'?action=about');
		}
	}else {
		$fckeditor = FCK('articlenew[content]');
	}
}elseif ($operation == 'edit'){
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			$articlenew['author'] = $admincp['admin'];
			$articlenew['authorid'] = $admincp['adminid'];
			$articlenew['dateline'] = $timestamp;
			$db->update('sdw_about',$articlenew,"id='$id'");
			cpmessage('modi_success');
		}
	}else {
		$article = $db->GetOne("SELECT * FROM sdw_about WHERE id='$id'");
		$fckeditor = FCK('articlenew[content]',$article['content']);
	}
}else {
	if ($submit == 'yes'){
		if (!($formhash == FORMHASH)){
			cpmessage('undefined_action','error');
		}else {
			if ($delete){
				$db->query("DELETE FROM sdw_about WHERE id IN (".implodeids($delete).")");
				cpmessage('drop_success');
			}else {
				cpmessage('no_select','error');
			}
		}
	}else {
		$pagesize = 20;
		$articles = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_about");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT id,title,author,dateline FROM sdw_about ORDER BY id ASC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$articles[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_about');
?>