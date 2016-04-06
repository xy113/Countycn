<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改密码_<?php echo $_XCOOKIE['username']?>-会员中心</title>
<link rel="stylesheet" type="text/css" href="/static/images/profile.css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="blueBar"></div>
<div class="wrap" id="head">
<div id="headNav">
<div class="inner">
<span class="account"><a href="profile.php"><?php echo $_XCOOKIE['username']?></a>　<a href="profile.php?action=logout">退出登录</a></span>
<a href="profile.php">会员中心首页</a> - 修改密码
</div>
</div>
<div id="vlogo"><a href="<?php echo $config['siteurl']?>"><img src="static/images/viplogo.png" border="0" /></a></div>
</div>
<div class="wrap">
<div class="vipleft">
<h2>信息管理：</h2>
<div class="nav">
<a class="icon01" href="profile.php">我发布的信息</a>
</div>
<h2>账户管理：</h2>
<div class="nav">
<a class="icon07" href="profile.php?mod=mdinfo">修改资料</a>
<a class="icon01" href="profile.php?mod=mdpass">修改密码</a>
</div>
</div>
<div class="vipright">
<div class="vipbody" id="profile">
<form method="post" action="profile.php?mod=mdpass&amp;action=savepass" onsubmit="return checkForm()">
 	<div class="dvitem"><label>原密码：</label><input type="password" class="text" name="oldpassword" id="oldpassword" /></div>
<div class="dvitem"><label>新密码：</label><input type="password" class="text" name="newpassword" id="newpassword" /></div>
<div class="dvitem"><label>确认密码：</label><input type="password" class="text" name="repassword" id="repassword" /></div>
<div class="dvitem"><label></label><input type="submit" value="立即修改密码" class="button" /></div>
</form>
</div>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
function checkForm(){
if(!$("#oldpassword").val()){
alert("原密码不能留空");
return false;
}
if(($("#newpassword").val()).length<6){
alert("新密码输入错误，至少6位");
return false;
}
if($("#repassword").val()!=$("#newpassword").val()){
alert("两次密码输入不一致");
return false;
}
return true;
}	
</script>
<div id="footer">关于我们 - 渠道合作 - 帮助中心 - 修改/删除信息 - 友情链接 - 招贤纳士 - 区县导航</div>
</body>
</html>