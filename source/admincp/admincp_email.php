<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-21
 * $ID: admincp_email.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
cpheader();
if ($operation == 'newmail'){
	if ($submit == 'yes'){
		$newmail['dateline'] = $timestamp;
		$newmail['author'] = $admincp['admin'];
		$newmail['authorid'] = $admincp['adminid'];
		$db->insert('sdw_emails',$newmail);
		$mailto = explode(';',$newmail['mailto']);
		foreach ($mailto as $mail){
			if (isemail($mail)){
				sendmail($mail,$newmail['subject'],$newmail['message'],$newmail['mailfrom']);
			}
		}
		if ($mailtoall){
			$_SESSION['mail'] = $newmail;
			cpmessage('mail_sending','loading',"$BASESCRIPT?action=email&operation=sendmail",'mail_send_tips',TRUE);
		}else {
			cpmessage('save_success',NULL,$BASESCRIPT.'?action=email');
		}
	}else {
		if ($mailid){
			$mail = $db->GetOne("SELECT * FROM sdw_emails WHERE mailid='$mailid'");
			$fckeditor = FCK('newmail[message]',$mail['message']);
		}else {
			$fckeditor = FCK('newmail[message]');
		}
	}
}elseif ($operation == 'sendmail'){
	$mail = $_SESSION['mail'];
	$start_limit = intval($start_limit);
	$mailno = 0;
	$query = $db->query("SELECT uid,email FROM sdw_members ORDER BY uid ASC LIMIT $start_limit,500");
	while ($data = $db->fetch_array($query)){
		$mailno++;
		if (isemail($data['email'])){
			sendmail($data['email'],$mail['subject'],$mail['message'],$mail['mailfrom']);
		}
		if ($mailno == 500){
			$mailno+=$start_limit;
			cpmessage('mail_sending','loading',"$BASESCRIPT?action=email&operation=sendmail&start_limit=".($start_limit+500),'mail_send_tips',TRUE);
		}
	}
	if ($mailno<500)cpmessage('mail_send_compelete','succeed',$BASESCRIPT.'?action=email');
}else {
	if ($delete){
		$db->query("DELETE FROM sdw_emails WHERE mailid IN (".implodeids($delete).")");
		cpmessage('drop_success');
	}else {
		$pagesize = 20;
		$mails = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_emails");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1)*$pagesize;
		$query = $db->query("SELECT mailid,subject,mailfrom,mailto,author,authorid,dateline FROM sdw_emails ORDER BY mailid DESC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$mails[] = $data;
		}
		$pagelink = adminpage($page,$pagecount);
	}
}
include template('admin_email');
?>