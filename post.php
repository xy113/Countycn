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
 * $ID: post.php
*/
require_once './source/include/common.inc.php';
//$city = 'px';
if (!$city && !$cityid){
	header("location:$config[siteurl]");
	exit();
}elseif (!$cid){
	include template('selectcat');
}else {
	if ($formhash && ($formhash == FORMHASH)){
		if (!($_POST[$_SESSION['validate']] == $_SESSION['validatecode'])){
			showalert('非法操作，请返回。',$_SERVER['HTTP_REFERER']);
			exit();
		}
		/*
		$refarray = explode('/',$_SERVER['HTTP_REFERER']);
		$arr = explode('.',$refarray[2]);
		if (!$_SERVER['HTTP_REFERER'] || !($arr[1].'.'.$arr[2]==$config['domain'])){
			showalert('非法操作，请返回。',$_SERVER['HTTP_REFERER']);
			exit();
		}*/
		if (!$randcode || ($randcode != $_SESSION['randcode'])){
			showalert('验证码错误，请重新输入。',$_SERVER['HTTP_REFERER']);
			exit();
		}
		if (!$cityid || !$cid){
			showalert('非法操作，请返回。',$_SERVER['HTTP_REFERER']);
			exit();
		}
		$tid = $db->insert('sdw_threads',array(
		'title'=>$title,'cid'=>$cid,'cityid'=>$cityid,'areaid'=>$areaid,
		'streetid'=>$streetid,'body'=>$body,'tel'=>$tel,'userim'=>$userim,'contactto'=>$contactto,
		'password'=>md5(md5($password)),'author'=>$_XCOOKIE['username'] ? $_XCOOKIE['username'] : 'none',
		'authorid'=>$_XCOOKIE['uid'] ? $_XCOOKIE['uid'] : 0,'dateline'=>$timestamp,'starttime'=>$timestamp,
		'ip'=>$ipaddr,'ip2'=>convertip($ipaddr)
		),TRUE);
		if ($_XCOOKIE['uid']) $db->query("UPDATE sdw_members SET posts=posts+1,lastpost='$title' WHERE uid='$_XCOOKIE[uid]'");
		foreach ($typeoption as $key=>$option){
			$value = is_array($option) ? implode(',',$option) : $option;
			$db->insert('sdw_typeoptionvars',array('tid'=>$tid,'optionid'=>fetchoptionid($key),'value'=>$value));
		}
		
		//$db->insert('stat',array('get'=>serialize($_GET),'post'=>serialize($_POST),'referer'=>$_SERVER['HTTP_REFERER'],
		//'ip'=>$ipaddr,'ip2'=>convertip($ipaddr),'randcode'=>$_SESSION['randcode'],'hashcode'=>$_POST[$_SESSION['validate']],'formhash'=>FORMHASH));
		unset($_SESSION['validate'],$_SESSION['validatecode']);
		showmessage('信息已发布成功',0,array(
		array('text'=>'浏览信息页面','href'=>'http://'.site().'/thread.php?tid='.$tid),
		array('text'=>'注册成为'.$config['sitename'].'会员','href'=>$config['siteurl'].'/register.php')
		));
	}else {
		if ($city){
			if (!(@include ROOT_PATH."/data/cache/city_$city.php")){
				updatecitycache($city);
				@include ROOT_PATH."/data/cache/city_$city.php";
			}
			@extract($citydata);
		}elseif ($cityid){
			$data = $db->GetOne("SELECT cityhost FROM sdw_city WHERE cityid='$cityid'");
			if (!(@include ROOT_PATH."/data/cache/city_$data[cityhost].php")){
				updatecitycache($data[cityhost]);
				@include ROOT_PATH."/data/cache/city_$data[cityhost].php";
			}
			@extract($citydata);
		}
		$query = $db->query("SELECT * FROM sdw_street s LEFT JOIN sdw_area a ON a.areaid=s.areaid WHERE a.cityid='$citydata[cityid]'");
		while ($data = $db->fetch_array($query)){
			$streets[$data['areaid']][] = $data;
		}
		$category = $db->GetOne("SELECT * FROM sdw_category WHERE cid='$cid'");
		$query = $db->query("SELECT a.*,b.title,b.identifier,b.type,b.rules FROM sdw_typevars a LEFT JOIN 
		sdw_typeoptions b ON b.optionid=a.optionid WHERE a.typeid='$category[typeid]' ORDER BY a.displayorder ASC");
		while ($data = $db->fetch_array($query)){
			$data['html'] = fetchoptionhtml($data['type'],$data['identifier'],unserialize($data['rules']));
			$typeoptions[] = $data;
		}
		$_SESSION['validate'] = random(6);
		$_SESSION['validatecode'] = random(16);
		include template('post');
	}
}
?>