<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
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
			showalert('��֤���������',$_SERVER['HTTP_REFERER']);
		}else {
			$newlink = array_merge($newlink,array('display'=>0));
			$db->insert('sdw_friendlink',$newlink);
			showalert('�����ύ�ɹ�����ȴ�����Ա��ˡ�',$_SERVER['HTTP_REFERER']);
		}
	}else {
		showalert('�Ƿ��������뷵�ء�',$_SERVER['HTTP_REFERER']);
	}
}
include template('friendlink');
?>