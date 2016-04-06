<?php
if ($action == 'saveinfo'){
	$db->update('sdw_members',$newmember,"uid='$_XCOOKIE[uid]'");
	showalert('信息修改成功',$_SERVER['HTTP_REFERER']);
}
$member = $db->GetOne("SELECT * FROM sdw_members WHERE uid='$_XCOOKIE[uid]'");
include template('mdinfo');
?>