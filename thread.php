<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-27
 * $ID: thread.php
*/ 
require_once './source/include/common.inc.php';
if ($tid){
	$thread = $category = $threadoptions = array();	
	$db->query("UPDATE sdw_threads SET views=views+1 WHERE tid='$tid'");
	$thread = $db->GetOne("SELECT t.*,a.areaname,s.streetname FROM sdw_threads t LEFT JOIN sdw_area a ON a.areaid=t.areaid 
	LEFT JOIN sdw_street s ON s.streetid=t.streetid WHERE t.tid='$tid'");
	$thread['pbtime'] = date('Y-m-d H:i',$thread['dateline']);
	$thread['postno'] = date('YmdHis',$thread['dateline']).$tid;
	$thread['description'] = stripHtml($thread['body']);
	$thread['body'] = nl2br($thread['body']);
	$citydata = $CACHE['cities'][$thread['cityid']];
	$catdata = $CACHE['categories'][$thread['cid']];
	@include ROOT_PATH.'/data/cache/typeoptions.php';
	$query = $db->query("SELECT a.optionid,a.value,b.title,b.type FROM sdw_typeoptionvars a LEFT JOIN sdw_typeoptions b ON b.optionid=a.optionid WHERE a.tid='$tid' AND a.value<>'' ORDER BY a.typeid");
	while ($data = $db->fetch_array($query)){
		$data['value'] = fetchoptionvalue($data['optionid'],$data['type'],$data['value']);
		$threadoptions[] = $data;
	}
	include template('thread');
}
?>