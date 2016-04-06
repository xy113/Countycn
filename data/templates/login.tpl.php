<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员登录-<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $postdetail['title']?>" />
<meta name="description" content="<?php echo $postdetail['body']?>" />
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/static/images/css.css">
</head>

<body>
<div class="wrap" id="top3">
<span>
<?php if($_XCOOKIE['username'] && $_XCOOKIE['password']) { ?>
<a href="profile.php"><?php echo $_XCOOKIE['username']?></a>　
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">退出登录</a>  
<? } else { ?>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">免费注册</a> | 
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">会员登录</a>
<? } ?>
</span>
<a href="<?php echo $config['siteurl']?>"><img src="static/images/logo.gif" border="0" class="logo" /></a>
<b>会员登录</b>
</div>
<div class="wrap"><div class="tishi2">登录县域中国，发布、管理信息更轻松</div></div>
<div class="wrap" id="dvreg">
<div id="errormsg"></div>
<form action="login.php?action=chklogin&amp;next=<?php echo $next?>" method="post" id="loginform" onsubmit="return checklogin(this)">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<div class="item">
<label>用户名：</label>
<input type="text" name="username" />
</div>
<div class="item">
<label>密码：</label>
<input type="password" name="password" />
</div>
<div class="reg-submit"><input type="submit" id="login-submit" value="" /></div>
</form>
</div>
<script type="text/javascript">
function checklogin(theForm){
if(!theForm.username.value){
alert("用户名不能留空");
return false;
}
if(!theForm.password.value){
alert("密码不能留空");
return false;
}
return true;
}
</script>
<?php include template('footer'); ?>
