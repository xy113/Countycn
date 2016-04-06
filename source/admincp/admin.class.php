<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-18
 * $ID: admin.class.php
**/
if (!defined('IN_XSCMS'))die('Access Denied!');
class Admin{
	public $uid = 0;
	public $adminid = 0;
	public $isfounder = false;
	public $cpaccess = 0;
	public $admincp = array();
	function __construct(){
		$this->Admin();
	}
	function Admin(){
		global $_SESSION;
		if (!isset($_SESSION['admincp'])){
			$this->cpaccess = 0;
		}else {
			$this->admincp = $_SESSION['admincp'];
			if ((isset($this->admincp['adminid']) && $this->admincp['adminid']<1) || empty($this->admincp['username']) || empty($this->admincp['password'])){
				$this->cpaccess = 0;
			}else {
				$this->cpaccess = 1;
				$this->uid = $this->admincp['uid'];
				$this->adminid = $this->admincp['adminid'];
				$this->isfounder = $this->founder($this->adminid);
			}
		}
	}
	function founder($adminid){
		return in_array($adminid,explode(',',$GLOBALS['config']['admincp']['founders']));
	}
	function AdminLogin($username,$password,$randcode){
		global $db,$cplang,$_SESSION;
		if ($randcode && ($randcode != $_SESSION['randcode'])){
			cpheader();
			cpmessage('login_error_3','error');
		}
		$admindata = $db->GetOne("SELECT * FROM sdw_members WHERE username='$username' AND adminid IN (1,2)");
		if (empty($admindata)){
			cpheader();
			cpmessage('login_error_4','error');
		}elseif (!(md5(md5($password).md5($admindata['random']))==$admindata['password'])){
			cpheader();
			cpmessage('login_error_5','error');
		}else {
			$data = $db->GetOne("SELECT a.*,g.groupid,g.groupname FROM sdw_usergroups g LEFT JOIN sdw_admingroups a ON a.admingid=g.groupid WHERE g.groupid='$admindata[groupid]'");
			if ($data)$admindata = array_merge($admindata,$data);
			$_SESSION['admincp'] = $admindata;
			$this->Admin();
			xsetcookie('uid',$admindata['uid']);
			xsetcookie('username',$admindata['username']);
			xsetcookie('password',$admindata['password']);
			$db->query("UPDATE sdw_members SET lastvisit='$GLOBALS[timestamp]',lastip='$GLOBALS[ipaddr]' WHERE username='$username'");
			$this->cplog($cplang['login_succed']);
			header('location:./'.ADMINSCRIPT);
		}
	}
	function AdminLogout(){
		unset($_SESSION['admincp']);
		header('location:./'.ADMINSCRIPT);
	}
	function checkadminpriv($allow){
		if($this->isfounder){
			return TRUE;
		}else {
			return $this->admincp[$allow];
		}
	}
	function cplog($body=''){
		$GLOBALS['db']->query("INSERT INTO sdw_adminlog(uid,body,dateline,ipaddr,requesturi)VALUES('$this->uid','$body','$GLOBALS[timestamp]','$GLOBALS[ipaddr]','$_SERVER[HTTP_REFERER]')");
	}
}
?>