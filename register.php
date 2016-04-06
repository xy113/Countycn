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
 * $ID: register.php
*/ 
require_once './source/include/common.inc.php';
if ($action == 'chkusername'){
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_members WHERE username='$username'");
	dexit($data['COUNT(*)']);
}elseif ($action == 'save'){
	if (!($formhash == FORMHASH)){
		showmessage('未定义操作',1,array(array('text'=>'返回上一页','href'=>$_SERVER['HTTP_REFERER'])));
	}else {
		$userdata['username'] = $username;
		$userdata['random'] = random(4);
		$userdata['password'] = md5(md5($password).md5($userdata['random']));
		$userdata['email'] = $email;
		$userdata['regdate'] = $timestamp;
		$userdata['regip'] = $ipaddr;
		$uid = $db->insert('sdw_members',$userdata,TRUE);
		if ($userdata['email']){
			$message = str_replace('{username}',$username,$config['wellcomemsgtxt']);
			$message = str_replace('{sitename}',$config['sitename'],$message);
			$message = str_replace('{time}',date('Y-m-d H:i:s',$timestamp),$message);
			$message = str_replace('{adminemail}',$config['adminemail'],$message);
			sendmail($userdata['email'],str_replace('{username}',$username,$config['wellcomemsgtitle']),$message,$config['adminemail']);
		}
		xsetcookie('uid',$uid);
		xsetcookie('username',$username);
		xsetcookie('password',$userdata['password']);
		showmessage("注册成功",0,array(
		array('text'=>'发布免费信息','href'=>'post.php'),
		array('text'=>'进入个人中心完善个人资料','href'=>'profile.php'),
		array('text'=>'<<返回登录前的页面','href'=>$next)
		));
	}
}else {
	include template('register');
}
?>