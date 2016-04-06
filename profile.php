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
!$action && $action = 'list';
if (!$_XCOOKIE['uid'] || !$_XCOOKIE['username'] || !$_XCOOKIE['password']){
	header('location:login.php');
}elseif ($action == 'logout'){
	xsetcookie('uid','');
	xsetcookie('username','');
	xsetcookie('password','');
	header('location:login.php');
}
if ($mod) {
	include ROOT_PATH.'/source/include/profile.'.$mod.'.php';
}else {
	if ($action == 'edit'){
		if ($submit == 'yes'){
			if ($formhash == FORMHASH){
				$db->update('sdw_threads',array('title'=>$title,'body'=>$body,'tel'=>$tel,'userim'=>$userim,'contactto'=>$contactto),"tid='$tid'");
				foreach ($typeoption as $key=>$option){
					$value = is_array($option) ? implode(',',$option) : $option;
					$db->update('sdw_typeoptionvars',array('value'=>$value),"tid='$tid' AND optionid='".fetchoptionid($key)."'");
				}
				showalert('信息修改成功',$_SERVER['HTTP_REFERER']);
			}else {
				showalert('非法操作',$_SERVER['HTTP_REFERER']);
			}
		}else {
			$typeoptions = array();
			$thread = $db->GetOne("SELECT * FROM sdw_threads WHERE tid='$tid' AND authorid='$_XCOOKIE[uid]'");
			$query = $db->query("SELECT a.optionid,a.value,b.title,b.identifier,b.type,b.rules FROM sdw_typeoptionvars a LEFT JOIN 
			sdw_typeoptions b ON b.optionid=a.optionid WHERE a.tid='$tid' ORDER BY a.tid");
			while ($data = $db->fetch_array($query)){
				$data['html'] = fetchoptionhtml($data['type'],$data['identifier'],unserialize($data['rules']),$data['value']);
				$typeoptions[] = $data;
			}
			include template('editthread');
		}
	}else {
		if ($action == 'drop'){
			if ($values){
				$db->query("DELETE FROM sdw_threads WHERE authorid='$_XCOOKIE[uid]' AND tid IN ($values)");
			}
			$action = 'list';
		}
		$posts = array();
		$pagesize = 20;
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_threads WHERE authorid='$_XCOOKIE[uid]'");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT a.tid,a.title,a.dateline,a.views,c.cityhost FROM sdw_threads a LEFT JOIN sdw_city c ON c.cityid=a.cityid WHERE a.authorid='$_XCOOKIE[uid]' ORDER BY a.tid DESC LIMIT $limit,$pagesize");
		while ($result = $db->fetch_array($query)){
			$result['dateline'] = date('Y-m-d H:i:s',$result['dateline']);
			$posts[] = $result;
		}
		$pagelink = pagination($page,$pagecount);
		include template('profile');
	}
}
?>