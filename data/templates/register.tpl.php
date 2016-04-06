<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册-<?php echo $config['sitename']?></title>
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
<b>注册</b>
</div>
<div class="wrap"><div class="tishi2">注册县域中国只需10秒，发布、管理信息更轻松</div></div>
<div class="wrap" id="dvreg">
<div id="errormsg"></div>
<form action="register.php?action=save&amp;next=<?php echo $next?>" method="post" id="registerform">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<div class="item">
<label>用户名：</label>
<input type="text" name="username" />
<span class="msg">4-20个字符（汉字、字母、数字、下划线）</span>
</div>
<div class="item">
<label>密码：</label>
<input type="password" name="password" />
<span class="msg">6-12个字符</span>
</div>
<div class="item">
<label>确认密码：</label>
<input type="password" name="password2" />
<span class="msg">重复输入一次密码</span>
</div>
<div class="item">
<label>(可选)邮箱：</label>
<input type="text" name="email" />
<span class="msg">请输入有效的邮箱，可用于登录和找回密码</span>
</div>
<!--
<?php if($config['randcodestatus']['register']) { ?>
<div class="item">
<label>验证码：</label>
<input type="text" name="randcode" id="randcode" style="width:80px;" />
<img src="source/include/validate.php" border="0" align="absmiddle" />
</div>
<? } ?>
 -->
<div class="checkbox"><input type="checkbox" name="check" checked="checked" value="1" /> 我接受县域中国<a href="license.php" target="_blank">服务条款</a></div>
<div class="reg-submit"><input type="submit" id="reg-submit" value="" /></div>
</form>
</div>
<script type="text/javascript">
$("#registerform").submit(function(){
var password = $("#registerform").find("input[name=password]").val();
var password2 = $("#registerform").find("input[name=password2]").val();
var email = $("#registerform").find("input[name=email]").val();
var username = $("#registerform").find("input[name=username]").val();
if(username.length<4 || username.length>20){
$("#errormsg").html("用户名输入错误").show();
return false;
}

if(password.length<6 || password.length>12){
$("#errormsg").html("密码输入错误，请重新输入。").show();
return false;
}
if(password2!=password){
$("#errormsg").html("两次密码输入不一致，请重新输入。").show();
return false;
}
var reg = /^\w+((-|\.)\w+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
if(email && !reg.exec(email)){
$("#errormsg").html("邮箱格式输入错误，请重新输入。").show();
return false;
}
if($("#registerform").find("input[name=check]:checked").length==0){
$("#errormsg").html("您没有接受我们的注册协议，现在不能注册。").show();
return false;
}
var check = 0;
$.ajax({
url:'/register.php',
async:false,
data:{action:"chkusername","username":username},
success:function(response){
check = parseInt(response);
}
})
if(check>0){
$("#errormsg").html("此用户名已被人使用，请重新输入。").show();
return false;
}
$("#errormsg").html("").hide();
return true;
});
</script>
<?php include template('footer'); ?>
