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
 * $ID: edit.php
*/
require_once './source/include/common.inc.php';
if ($action == 'delete'){
	if ($thepassword){
		$thread = $db->GetOne("SELECT * FROM sdw_threads WHERE tid='$tid'");
		if (md5(md5($thepassword)) == $thread['password']){				
			$db->query("DELETE FROM sdw_threads WHERE tid='$tid'");
			$db->query("DELETE FROM sdw_typeoptionvars WHERE tid='$tid'");
			showmessage('��Ϣɾ���ɹ�',0,array(
				array('text'=>'ע���Ϊ��Ա','href'=>$config['siteurl'].'/register.php'),
				array('text'=>'��ѷ�����Ϣ','href'=>'/post.php?cid='.$thread['cid']),
				array('text'=>'����վ����ҳ','href'=>'/')
			));
		}else {
			showalert('�����������������',$_SERVER['HTTP_REFERER']);
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
				showmessage('��Ϣ���޸ĳɹ�',0,array(
				array('text'=>'�����Ϣҳ��','href'=>'http://'.site().'/thread.php?tid='.$tid),
				array('text'=>'ע���Ϊ'.$config['sitename'].'��Ա','href'=>$config['siteurl'].'/register.php'),
				array('text'=>'����վ����ҳ','href'=>'/')
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
			showalert('�����������������',$_SERVER['HTTP_REFERER']);
		}
	}else {
		include template('enterpass');
	}
}
?>