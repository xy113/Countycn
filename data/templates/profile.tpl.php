<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if(!$inajax) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_XCOOKIE['username']?>-会员中心</title>
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
<a href="profile.php">会员中心首页</a> - 我发布信息
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
<div class="vipbody" id="listtable">
<? } ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable">
              <tr>
                <th width="30"><input type="checkbox" id="checkall" onclick="checkAll(this,'delete[]')" /></th>
                <th>标题</th>
                <th width="60">被浏览</th>
                <th width="130">发布时间</th>
                <th width="40">选项</th>
              </tr>
  
<?php if(is_array($posts)) { foreach($posts as $pp) { ?>
              <tr>
                <td><input type="checkbox" name="delete[]" value="<?php echo $pp['tid']?>" /></td>
                <td><a href="http://<?php echo $pp['cityhost']?>.<?php echo $config['domain']?>/thread.php?tid=<?php echo $pp['tid']?>" target="_blank"><?php echo $pp['title']?></a></td>
                <td><?php echo $pp['views']?></td>
                <td><?php echo $pp['dateline']?></td>
                <td><a href="profile.php?action=edit&amp;tid=<?php echo $pp['tid']?>&amp;page=<?php echo $page?>">编辑</a></td>
              </tr>
  
<? } } ?>
            </table>
<div class="page"><?php echo $pagelink?></div>
<div><a class="button" href="javascript:;" onclick="Delete('page=<?php echo $page?>')">批量删除</a></div>
<?php if(!$inajax) { ?>
</div>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
function checkAll(o,input){
var items = document.getElementsByName(input);
for(var i=0;i<items.length;i++){
if(o.checked){
items[i].checked =true;
}else{
items[i].checked =false;
}
}
}
function Delete(extra){
var values = new Array();
var items = document.getElementsByName('delete[]');
for(var i=0;i<items.length;i++){
if(items[i].checked) values.push(items[i].value);
}
if(values.length>0 && confirm("您确定要删除吗？")){
$.get("profile.php?"+extra,{'inajax':1,'action':'drop','values':values.join(',')},function(response){
$("#listtable").html(response);
})
}
}	
</script>
<div id="footer">关于我们 - 渠道合作 - 帮助中心 - 修改/删除信息 - 友情链接 - 招贤纳士 - 区县导航</div>
</body>
</html>
<? } ?>
