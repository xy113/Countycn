<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>友情链接_<?php echo $config['sitename']?></title>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<link href="static/images/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="top">
<div class="wrap">
<?php if($_XCOOKIE['username'] && $_XCOOKIE['password']) { ?>
<span>
<a href="profile.php"><?php echo $_XCOOKIE['username']?></a>　
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">退出登录</a>  
</span>
<? } else { ?>
<span>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">免费注册</a>  
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">会员登录</a>
</span>
<? } ?>
县域中国是专注于服务中国西部百强县的本地生活信息门户。
</div>
</div>
<div class="banner">
<div class="wrap">
<a href="post.php" class="btn-post"><b></b>免费发布信息</a>
<span class="logo"><img src="/static/images/logo.gif" border="0" /></span>
<div class="sreachbox">
<form method="get" action="search.php" onsubmit="if($('#s-keyword').val()){return true}else{alert('请输入一个关键字');return false;}">
<input type="hidden" name="city" value="<?php echo $city?>" />
<input type="hidden" name="cid" value="0" />
<input type="text" class="search-key" id="s-keyword" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="search-btn" value="搜索" />
</form>
</div>
</div>
</div>
<div class="blank"></div>
<div class="wrap yourpos"><a href="/">县域中国</a> > 友情链接</div>
<div class="wrap" id="friendlink">
<h3 class="title">网站合作</h3>
<div>QQ：32495960 E-mail：32495960@qq.com</div>
<h3 class="title">获取链接代码</h3>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100">图片链接：</td>
            <td><a href="http://www.countycn.com"><img src="http://www.countycn.com/static/images/logo.gif" border="0" /></a></td>
          </tr>
          <tr>
            <td>图片链接代码：</td>
            <td><textarea style="width:500px; height:80px;" readonly="readonly" onclick="this.select()"><a href="http://www.countycn.com" target="_blank" title="县域中国，县域生活信息门户"><img src="http://www.countycn.com/static/images/logo.gif" border="0" /></a></textarea></td>
          </tr>
          <tr>
            <td height="30">文字链接：</td>
            <td><a href="http://www.countycn.com">县域中国</a></td>
          </tr>
          <tr>
            <td>文字链接代码：</td>
            <td><textarea style="width:500px; height:80px;" readonly="readonly" onclick="this.select()"><a href="http://www.countycn.com" target="_blank" title="县域中国，县域生活信息门户">县域中国</a></textarea></td>
          </tr>
        </table>
</div>
<h3 class="title">申请友情链接（QQ：32495960）</h3>
<div>
  <form id="flink" name="form1" method="post" action="">
  	<input type="hidden" name="submit" value="yes" />
  	<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<input type="hidden" name="newlink[displayorder]" value="100" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100">网站名称：</td>
            <td><input type="text" name="newlink[sitename]" /> 必填</td>
          </tr>
          <tr>
            <td>链接地址</td>
            <td><input type="text" name="newlink[siteurl]" /> 必填</td>
          </tr>
          <tr>
            <td>图片地址</td>
            <td><input type="text" name="newlink[logo]" /></td>
          </tr>
          <tr>
            <td>网站说明：</td>
            <td><textarea name="newlink[description]"></textarea></td>
          </tr>
  <tr>
            <td>验证码：</td>
            <td><input type="text" name="randcode" style="width:60px" /> <img src="./source/include/validate.php" border="0" align="absmiddle" /></td>
          </tr>
  <tr>
            <td></td>
            <td><input type="submit" value="提交申请" style="padding:5px 10px;" /></td>
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
