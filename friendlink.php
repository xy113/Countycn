<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-22
 * $ID: faq.php
*/ 
require_once './source/include/common.inc.php';
if ($submit){
	if ($formhash == FORMHASH){
		if (!($randcode == $_SESSION['randcode'])){
			showalert('验证码输入错误。',$_SERVER['HTTP_REFERER']);
		}else {
			$newlink = array_merge($newlink,array('display'=>0));
			$db->insert('sdw_friendlink',$newlink);
			showalert('申请提交成功，请等待管理员审核。',$_SERVER['HTTP_REFERER']);
		}
	}else {
		showalert('非法操作，请返回。',$_SERVER['HTTP_REFERER']);
	}
}
include template('friendlink');
?>