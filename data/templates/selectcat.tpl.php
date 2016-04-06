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
<a href="<?php echo $config['siteurl']?>"><img src="static/images/logo.gif" border="0" class="logo" /></a>
<b>免费发布信息</b>
</div>
<div class="wrap"><div class="cattitle">选择大类</div></div>
<div class="wrap">
<ul class="categorylist" id="bigcat">
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if(!$cat['fid']) { ?>
<li><a href="#<?php echo $cat['pinyin']?>"><?php echo $cat['cname']?></a></li>
<? } } } ?>
<div class="clear"></div>
</ul>
</div>
<div class="wrap"><div class="cattitle">选择小类</div></div>
<div class="wrap" id="smallcat">
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if(!$cat['fid']) { ?>
<ul class="categorylist">
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cc) { ?>
<?php if($cc['fid']==$cat['cid']) { ?>
<li><a href="post.php?cid=<?php echo $cc['cid']?>"><?php echo $cc['cname']?></a></li>
<? } } } ?>
<div class="clear"></div>
</ul>
<? } } } ?>
</div>
<script type="text/javascript">
$("#smallcat ul").hide();
$('#bigcat a').click(function(){
$('#bigcat a.cur').removeClass();
$(this).addClass("cur");
//$(this).addClass("cur").siblings().removeClass();
$("#smallcat ul").eq($('#bigcat a').index(this)).show().siblings().hide();
});
</script>
<div style="height:100px; clear:both;"></div>
<?php include template('footer'); ?>
