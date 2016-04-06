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
 * $ID: admincp_stat.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
!$year && $year = date('Y',$timestamp);
if ($operation == 'export'){
	$cities[0] = array('分站名称','十二月','十一月','十月','九月','八月','七月','六月','五月','四月','三月','二月','一月');
	$query = $db->query("SELECT cityid,cityname FROM sdw_city ORDER BY displayorder,cityid");
	while ($data = $db->fetch_array($query)){
		$data['month1'] = getcounts($data['cityid'],mktime(0,0,0,1,1,$year),mktime(0,0,0,2,1,$year));
		$data['month2'] = getcounts($data['cityid'],mktime(0,0,0,2,1,$year),mktime(0,0,0,3,1,$year));
		$data['month3'] = getcounts($data['cityid'],mktime(0,0,0,3,1,$year),mktime(0,0,0,4,1,$year));
		$data['month4'] = getcounts($data['cityid'],mktime(0,0,0,4,1,$year),mktime(0,0,0,5,1,$year));
		$data['month5'] = getcounts($data['cityid'],mktime(0,0,0,5,1,$year),mktime(0,0,0,6,1,$year));
		$data['month6'] = getcounts($data['cityid'],mktime(0,0,0,6,1,$year),mktime(0,0,0,7,1,$year));
		$data['month7'] = getcounts($data['cityid'],mktime(0,0,0,7,1,$year),mktime(0,0,0,8,1,$year));
		$data['month8'] = getcounts($data['cityid'],mktime(0,0,0,8,1,$year),mktime(0,0,0,9,1,$year));
		$data['month9'] = getcounts($data['cityid'],mktime(0,0,0,9,1,$year),mktime(0,0,0,10,1,$year));
		$data['month10'] = getcounts($data['cityid'],mktime(0,0,0,10,1,$year),mktime(0,0,0,11,1,$year));
		$data['month11'] = getcounts($data['cityid'],mktime(0,0,0,11,1,$year),mktime(0,0,0,12,1,$year));
		$data['month12'] = getcounts($data['cityid'],mktime(0,0,0,12,1,$year),mktime(0,0,0,1,1,($year+1)));
		$cities[] = array($data['cityname'],$data['month12'],$data['month11'],$data['month10'],$data['month9'],
		$data['month8'],$data['month7'],$data['month6'],$data['month5'],$data['month4'],$data['month3'],$data['month2'],$data['month1']);
	}
	include ROOT_PATH.'/source/class/class.csv.php';
	$csv = new Csv();
	$csv->addData($cities);
	$csv->getCsv(random(10));
	exit();
}else {
	cpheader();
	$pagesize = 20;
	$cities = array();
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_city");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT cityid,cityname FROM sdw_city ORDER BY displayorder,cityid LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$data['month1'] = getcounts($data['cityid'],mktime(0,0,0,1,1,$year),mktime(0,0,0,2,1,$year));
		$data['month2'] = getcounts($data['cityid'],mktime(0,0,0,2,1,$year),mktime(0,0,0,3,1,$year));
		$data['month3'] = getcounts($data['cityid'],mktime(0,0,0,3,1,$year),mktime(0,0,0,4,1,$year));
		$data['month4'] = getcounts($data['cityid'],mktime(0,0,0,4,1,$year),mktime(0,0,0,5,1,$year));
		$data['month5'] = getcounts($data['cityid'],mktime(0,0,0,5,1,$year),mktime(0,0,0,6,1,$year));
		$data['month6'] = getcounts($data['cityid'],mktime(0,0,0,6,1,$year),mktime(0,0,0,7,1,$year));
		$data['month7'] = getcounts($data['cityid'],mktime(0,0,0,7,1,$year),mktime(0,0,0,8,1,$year));
		$data['month8'] = getcounts($data['cityid'],mktime(0,0,0,8,1,$year),mktime(0,0,0,9,1,$year));
		$data['month9'] = getcounts($data['cityid'],mktime(0,0,0,9,1,$year),mktime(0,0,0,10,1,$year));
		$data['month10'] = getcounts($data['cityid'],mktime(0,0,0,10,1,$year),mktime(0,0,0,11,1,$year));
		$data['month11'] = getcounts($data['cityid'],mktime(0,0,0,11,1,$year),mktime(0,0,0,12,1,$year));
		$data['month12'] = getcounts($data['cityid'],mktime(0,0,0,12,1,$year),mktime(0,0,0,1,1,($year+1)));
		$cities[] = $data;
	}
	$pagelink = adminpage($page,$pagecount,"year=$year");
	include template('admin_stat');
}
function getcounts($cityid,$min,$max){
	$data = $GLOBALS['db']->GetOne("SELECT COUNT(*) AS num FROM sdw_threads WHERE cityid='$cityid' AND (dateline>$min) and (dateline<$max)");
	return $data['num'];
}
?>