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
 * $ID: admincp_category.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadmincategory')) die('Access Denied!');
cpheader();
if ($operation == 'edit'){
	if ($submit){
		$db->update('sdw_category',$newcat,"cid=$cid");
		updatecache('category');
		cpmessage('modi_success');
	}else {
		$category = $db->GetOne("SELECT * FROM sdw_category WHERE cid='$cid'");
		include ROOT_PATH.'/data/cache/threadtypes.php';
		include template('admin_editcat');
	}
}elseif ($operation == 'delete'){
	if ($formhash && ($formhash == FORMHASH)){
		if ($cid){
			$query = $db->query("SELECT cid,cname FROM sdw_category WHERE cid='$cid' OR fid='$cid'");
			while ($data = $db->fetch_array($query)){			
				$db->query("DELETE FROM sdw_threads WHERE cid='$data[cid]'");
				$db->query("DELETE FROM sdw_category WHERE cid='$data[cid]'");
				$admin->cplog($cplang['category_log_drop'].$data['cname']);
			}
			updatecache('category');
		}
		cpmessage('drop_success','succeed',$BASESCRIPT.'?action=category');
	}else {
		cpmessage('drop_confirm','form',$BASESCRIPT.'?action=category&operation=delete&cid='.$cid,'category_drop_notice');
	}
}elseif ($operation == 'merger'){
	if ($submit){
		if ($source){
			$db->query("UPDATE sdw_threads SET cid='$target' WHERE cid IN (".implodeids($source).")");
			$db->query("DELETE FROM sdw_category WHERE cid IN (".implodeids($source).") AND cid<>$target");
			updatecache('category');
		}
		cpmessage('category_merger_success');
	}else {
		$categories = array();
		$query = $db->query("SELECT * FROM sdw_category ORDER BY displayorder ASC,cid ASC");
		while ($data = $db->fetch_array($query)){
			$categories[$data['fid']][] = $data;
		}
		include template('admin_mergercat');
	}
}else {
	if ($submit){
		if ($newcname){
			foreach ($newcname as $key=>$cname){
				$db->insert('sdw_category',array('fid'=>$newfid[$key],'cname'=>$cname,
				'pinyin'=>$newpinyin[$key],'displayorder'=>$neworder[$key]));
			}
		}
		if ($newcat){
			foreach ($newcat as $cid=>$category){
				$db->update('sdw_category',$category,"cid=$cid");
			}
		}
		updatecache('category');
		cpmessage('modi_success');
	}else {
		$categories = array();
		$query = $db->query("SELECT * FROM sdw_category ORDER BY displayorder ASC,cid ASC");
		while ($data = $db->fetch_array($query)){
			$categories[$data['fid']][] = $data;
		}
		include template('admin_category');
	}
}
?>