<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ѷ�����Ϣ-<?php echo $config['sitename']?></title>
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
<b>��ѷ�����Ϣ</b>
</div>
<div class="wrap">
<p><a href="/"><?php echo $citydata['cityname']?>������Ϣ</a> > �޸���Ϣ</p>
  	<form name="form1" method="post" action="" id="postform">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="tid" value="<?php echo $tid?>" />
<input type="hidden" name="city" value="<?php echo $thread['cityhost']?>" />
<input type="hidden" name="category" value="<?php echo $thread['pinyin']?>" />
<input type="hidden" name="thepassword" value="<?php echo $thepassword?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="posttable">
      <tr>
        <td width="5" class="firstcell">* </td>
        <td width="120">����</td>
        <td><input type="text" class="text" name="title" maxlength="50" value="<?php echo $thread['title']?>" /></td>
      </tr>
  
<?php if(is_array($typeoptions)) { foreach($typeoptions as $option) { ?>
      <tr>
        <td class="firstcell">
<?php if($option['required']) { ?>
* 
<? } ?>
</td>
        <td><?php echo $option['title']?></td>
        <td><?php echo $option['html']?></td>
      </tr>
  
<? } } ?>
      <tr>
        <td class="firstcell">* </td>
        <td>����</td>
        <td><textarea class="textarea" name="body" id="textarea_body"><?php echo $thread['body']?></textarea></td>
      </tr>
      <tr>
        <td class="firstcell"> </td>
        <td>��ϵ�绰</td>
        <td><input type="text" class="text" name="tel" maxlength="50" value="<?php echo $thread['tel']?>" /></td>
      </tr>
      <tr>
        <td class="firstcell">&nbsp;</td>
        <td>QQ����</td>
        <td><input type="text" class="text" name="userim" maxlength="50" value="<?php echo $thread['userim']?>" /></td>
      </tr>
      <tr>
        <td class="firstcell">&nbsp;</td>
        <td>��ϵ��</td>
        <td><input type="text" class="text" name="contactto" maxlength="50" value="<?php echo $thread['contactto']?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
<td>&nbsp;</td>
        <td><input type="submit" class="pub_btn" value="�����޸�>>" /></td>
      </tr>
    </table>
  	</form>
</div>
<script type="text/javascript">
$("#postform").submit(function(){
var title = $("#postform").find("input[name=title]").val();
var thebody = $("#textarea_body").val();
var tel = $("#postform").find("input[name=tel]").val();
var password = $("#postform").find("input[name=password]").val();
if(title.length<5){
alert("����������д������������5����Ŷ��");
return false;
}
<?php if(is_array($typeoptions)) { foreach($typeoptions as $option) { ?>
<?php if($option['required']) { ?>
<?php if($option['type']=='text') { ?>
if(!$("input[name='typeoption[<?php echo $option['identifier']?>]']").val()){
alert("<?php echo $option['title']?>������д����");
return false;
}
<?php } elseif($option['type']=='number') { ?>
if(!$("input[name='typeoption[<?php echo $option['identifier']?>]']").val() || isNaN($("input[name='typeoption[<?php echo $option['identifier']?>]']").val())){
alert("<?php echo $option['title']?>����������Ŷ��");
return false;
}
<?php } elseif($option['type']=='radio') { ?>
if($("input[name='typeoption[<?php echo $option['identifier']?>]']:checked").length == 0){
alert("����ѡ��<?php echo $option['title']?>����");
return false;
}
<?php } elseif($option['type']=='checkbox') { ?>
if($("input[name='typeoption[<?php echo $option['identifier']?>]']:checked").length == 0){
alert("����ѡ��<?php echo $option['title']?>����");
return false;
}
<? } } } } ?>
if(thebody.length<10){
alert("������д��������ֻ��Ҫ10����Ŷ��");
return false;
}
/*var reg = /^((\d{7,8})|(\d{11})|(\d{3,4})-(\d{7,8}))|((\d{3,4})-(\d{7,8})-(\d{1,4}))$/;
if(!reg.exec(tel)){
alert("������д��ϵ�绰����");
return false;
}*/
return true;
});
</script>
<?php include template('footer'); ?>
