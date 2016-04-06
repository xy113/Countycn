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
 * $ID: admincp_faq.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'add'){
	if ($submit){
		$article['author'] = $admin->admincp['admin'];
		$article['authorid'] = $admin->adminid;
		$db->insert('sdw_faq',$article);
		cpmessage('save_success','succeed',$BASESCRIPT.'?action=faq');
	}else {
		$fckeditor = FCK('article[body]');
	}
}elseif ($operation == 'edit'){
	if ($submit){
		$db->update('sdw_faq',$article,"id=$id");
		cpmessage('modi_success');
	}else {
		$article = $db->GetOne("SELECT * FROM sdw_faq WHERE id='$id'");
		$fckeditor = FCK('article[body]',$article['body']);
	}
}else {
	if ($submit){
		if ($delete){
			$db->query("DELETE FROM sdw_faq WHERE id IN (".implodeids($delete).")");
		}
		if ($article){
			foreach ($article as $id=>$faq){
				$db->update('sdw_faq',$faq,"id=$id");
			}
		}
		cpmessage('modi_success');
	}else{
		$pagesize = 20;
		$articles = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_faq");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT id,title,displayorder,keywords FROM sdw_faq ORDER BY displayorder LIMIT $limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$articles[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_faq');
?>