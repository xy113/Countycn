<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>免费发布信息-<?php echo $config['sitename']?></title>
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
<a href="/"><img src="static/images/logo.gif" border="0" class="logo" /></a>
<b>免费发布信息</b>
</div>
<div class="wrap">
<p><a href="/"><?php echo $citydata['cityname']?>分类信息</a> > <a href="/<?php echo $category['pinyin']?>.html"><?php echo $category['cname']?></a> > 发布信息</p>
  <form name="form1" method="post" action="" id="postform">
  	<input type="hidden" name="cityid" value="<?php echo $citydata['cityid']?>" />
<input type="hidden" name="cid" value="<?php echo $cid?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="<?php echo $_SESSION['validate']?>" value="<?php echo $_SESSION['validatecode']?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="posttable">
      <tr>
        <td width="5" class="firstcell">* </td>
        <td width="120">标题</td>
        <td><input type="text" class="text" name="title" maxlength="50" /></td>
      </tr>
      <tr>
        <td class="firstcell">* </td>
        <td>地点</td>
        <td>
<select name="areaid" class="select" id="areaid" onchange="changeStreet(this.value)">
<option value="0">不限</option>
<?php if(is_array($citydata['area'])) { foreach($citydata['area'] as $area) { ?>
<option value="<?php echo $area['areaid']?>"
<?php if($area['areaid']==$areaid) { ?>
 selected="selected"
<? } ?>
><?php echo $area['areaname']?></option>
<? } } ?>
</select>
<select name="streetid" class="select" id="streetid">
</select>
</td>
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
        <td>描述</td>
        <td><textarea class="textarea" name="body" id="textarea_body"></textarea></td>
      </tr>
      <tr>
        <td class="firstcell">* </td>
        <td>联系电话</td>
        <td><input type="text" class="text" name="tel" maxlength="50" /></td>
      </tr>
      <tr>
        <td class="firstcell">&nbsp;</td>
        <td>QQ号码</td>
        <td><input type="text" class="text" name="userim" maxlength="50" /></td>
      </tr>
      <tr>
        <td class="firstcell">&nbsp;</td>
        <td>联系人</td>
        <td><input type="text" class="text" name="contactto" maxlength="50" /></td>
      </tr>
      <tr>
        <td class="firstcell">* </td>
        <td>设置管理密码</td>
        <td><input type="text" class="text" name="password" maxlength="50" /></td>
      </tr>
  <tr>
        <td class="firstcell">* </td>
        <td>验证码</td>
        <td><input type="text" class="text" name="randcode" maxlength="4" style="width:60px;" /> <img src="./source/include/validate.php" border="0" align="absmiddle" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
<td>&nbsp;</td>
        <td><input type="submit" class="pub_btn" value="立即发布>>" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
var streets = {
'0':{'0':'不限'}
<?php if(is_array($citydata['area'])) { foreach($citydata['area'] as $area) { ?>
,'<?php echo $area['areaid']?>':{'0':'不限'
<?php if(is_array($streets[$area['areaid']])) { foreach($streets[$area['areaid']] as $st) { ?>
,'<?php echo $st['streetid']?>':'<?php echo $st['streetname']?>'
<? } } ?>
}
<? } } ?>
}
changeStreet($("#areaid").val());
function changeStreet(areaid){
var option = '';
var data = streets[areaid];
for(var st in data){
option+='<option value="'+st+'">'+data[st]+'</option>';
}
$("#streetid").html(option);
}
$("#postform").submit(function(){
var title = $("#postform").find("input[name=title]").val();
var thebody = $("#textarea_body").val();
var tel = $("#postform").find("input[name=tel]").val();
var password = $("#postform").find("input[name=password]").val();
if(title.length<5){
alert("标题忘记填写啦，不能少于5个字哦。");
return false;
}
<?php if(is_array($typeoptions)) { foreach($typeoptions as $option) { ?>
<?php if($option['required']) { ?>
<?php if($option['type']=='text') { ?>
if(!$("input[name='typeoption[<?php echo $option['identifier']?>]']").val()){
alert("<?php echo $option['title']?>忘记填写啦。");
return false;
}
<?php } elseif($option['type']=='number') { ?>
if(!$("input[name='typeoption[<?php echo $option['identifier']?>]']").val() || isNaN($("input[name='typeoption[<?php echo $option['identifier']?>]']").val())){
alert("<?php echo $option['title']?>必须是数字哦。");
return false;
}
<?php } elseif($option['type']=='radio') { ?>
if($("input[name='typeoption[<?php echo $option['identifier']?>]']:checked").length == 0){
alert("忘记选择<?php echo $option['title']?>啦。");
return false;
}
<?php } elseif($option['type']=='checkbox') { ?>
if($("input[name='typeoption[<?php echo $option['identifier']?>]']:checked").length == 0){
alert("忘记选择<?php echo $option['title']?>啦。");
return false;
}
<? } } } } ?>
if(thebody.length<10){
alert("忘记填写描述啦，只是要10个字哦。");
return false;
}
var reg = /^((\d{7,8})|(\d{11})|(\d{3,4})-(\d{7,8}))|((\d{3,4})-(\d{7,8})-(\d{1,4}))$/;
if(!reg.exec(tel)){
alert("忘记填写联系电话啦。");
return false;
}
if(password.length<6){
alert("忘记输入管理密码啦，至少6位哦。");
return false;
}
if(!$("input[name='randcode']").val()){
alert("验证码还没有填写哦。");
return false;
}
return true;
});
</script>
<?php include template('footer'); ?>
