<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
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
		showmessage('δ�������',1,array(array('text'=>'������һҳ','href'=>$_SERVER['HTTP_REFERER'])));
	}else {
		$data = $db->GetOne("SELECT uid,username,password,random FROM sdw_members WHERE username='$username'");
		if (!$data){
			showalert('�û�������',$_SERVER['HTTP_REFERER']);
		}elseif (!($data['password']==md5(md5($password).md5($data['random'])))){
			showalert('�������',$_SERVER['HTTP_REFERER']);
		}else {
			$db->query("UPDATE sdw_members SET lastvisit='$timestamp',lastip='$ipaddr',credits=credits+5 WHERE uid='$data[uid]'");
			xsetcookie('uid',$data['uid']);
			xsetcookie('username',$data['username']);
			xsetcookie('password',$data['password']);
			showmessage("��¼�ɹ�",0,array(
			array('text'=>'���������Ϣ','href'=>'post.php'),
			array('text'=>'��������������Ƹ�������','href'=>'profile.php'),
			array('text'=>'<<���ص�¼ǰ��ҳ��','href'=>$next)
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