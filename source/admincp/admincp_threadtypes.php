<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-15
 * $ID: admincp_threadtypes.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
if (!$admin->checkadminpriv('allowadminthreads')) die('Access Denied!');
cpheader();
if ($operation == 'typeoption'){
	if ($submit){
		if ($delete){
			$optionid = implodeids($delete);
			$db->query("DELETE FROM sdw_typeoptions WHERE optionid IN ($optionid)");
		}
		if ($newoption){
			foreach ($newoption as $key=>$option){
				$db->update('sdw_typeoptions',$option,"optionid=$key");
			}
		}
		if ($newclass){
			foreach ($newclass as $key=>$class){
				$db->update('sdw_typeoptions',$class,"optionid=$key");
			}
		}
		if ($newtitle){
			foreach ($newtitle as $key=>$title) {
				$db->insert('sdw_typeoptions',array('classid'=>$classid,'title'=>$title,
				'displayorder'=>$newdisplayorder[$key],
				'identifier'=>$newidentifier[$key],
				'type'=>$newtype[$key]
				));
			}
		}
		if ($newclassname){
			foreach ($newclassname as $key=>$classname){
				$db->insert('sdw_typeoptions',array('title'=>$classname,'displayorder'=>$newclassorder[$key]));
			}
		}
		updatecache('typeoptions');
		cpmessage('modi_success',0);
	}else {
		$typeoptions = $optiontypes = array();
		$query = $db->query("SELECT optionid,title,displayorder FROM sdw_typeoptions WHERE classid=0 ORDER BY displayorder ASC,optionid ASC");
		while ($data = $db->fetch_array($query)){
			$optiontypes[] = $data;
		}
		$classid = intval($classid);
		if ($classid){
			$query = $db->query("SELECT * FROM sdw_typeoptions WHERE classid='$classid' ORDER BY displayorder ASC,optionid ASC");
			while ($optiondata = $db->fetch_array($query)){
				$typeoptions[] = $optiondata;
			}
		}
		include template('admin_typeoption');
	}
}elseif ($operation == 'optiondetail'){
	if ($optionnew){
		$optionid = intval($optionid);
		$optionnew['rules'] = serialize($optionnew['rules'][$optionnew['type']]);
		$db->update('sdw_typeoptions',$optionnew,"optionid=$optionid");
		updatecache('typeoptions');
		cpmessage('modi_success',0);
	}else {
		$optiontypes = $option = array();
		$query = $db->query("SELECT optionid,title,displayorder FROM sdw_typeoptions WHERE classid=0 ORDER BY displayorder ASC,optionid ASC");
		while ($data = $db->fetch_array($query)){
			$optiontypes[] = $data;
		}
		$option = $db->GetOne("SELECT * FROM sdw_typeoptions WHERE optionid='$optionid'");
		$option['rules'] = unserialize($option['rules']);
		include template('admin_optiondetail');
	}
}elseif ($operation == 'typedetail'){
	if ($submit){
		if ($displayorder){
			$optionid = array();
			$query = $db->query("SELECT optionid FROM sdw_typevars WHERE typeid='$typeid'");
			while ($data = $db->fetch_array($query)){
				$optionid[] = $data['optionid'];
			}
			foreach ($displayorder as $key=>$value){
				if (in_array($key,$optionid)){
					$db->update('sdw_typevars',array('available'=>intval($available[$key]),
					'required'=>intval($required[$key]),
					'unchangeable'=>intval($unchangeable[$key]),
					'search'=>intval($search[$key]),
					'displayorder'=>intval($value)
					),array('typeid'=>$typeid,'optionid'=>$key));
				}else {
					$db->insert('sdw_typevars',array(
					'typeid'=>$typeid,
					'optionid'=>$key,
					'available'=>intval($available[$key]),
					'required'=>intval($required[$key]),
					'unchangeable'=>intval($unchangeable[$key]),
					'search'=>intval($search[$key]),
					'displayorder'=>intval($value)
					));
				}
			}
		}
		if ($delete){
			$db->query("DELETE FROM sdw_typevars WHERE typeid='$typeid' AND optionid IN (".implodeids($delete).")");
		}
		cpmessage('modi_success');
	}else {
		$typeoptions = $optionall = $options = $optionid = array();
		$typeid = intval($typeid);
		$threadtype = $db->GetOne("SELECT * FROM sdw_threadtypes WHERE typeid='$typeid'");
		$query = $db->query("SELECT a.*,b.title,b.type FROM sdw_typevars a LEFT JOIN sdw_typeoptions b ON b.optionid=a.optionid WHERE a.typeid='$typeid' ORDER BY a.displayorder ASC,a.typeid ASC");
		while ($data = $db->fetch_array($query)){
			$data['typename'] = $cplang['typeoption'][$data['type']];
			$optionid[] = $data['optionid'];
			$options[] = $data;
		}
		$query = $db->query("SELECT optionid,classid,title,type FROM sdw_typeoptions ORDER BY displayorder ASC,optionid ASC");
		while ($optiondata = $db->fetch_array($query)){
			$optiondata['typename'] = $cplang['typeoption'][$optiondata['type']];
			$optiondata['checked'] = in_array($optiondata['optionid'],$optionid);
			$typeoptions[$optiondata['classid']][] = $optiondata;
			if ($optiondata['classid'])$optionall[] = $optiondata;
		}
		include template('admin_typedetail');
	}
}else {
	if ($submit){
		if ($delete){
			$typeid = implodeids($delete);
			$db->query("DELETE FROM sdw_threadtypes WHERE typeid IN ($typeid)");
		}
		if ($newtypename){
			foreach ($newtypename as $key=>$typename){
				$db->insert('sdw_threadtypes',array('typename'=>$typename,'displayorder'=>$newdisplayorder[$key],'description'=>$newdescription[$key]));
			}
		}
		if ($threadtype){
			foreach ($threadtype as $key=>$value){
				$db->update('sdw_threadtypes',$value,"typeid=$key");
			}
		}
		updatecache('threadtypes');
		cpmessage('save_success',0);
	}else {
		$threadtypes = array();
		$query = $db->query("SELECT typeid,typename,displayorder,description FROM sdw_threadtypes ORDER BY displayorder ASC,typeid ASC");
		while ($data = $db->fetch_array($query)){
			$threadtypes[] = $data;
		}
		include template('admin_threadtypes');
	}
}
?>