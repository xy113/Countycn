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
 * $ID: edit.php
*/
require_once './source/include/common.inc.php';
if ($action == 'delete'){
	if ($thepassword){
		$thread = $db->GetOne("SELECT * FROM sdw_threads WHERE tid='$tid'");
		if (md5(md5($thepassword)) == $thread['password']){				
			$db->query("DELETE FROM sdw_threads WHERE tid='$tid'");
			$db->query("DELETE FROM sdw_typeoptionvars WHERE tid='$tid'");
			showmessage('信息删除成功',0,array(
				array('text'=>'注册成为会员','href'=>$config['siteurl'].'/register.php'),
				array('text'=>'免费发布信息','href'=>'/post.php?cid='.$thread['cid']),
				array('text'=>'返回站点首页','href'=>'/')
			));
		}else {
			showalert('密码错误，请重新输入',$_SERVER['HTTP_REFERER']);
		}
	}else {
		include template('enterpass');
	}
}else {
	if ($thepassword){
		$thread = $threadoptions = array();
		$thread = $db->GetOne("SELECT t.*,ct.cityname,ct.cityhost,c.pinyin,c.cname FROM sdw_threads t LEFT JOIN sdw_city ct 
		ON ct.cityid=t.cityid LEFT JOIN sdw_category c ON c.cid=t.cid WHERE t.tid='$tid'");
		if (md5(md5($thepassword))== $thread['password']){
			if ($formhash == FORMHASH){
				$db->update('sdw_threads',array('title'=>$title,'body'=>$body,'tel'=>$tel,
				'userim'=>$userim,'contactto'=>$contactto),"tid='$tid'");
				foreach ($typeoption as $key=>$option){
					$value = is_array($option) ? implode(',',$option) : $option;
					$db->update('sdw_typeoptionvars',array('value'=>$value),"tid='$tid' AND optionid='".fetchoptionid($key)."'");
				}
				showmessage('信息已修改成功',0,array(
				array('text'=>'浏览信息页面','href'=>'http://'.site().'/thread.php?tid='.$tid),
				array('text'=>'注册成为'.$config['sitename'].'会员','href'=>$config['siteurl'].'/register.php'),
				array('text'=>'返回站点首页','href'=>'/')
				));
			}else {
				$query = $db->query("SELECT a.optionid,a.value,b.title,b.identifier,b.type,b.rules FROM sdw_typeoptionvars a LEFT JOIN 
				sdw_typeoptions b ON b.optionid=a.optionid WHERE a.tid='$tid' ORDER BY a.tid");
				while ($data = $db->fetch_array($query)){
					$data['html'] = fetchoptionhtml($data['type'],$data['identifier'],unserialize($data['rules']),$data['value']);
					$typeoptions[] = $data;
				}
				include template('edit');
			}
		}else {
			showalert('密码错误，请重新输入',$_SERVER['HTTP_REFERER']);
		}
	}else {
		include template('enterpass');
	}
}
?>