<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������_<?php echo $config['sitename']?></title>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<link href="static/images/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="top">
<div class="wrap">
<?php if($_XCOOKIE['username'] && $_XCOOKIE['password']) { ?>
<span>
<a href="profile.php"><?php echo $_XCOOKIE['username']?></a>��
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">�˳���¼</a>  
</span>
<? } else { ?>
<span>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">���ע��</a>  
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">��Ա��¼</a>
</span>
<? } ?>
�����й���רע�ڷ����й�������ǿ�صı���������Ϣ�Ż���
</div>
</div>
<div class="banner">
<div class="wrap">
<a href="post.php" class="btn-post"><b></b>��ѷ�����Ϣ</a>
<span class="logo"><img src="/static/images/logo.gif" border="0" /></span>
<div class="sreachbox">
<form method="get" action="search.php" onsubmit="if($('#s-keyword').val()){return true}else{alert('������һ���ؼ���');return false;}">
<input type="hidden" name="city" value="<?php echo $city?>" />
<input type="hidden" name="cid" value="0" />
<input type="text" class="search-key" id="s-keyword" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="search-btn" value="����" />
</form>
</div>
</div>
</div>
<div class="blank"></div>
<div class="wrap yourpos"><a href="/">�����й�</a> > ��������</div>
<div class="wrap" id="friendlink">
<h3 class="title">��վ����</h3>
<div>QQ��32495960 E-mail��32495960@qq.com</div>
<h3 class="title">��ȡ���Ӵ���</h3>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100">ͼƬ���ӣ�</td>
            <td><a href="http://www.countycn.com"><img src="http://www.countycn.com/static/images/logo.gif" border="0" /></a></td>
          </tr>
          <tr>
            <td>ͼƬ���Ӵ��룺</td>
            <td><textarea style="width:500px; height:80px;" readonly="readonly" onclick="this.select()"><a href="http://www.countycn.com" target="_blank" title="�����й�������������Ϣ�Ż�"><img src="http://www.countycn.com/static/images/logo.gif" border="0" /></a></textarea></td>
          </tr>
          <tr>
            <td height="30">�������ӣ�</td>
            <td><a href="http://www.countycn.com">�����й�</a></td>
          </tr>
          <tr>
            <td>�������Ӵ��룺</td>
            <td><textarea style="width:500px; height:80px;" readonly="readonly" onclick="this.select()"><a href="http://www.countycn.com" target="_blank" title="�����й�������������Ϣ�Ż�">�����й�</a></textarea></td>
          </tr>
        </table>
</div>
<h3 class="title">�����������ӣ�QQ��32495960��</h3>
<div>
  <form id="flink" name="form1" method="post" action="">
  	<input type="hidden" name="submit" value="yes" />
  	<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<input type="hidden" name="newlink[displayorder]" value="100" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100">��վ���ƣ�</td>
            <td><input type="text" name="newlink[sitename]" /> ����</td>
          </tr>
          <tr>
            <td>���ӵ�ַ</td>
            <td><input type="text" name="newlink[siteurl]" /> ����</td>
          </tr>
          <tr>
            <td>ͼƬ��ַ</td>
            <td><input type="text" name="newlink[logo]" /></td>
          </tr>
          <tr>
            <td>��վ˵����</td>
            <td><textarea name="newlink[description]"></textarea></td>
          </tr>
  <tr>
            <td>��֤�룺</td>
            <td><input type="text" name="randcode" style="width:60px" /> <img src="./source/include/validate.php" border="0" align="absmiddle" /></td>
          </tr>
  <tr>
            <td></td>
            <td><input type="submit" value="�ύ����" style="padding:5px 10px;" /></td>
          </tr>
        </table>
            </form>
</div>
</div>
<script type="text/javascript">
$("#flink").submit(function(){
if($("input[name='newlink[sitename]']").val() && $("input[name='newlink[siteurl]']").val() && $("input[name=randcode]").val()){
return true;
}else{
return false;
}
});
</script>
<?php include template('footer'); ?>
