<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸�����_<?php echo $_XCOOKIE['username']?>-��Ա����</title>
<link rel="stylesheet" type="text/css" href="/static/images/profile.css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="blueBar"></div>
<div class="wrap" id="head">
<div id="headNav">
<div class="inner">
<span class="account"><a href="profile.php"><?php echo $_XCOOKIE['username']?></a>��<a href="profile.php?action=logout">�˳���¼</a></span>
<a href="profile.php">��Ա������ҳ</a> - �޸�����
</div>
</div>
<div id="vlogo"><a href="<?php echo $config['siteurl']?>"><img src="static/images/viplogo.png" border="0" /></a></div>
</div>
<div class="wrap">
<div class="vipleft">
<h2>��Ϣ����</h2>
<div class="nav">
<a class="icon01" href="profile.php">�ҷ�������Ϣ</a>
</div>
<h2>�˻�����</h2>
<div class="nav">
<a class="icon07" href="profile.php?mod=mdinfo">�޸�����</a>
<a class="icon01" href="profile.php?mod=mdpass">�޸�����</a>
</div>
</div>
<div class="vipright">
<div class="vipbody" id="profile">
<form method="post" action="profile.php?mod=mdpass&amp;action=savepass" onsubmit="return checkForm()">
 	<div class="dvitem"><label>ԭ���룺</label><input type="password" class="text" name="oldpassword" id="oldpassword" /></div>
<div class="dvitem"><label>�����룺</label><input type="password" class="text" name="newpassword" id="newpassword" /></div>
<div class="dvitem"><label>ȷ�����룺</label><input type="password" class="text" name="repassword" id="repassword" /></div>
<div class="dvitem"><label></label><input type="submit" value="�����޸�����" class="button" /></div>
</form>
</div>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
function checkForm(){
if(!$("#oldpassword").val()){
alert("ԭ���벻������");
return false;
}
if(($("#newpassword").val()).length<6){
alert("�����������������6λ");
return false;
}
if($("#repassword").val()!=$("#newpassword").val()){
alert("�����������벻һ��");
return false;
}
return true;
}	
</script>
<div id="footer">�������� - �������� - �������� - �޸�/ɾ����Ϣ - �������� - ������ʿ - ���ص���</div>
</body>
</html>