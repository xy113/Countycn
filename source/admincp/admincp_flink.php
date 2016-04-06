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
 * $ID: admincp_flink.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'edit'){
	if ($submit){
		$db->update('sdw_friendlink',$flink,"siteid='$siteid'");
		cpmessage('modi_success');
	}else {
		$flink = $db->GetOne("SELECT * FROM sdw_friendlink WHERE siteid='$siteid'");
	}
}else {
	if ($submit){
		if ($delete){
			$db->query("DELETE FROM sdw_friendlink WHERE siteid IN (".implodeids($delete).")");
		}
		if ($flink){
			foreach ($flink as $siteid=>$site){
				$db->update('sdw_friendlink',$site,"siteid=$siteid");
			}
		}
		if ($newsitename){
			foreach ($newsitename as $key=>$sitename){
				if ($sitename){
					$db->insert('sdw_friendlink',array(
					'sitename'=>$sitename,'siteurl'=>$newsiteurl[$key],
					'displayorder'=>$neworder[$key],'display'=>$newdisplay[$key]
					));
				}
			}
		}
		cpmessage('modi_success');
	}else {
		$pagesize = 20;
		$flinks = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_friendlink");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$limit = ($page-1)*$pagesize;
		$query = $db->query("SELECT siteid,sitename,siteurl,displayorder,display FROM sdw_friendlink ORDER BY displayorder LIMIT $limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$flinks[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_flink');
?>