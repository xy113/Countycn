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
 * $ID: login.php
*/ 
require_once './source/include/common.inc.php';
if ($action == 'chklogin'){
	if (!($formhash == FORMHASH)){
		showmessage('未定义操作',1,array(array('text'=>'返回上一页','href'=>$_SERVER['HTTP_REFERER'])));
	}else {
		$data = $db->GetOne("SELECT uid,username,password,random FROM sdw_members WHERE username='$username'");
		if (!$data){
			showalert('用户不存在',$_SERVER['HTTP_REFERER']);
		}elseif (!($data['password']==md5(md5($password).md5($data['random'])))){
			showalert('密码错误',$_SERVER['HTTP_REFERER']);
		}else {
			$db->query("UPDATE sdw_members SET lastvisit='$timestamp',lastip='$ipaddr',credits=credits+5 WHERE uid='$data[uid]'");
			xsetcookie('uid',$data['uid']);
			xsetcookie('username',$data['username']);
			xsetcookie('password',$data['password']);
			showmessage("登录成功",0,array(
			array('text'=>'发布免费信息','href'=>'post.php'),
			array('text'=>'进入个人中心完善个人资料','href'=>'profile.php'),
			array('text'=>'<<返回登录前的页面','href'=>$next)
			));
		}
	}
}elseif ($action == 'logout'){
	xsetcookie('uid','');
	xsetcookie('username','');
	xsetcookie('password','');
	header("location:$next");
}
include template('login');
?>