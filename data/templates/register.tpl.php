<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ע��-<?php echo $config['sitename']?></title>
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
<a href="profile.php"><?php echo $_XCOOKIE['username']?></a>��
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">�˳���¼</a>  
<? } else { ?>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">���ע��</a> | 
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">��Ա��¼</a> 
<? } ?>
</span>
<a href="<?php echo $config['siteurl']?>"><img src="static/images/logo.gif" border="0" class="logo" /></a>
<b>ע��</b>
</div>
<div class="wrap"><div class="tishi2">ע�������й�ֻ��10�룬������������Ϣ������</div></div>
<div class="wrap" id="dvreg">
<div id="errormsg"></div>
<form action="register.php?action=save&amp;next=<?php echo $next?>" method="post" id="registerform">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<div class="item">
<label>�û�����</label>
<input type="text" name="username" />
<span class="msg">4-20���ַ������֡���ĸ�����֡��»��ߣ�</span>
</div>
<div class="item">
<label>���룺</label>
<input type="password" name="password" />
<span class="msg">6-12���ַ�</span>
</div>
<div class="item">
<label>ȷ�����룺</label>
<input type="password" name="password2" />
<span class="msg">�ظ�����һ������</span>
</div>
<div class="item">
<label>(��ѡ)���䣺</label>
<input type="text" name="email" />
<span class="msg">��������Ч�����䣬�����ڵ�¼���һ�����</span>
</div>
<!--
<?php if($config['randcodestatus']['register']) { ?>
<div class="item">
<label>��֤�룺</label>
<input type="text" name="randcode" id="randcode" style="width:80px;" />
<img src="source/include/validate.php" border="0" align="absmiddle" />
</div>
<? } ?>
 -->
<div class="checkbox"><input type="checkbox" name="check" checked="checked" value="1" /> �ҽ��������й�<a href="license.php" target="_blank">��������</a></div>
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
$("#errormsg").html("�û����������").show();
return false;
}

if(password.length<6 || password.length>12){
$("#errormsg").html("��������������������롣").show();
return false;
}
if(password2!=password){
$("#errormsg").html("�����������벻һ�£����������롣").show();
return false;
}
var reg = /^\w+((-|\.)\w+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
if(email && !reg.exec(email)){
$("#errormsg").html("�����ʽ����������������롣").show();
return false;
}
if($("#registerform").find("input[name=check]:checked").length==0){
$("#errormsg").html("��û�н������ǵ�ע��Э�飬���ڲ���ע�ᡣ").show();
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
$("#errormsg").html("���û����ѱ���ʹ�ã����������롣").show();
return false;
}
$("#errormsg").html("").hide();
return true;
});
</script>
<?php include template('footer'); ?>
