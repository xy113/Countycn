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
$articles = array();
$query = $db->query("SELECT id,title,body FROM sdw_faq ORDER BY displayorder,id");
while ($data = $db->fetch_array($query)){
	$articles[] = $data;
}
include template('faq');
?>