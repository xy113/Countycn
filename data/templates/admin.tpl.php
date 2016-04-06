<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $lang['app_name']?></title>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/jquery.dialog.js" type="text/javascript"></script>
<link href="/static/images/admincp.css" rel="stylesheet" type="text/css">
</head>

<body style="overflow:hidden;">
<table border="0" cellspacing="0" cellpadding="0" class="main" id="Main">
  <tr class="toptr">
  <td class="logo"></td>
  <td class="mainMenu">
    <div class="topmenu">欢迎您：<?php echo $admincp['username']?>　级别：
<?php if($isfounder) { ?>
创始人
<? } else { ?>
<?php echo $admincp['groupname']?>
<? } ?>
 | <a href="<?php echo $BASESCRIPT?>?action=logout" target="_top">安全退出</a> | <a href="./" target="_blank">网站首页</a></div>
  	<ul id="topMenu">
<li class="left"></li>
<li><a href="javascript:;" id="header_index" class="cur" onclick="toggleMenu('index','index')"><?php echo $lang['header_index']?></a></li>
<?php echo $headers?>
<li class="right"></li>
</ul>
  </td>
  </tr>
  <tr>
    <td width="160" class="leftMenu" id="leftFrame">
<span id="menu_index">
<div>常用操作</div>
<ul>
<li><a href="<?php echo $BASESCRIPT?>?action=threads" onclick="SwitchMenu(this)" target="mainframe">信息管理</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=runlog" onclick="SwitchMenu(this)" target="mainframe">运行记录</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=feedback" onclick="SwitchMenu(this)" target="mainframe">用户反馈</a></li>
</ul>
</span>
<?php echo $menus?>
</td>
    <td class="mainFrame" valign="top"><iframe frameborder="0" name="mainframe" id="mainframe" src="<?php echo $BASESCRIPT?>?action=index" style="width:100%; height:100%; overflow:visible;"></iframe></td>
  </tr>
</table>
<script type="text/javascript">
var ADMINSCRIPT = '<?php echo $BASESCRIPT?>';
$("#Main").height($(document).height());
$("#leftFrame").height($(document).height()-50);
$("#mainframe").height($(document).height()-50);
var headers = new Array('index','settings','user','site','info','article','template','tool','task');
function SwitchMenu(obj){
if(!obj)return;
var li = obj.parentNode;
    var items = li.parentNode.getElementsByTagName('a');
for(i=0;i<items.length;i++){
    if(obj==items[i]){
    items[i].className = 'cur';
}else{
    items[i].className = '';
}
}
}
function toggleMenu(menukey,url){
    if(!menukey || !$$('header_' + menukey)) {
return;
}
for(var k in top.headers) {
if($$('menu_' + headers[k])) {
$$('menu_' + headers[k]).style.display = headers[k] == menukey ? '' : 'none';
}
}
    var hrefs = $$('topMenu').getElementsByTagName('a');
for(i=0;i<hrefs.length;i++){
    hrefs[i].className='';
}
$$('header_'+menukey).className = 'cur';
if(url){
var uls = $$('leftFrame').getElementsByTagName('span');
for(j=0; j<uls.length; j++){
uls[j].style.displey = 'none';
}
if($$('menu_'+menukey))$$('menu_'+menukey).style.display = 'block';
parent.mainframe.location = ADMINSCRIPT+'?action='+url;
}
return false;
}
function $$(a){
return document.getElementById(a);
}
</script>
</body>
</html>