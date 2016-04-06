<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-07
 * $ID: search.php
*/ 
require_once './source/include/common.inc.php';
$keyarr = array();
$keywords = str_replace(array("\t",",","，"),array('|','|','|'),$keywords);
foreach (explode('|',$keywords) as $key=>$value){
	$keyarr[] = "(t.title LIKE '%$value%')";
}
$sqladd = !empty($keyarr) ? "WHERE (".implode(' OR ',$keyarr).")" : "WHERE t.title LIKE '%$keywords%'";
if ($city){
	@include ROOT_PATH.'/data/cache/city_'.$city.'.php';
	@extract($citydata);
	$sqladd.= " AND t.cityid='$citydata[cityid]'";
}
if ($cid){
	$sqladd.= " AND t.cid='$cid'";
}
if ($streetid){
	$sqladd.= " AND t.streetid='$streetid'";
}
if ($areaid){
	$sqladd.= " AND t.areaid='$areaid'";
}
if ($time){
	$sqladd.= " AND t.dateline>'".($timestamp-($time*86400))."'";
}
$catdata = $db->GetOne("SELECT * FROM sdw_category  WHERE cid='$cid'");
$pagesize = 30;
$threads = array();
$data = $db->GetOne("SELECT COUNT(*) FROM sdw_threads t LEFT JOIN sdw_area a ON a.areaid=t.areaid $sqladd");
$totalrecords = $data['COUNT(*)'];
$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
$start_limit = ($page-1) * $pagesize;
$query = $db->query("SELECT t.tid,t.cityid,t.areaid,t.title,t.views,t.dateline,c.cname,c.pinyin,a.areaname FROM sdw_threads t LEFT JOIN sdw_category c ON c.cid=t.cid
LEFT JOIN sdw_area a ON a.areaid=t.areaid $sqladd ORDER BY t.tid DESC LIMIT $start_limit,$pagesize");
while ($threaddata = $db->fetch_array($query)){
	if (($timestamp-$threaddata['dateline'])<60){
		$threaddata['pbtime'] = ($timestamp-$threaddata['dateline'])."秒钟前";
	}elseif (($timestamp-$threaddata['dateline'])<3600){
		$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/60)."分钟前";
	}elseif (($timestamp-$threaddata['dateline'])<3600*24){
		$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/3600)."小时前";
	}else {
		$threaddata['pbtime'] = floor(($timestamp-$threaddata['dateline'])/(3600*24))."天前";
	}
	$threaddata['areaname'] = $citydata['area'][$threaddata['areaid']]['areaname'];
	$threads[] = $threaddata;
}
$pagelink = pagination($page,$pagecount,"city=$city&cid=$cid&streetid=$streetid&areaid=$areaid&time=$time&keywords=$keywords");
include template('search');
?>