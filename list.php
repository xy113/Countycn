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
 * $ID: list.php
*/ 
require_once './source/include/common.inc.php';
if (!$city || !$category){
	header('location:index.php');
}else {
	if (!(@include ROOT_PATH."/data/cache/city_$city.php")){
		updatecitycache($city);
		@include ROOT_PATH."/data/cache/city_$city.php";
	}
	@extract($citydata);
	@include ROOT_PATH.'/data/cache/category2.php';
	@extract($categories);
	$catdata = $categories[$category];
	$sqladd = $catid = '';
	$threads = $typeoptions = $cid = $allow_key = $allow_ids = array();
	$pagesize = $pagesize ? $pagesize : 30;
	$querystring = "category=$category&areaid=$areaid&streetid=$streetid&time=$time";
	$query = $db->query("SELECT cid FROM sdw_category WHERE cid='$catdata[cid]' OR fid='$catdata[cid]'");
	while ($data = $db->fetch_array($query)){
		$cid[] = $data['cid'];
	}
	if ($areaid) {
		$sqladd.= " AND t.areaid=$areaid";
	}
	if ($streetid){
		$sqladd.= " AND t.streetid=$streetid";
	}
	if ($time){
		$sqladd.= " AND t.dateline>".($timestamp-(86400*(intval($time))));
	}
	$catid = implodeids($cid);
	@include ROOT_PATH.'/data/cache/threadtypes.php';
	$query = $db->query("SELECT a.optionid,o.identifier,o.title,o.type,o.rules FROM sdw_typevars a LEFT JOIN sdw_typeoptions o 
	ON o.optionid=a.optionid WHERE a.search='1' AND a.typeid='$catdata[typeid]' ORDER BY a.displayorder");
	while ($data = $db->fetch_array($query)){
		$data['rules'] = unserialize($data['rules']);
		$data['choices'] = fetchoptions($data['type'],$data['rules']['choices']);
		$allow_key[] = $data['identifier'];
		$allow_ids[$data['identifier']] = $data['optionid'];
		$typeoptions[] = $data;
	}
	foreach ($_GET as $key=>$val){
		if (in_array($key,$allow_key)){
			$extra[] = "(b.optionid='$allow_ids[$key]' AND b.value='$val')";
			$querystring.= "&$key=$val";
		}
	}
	$sqladd.= !empty($extra) ? ' AND ('.implode(' AND ',$extra).')' : '';
	$sql = "SELECT t.tid FROM sdw_threads t LEFT JOIN sdw_typeoptionvars b ON b.tid=t.tid WHERE t.cityid='$citydata[cityid]' AND (t.cid IN($catid)) $sqladd GROUP BY t.tid";
	$totalrecords = $db->num_rows($db->query($sql));
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT t.tid,t.cid,t.cityid,t.areaid,t.streetid,t.title,t.dateline,COUNT(b.optionid) AS oid FROM sdw_threads t 
	LEFT JOIN sdw_typeoptionvars b ON b.tid=t.tid WHERE t.cityid='$citydata[cityid]' AND (t.cid IN($catid)) $sqladd GROUP BY t.tid ORDER BY t.tid DESC LIMIT $limit,$pagesize");
	while ($threaddata = $db->fetch_array($query)){
		if (($timestamp-$threaddata['dateline'])<60){
			$threaddata['pbtime'] = ($timestamp-$threaddata['dateline'])."秒钟前";
		}elseif (($timestamp-$threaddata['dateline'])<3600){
			$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/60)."分钟前";
		}elseif (($timestamp-$threaddata['dateline'])<3600*24){
			$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/3600)."小时前";
		}else {
			//$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/(3600*24))."天前";
			$threaddata['pbtime'] = date('Y-m-d',$threaddata['dateline']);
		}
		$threaddata['areaname'] = $citydata['area'][$threaddata['areaid']]['areaname'];
		$threads[] = $threaddata;
	}
	$pagelink = pagination($page,$pagecount,"$querystring","$BASESCRIPT");
}
include template('list');
?>