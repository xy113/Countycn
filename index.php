<?php
require_once './source/include/common.inc.php';
if ($city){
	@include ROOT_PATH.'/data/cache/city2.php';
	@extract($cities);
	$citydata = $cities[$city];
	$threads = array();
	$query = $db->query("SELECT t.tid,t.cid,t.cityid,t.areaid,t.title,t.dateline,a.areaname,c.pinyin FROM sdw_threads t 
	LEFT JOIN sdw_area a ON a.areaid=t.areaid LEFT JOIN sdw_category c ON c.cid=t.cid WHERE t.cityid='$citydata[cityid]' ORDER BY t.tid DESC LIMIT 0,30");
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
		$threads[] = $threaddata;
	}
	include template('index');
}else {
	if ($keywords){
		$data = $db->GetOne("SELECT cityhost FROM sdw_city WHERE cityhost='$keywords' OR cityname='$keywords' OR citypy='$keywords' OR cityid='$keywords' LIMIT 0,1");
		if ($data['cityhost']){
			header('location:http://'.$data['cityhost'].'.'.$config['domain']);
		}else {
			header('location:index.php');
		}
	}else {
		$letters = array('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','W','X','Y','Z');
		if (!(@include ROOT_PATH.'/data/city.js')){
			updatecache('cityis');
		}
		$flinks = array();
		$query = $db->query("SELECT siteid,siteurl,sitename,description FROM sdw_friendlink WHERE display='1' ORDER BY displayorder,siteid");
		while ($data = $db->fetch_array($query)){
			$flinks[] = $data;
		}
		include template('city');
	}
}
?>