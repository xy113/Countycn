<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������������-<?php echo $config['sitename']?></title>
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
<a href="/"><img src="static/images/logo.gif" border="0" class="logo" /></a>
<b>������Ϣ</b>
</div>
<div class="wrap">
<p><a href="/">������Ϣ��ҳ</a> > ������Ϣ</p>
    <form id="form1" name="form1" method="post" action="edit.php" style="margin:50px 0;">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="tid" value="<?php echo $tid?>" />
<p>������������룺<input type="password" name="thepassword" style="padding:5px;" /> 
<input type="submit" value="�ύ" style="padding:5px 10px;" />
<input type="button" value="������һҳ" style="padding:5px 10px;" onclick="history.go(-1)" />
</p>
    </form>
</div>
<script type="text/javascript">
$("#form1").submit(function(){
if(!$("input[name=thepassword]").val()){
return false;
}else{return true;}
})
</script>
<?php include template('footer'); ?>
