<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_XCOOKIE['username']?>-��Ա����</title>
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
<a href="profile.php">��Ա������ҳ</a> - �༭��Ϣ
</div>
</div>
<div id="vlogo"><a href="<?php echo $config['siteurl']?>"><img src="static/images/viplogo.png" border="0" /></a></div>
</div>
<div class="wrap">
<div class="vipleft">
<h2>��Ϣ������</h2>
<div class="nav">
<a class="icon01" href="profile.php">�ҷ�������Ϣ</a>
</div>
<h2>�˻�������</h2>
<div class="nav">
<a class="icon07" href="profile.php?mod=mdinfo">�޸�����</a>
<a class="icon01" href="profile.php?mod=mdpass">�޸�����</a>
</div>
</div>
<div class="vipright">
<div class="vipbody" id="listtable">
<form name="form1" method="post" action="profile.php?action=edit&amp;tid=<?php echo $tid?>&amp;page=<?php echo $page?>" id="postform">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="posttable">
  <tr>
<td width="100">����</td>
<td><input type="text" class="text" name="title" maxlength="50" value="<?php echo $thread['title']?>" /></td>
  </tr>
  
<?php if(is_array($typeoptions)) { foreach($typeoptions as $option) { ?>
  <tr>
<td><?php echo $option['title']?></td>
<td><?php echo $option['html']?></td>
  </tr>
  
<? } } ?>
  <tr>
<td>����</td>
<td><textarea class="textarea" name="body" id="textarea_body"><?php echo $thread['body']?></textarea></td>
  </tr>
  <tr>
<td>��ϵ�绰</td>
<td><input type="text" class="text" name="tel" maxlength="50" value="<?php echo $thread['tel']?>" /></td>
  </tr>
  <tr>
<td>QQ����</td>
<td><input type="text" class="text" name="userim" maxlength="50" value="<?php echo $thread['userim']?>" /></td>
  </tr>
  <tr>
<td>��ϵ��</td>
<td><input type="text" class="text" name="contactto" maxlength="50" value="<?php echo $thread['contactto']?>" /></td>
  </tr>
  <tr>
<td>&nbsp;</td>
<td><input type="submit" class="button" value="�����޸�" />��<input type="button" class="button" value="�����б�>>" onclick="window.location.href='profile.php?page=<?php echo $page?>';" /></td>
  </tr>
</table>
</form>
</div>
</div>
<div class="clear"></div>
</div>
<div id="footer">�������� - �������� - �������� - �޸�/ɾ����Ϣ - �������� - ������ʿ - ���ص���</div>
</body>
</html>