<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-04-11
 * $Id: function.cache.php
*/ 
if (!defined('IN_XSCMS')){die('Access Denied!');}
function updatecache($cachename = ''){
	global $db,$CACHE;
	if (!$cachename || $cachename == 'settings'){
		$cachedata = "";
		$query = $db->query("SELECT skey,svalue FROM sdw_settings");
		while(list($key,$value) = $db->fetch_row($query)){
			if ($key == 'randcodestatus') $value = unserialize($value);
			if (is_array($value)){
				$cachedata.= "\$config['$key'] = ".arrayeval($value).";\n";
			}else {
				$cachedata.= "\$config['$key'] = '$value';\n";
			}
		}
		writetocache('settings',$cachedata);
	}
	if (!$cachename || $cachename == 'usergroups'){
		$query = $db->query("SELECT * FROM sdw_usergroups ORDER BY groupid ASC");
		while ($data = $db->fetch_array($query)){
			$groups[] = "'$data[groupid]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['usergroups'] = array(\n".implode(",\n",$groups)."\n);";
		writetocache('usergroups',$cachedata);
	}
	if (!$cachename || $cachename == 'admingroups'){
		$query = $db->query("SELECT a.*,b.groupname,b.type FROM sdw_admingroups a LEFT JOIN sdw_usergroups b ON b.groupid=a.admingid ORDER BY admingid ASC");
		while ($data = $db->fetch_array($query)){
			$admingroups[] = "'$data[admingid]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['admingroups'] = array(\n".implode(",\n",$admingroups)."\n);";
		writetocache('admingroups',$cachedata);
	}
	if (!$cachename || $cachename == 'category'){
		$query = $db->query("SELECT * FROM sdw_category ORDER BY displayorder ASC,cid ASC");
		while ($data = $db->fetch_array($query)){
			$category[] = "'$data[cid]'=>".arrayeval($data);
			$category2[] = "'$data[pinyin]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['categories'] = array(\n".implode(",\n",$category)."\n);";
		writetocache('category',$cachedata);
		writetocache('category2',"\$categories = array(\n".implode(",\n",$category2)."\n);");
	}
	if (!$cachename || $cachename == 'province'){
		$query = $db->query("SELECT provinceid,provincename,provincepy,displayorder FROM sdw_province ORDER BY provinceid ASC");
		while ($data = $db->fetch_array($query)){
			$province[] = "'$data[provinceid]'=>".arrayeval($data);
		}
		$cachedata= "\$CACHE['province'] = array(\n".implode(",\n",$province)."\n);";
		writetocache('province',$cachedata);
	}
	if (!$cachename || $cachename == 'city'){
		$query = $db->query("SELECT * FROM sdw_city ORDER BY cityid ASC");
		while ($data = $db->fetch_array($query)){
			$data['cityletter'] = strtoupper($data['cityletter']);
			$city[] = "'$data[cityid]'=>".arrayeval($data);
			$city2[] = "'$data[cityhost]'=>".arrayeval($data);
		}
		writetocache('city',"\$CACHE['cities'] = array(\n".implode(",\n",$city)."\n);");
		writetocache('city2',"\$cities = array(\n".implode(",\n",$city2)."\n);");
	}
	if (!$cachename || $cachename == 'cityjs'){
		$provinces = $cities = $citydata = array();
		$query = $db->query("SELECT cityid,provinceid,cityname,cityhost FROM sdw_city ORDER BY cityid");
		while ($data = $db->fetch_array($query)){
			$citydata[$data[provinceid]][] = "'$data[cityhost]':'$data[cityname]'";
		}
		$query = $db->query("SELECT provinceid,provincename FROM sdw_province ORDER BY provinceid");
		while ($data = $db->fetch_array($query)){
			$provinces[] = "'$data[provinceid]':'$data[provincename]'";
			$cities[] = "'$data[provinceid]':{".implode(',',!empty($citydata[$data[provinceid]]) ? $citydata[$data[provinceid]] : array())."}";
		}
		$cachedata = "var province={".implode(',',$provinces)."}\n";
		$cachedata.= "var city={".implode(',',$cities)."}";
		writetojscache('city',$cachedata);
	}
	if (!$cachename || $cachename == 'contactus'){
		$query = $db->query("SELECT * FROM sdw_contactus ORDER BY id ASC");
		while ($data = $db->fetch_array($query)){
			$contact[] = "'$data[id]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['contactus'] = array(\n".implode(",\n",$contact)."\n);";
		writetocache('contactus',$cachedata);
	}
	if (!$cachename || $cachename == 'threadtypes'){
		$query = $db->query("SELECT * FROM sdw_threadtypes ORDER BY typeid ASC");
		while ($data = $db->fetch_array($query)){
			$threadtypes[] = "'$data[typeid]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['threadtypes'] = array(\n".implode(',',$threadtypes)."\n);";
		writetocache('threadtypes',$cachedata);
	}
	if (!$cachename || $cachename == 'typeoptions'){
		$query = $db->query("SELECT * FROM sdw_typeoptions ORDER BY displayorder ASC,optionid ASC");
		while ($data = $db->fetch_array($query)){
			$data['rules'] = unserialize($data['rules']);
			$options[] = "'$data[optionid]'=>".arrayeval($data);
		}
		$cachedata = "\$CACHE['typeoptions'] = array(\n".implode(',',$options)."\n);";
		writetocache('typeoptions',$cachedata);
	}
}
function updatecitycache($city){
	global $db;
	$data = $db->GetOne("SELECT * FROM sdw_city WHERE cityhost='$city' OR cityid='$city' LIMIT 1");
	$query = $db->query("SELECT areaid,areaname FROM sdw_area WHERE cityid='$data[cityid]' ORDER BY displayorder,areaid");
	while ($result = $db->fetch_array($query)){
		$area[$result['areaid']] = $result;
	}
	$data['area'] = $area;
	writetocache('city_'.$data['cityhost'],"\$citydata=".arrayeval($data));
}
function writetocache($script,$cachedata = '') {
	$dir = ROOT_PATH.'/data/cache/';
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if($fp = @fopen("$dir$script.php", 'wb')) {
		fwrite($fp, "<?php\n//Xcms! cache file, DO NOT modify me!".
			"\n//Created: ".date("M j, Y, G:i").
			"\n//Identify: ".md5($script.'.php'.$cachedata.$GLOBALS['config']['authkey'])."\n\n$cachedata\n?>");
		fclose($fp);
	} else {
		exit('Can not write to cache files, please check directory ./data/ and ./data/cache/ .');
	}
}
function writetojscache($script,$cachedata = '') {
	$dir = ROOT_PATH.'/data/cache/';
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if($fp = @fopen("$dir$script.js", 'wb')) {
		fwrite($fp, "//Xcms! cache file, DO NOT modify me!".
			"\n//Created: ".date("M j, Y, G:i").
			"\n//Identify: ".md5($script.'.php'.$cachedata.$GLOBALS['config']['authkey'])."\n\n$cachedata");
		fclose($fp);
	} else {
		exit('Can not write to cache files, please check directory ./data/ and ./data/cache/ .');
	}
}
function arrayeval($array, $level = 0) {
	if(!is_array($array)) {
		return "'".$array."'";
	}
	if(is_array($array) && function_exists('var_export')) {
		return var_export($array, true);
	}

	$space = '';
	for($i = 0; $i <= $level; $i++) {
		$space .= "\t";
	}
	$evaluate = "Array\n$space(\n";
	$comma = $space;
	if(is_array($array)) {
		foreach($array as $key => $val) {
			$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
			$val = !is_array($val) && (!preg_match("/^\-?[1-9]\d*$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;
			if(is_array($val)) {
				$evaluate .= "$comma$key => ".arrayeval($val, $level + 1);
			} else {
				$evaluate .= "$comma$key => $val";
			}
			$comma = ",\n$space";
		}
	}
	$evaluate .= "\n$space)";
	return $evaluate;
}
?>