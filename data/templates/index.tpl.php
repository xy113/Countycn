<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $citydata['cityname']?>_<?php echo $config['sitename']?></title>
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

<?php if($city) { ?>
<b><?php echo $citydata['cityname']?></b>
<? } ?>
 <a href="<?php echo $config['siteurl']?>">[切换城市]</a>
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
<div class="wrap" id="nav">
<ul>
<li><a href="/" class="nav-on">首页</a></li>
<li><a href="fangchanjiaoyi.html">房产交易</a></li>
<li><a href="zhaopinqiuzhi.html">招聘求职</a></li>
<li><a href="zhenghunjiaoyou.html">交友征婚</a></li>
<li><a href="shenghuofuwu.html">生活服务</a></li>
</ul>
<div class="clear"></div>
</div>
<div class="wrap" id="wrap-body">
<div class="cat-area" id="area_1">
<h2><a href="fangchanjiaoyi.html">房屋交易</a>&raquo;</h2>
<ul>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==155) { ?>
<li style="width:200px;"><a href="<?php echo $cat['pinyin']?>.html"><?php echo $cat['cname']?></a></li>
<? } } } ?>
</ul>
</div>
<div class="cat-area" id="area_2">
<h2><a href="ershoushichang.html">二手交易</a>&raquo;</h2>
<ul>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==154) { ?>
<li><a href="<?php echo $cat['pinyin']?>.html"><?php echo $cat['cname']?></a></li>
<? } } } ?>
</ul>
</div>
<div class="cat-area" id="area_3">
<h2><a href="zhaopinqiuzhi.html">招聘求职</a>&raquo;</h2>
<ul>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==157) { ?>
<li><a href="<?php echo $cat['pinyin']?>.html"><?php echo $cat['cname']?></a></li>
<? } } } ?>
</ul>
<h2><a href="zhenghunjiaoyou.html">征婚交友</a>&raquo;</h2>
<ul>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==158) { ?>
<li><a href="<?php echo $cat['pinyin']?>.html"><?php echo $cat['cname']?></a></li>
<? } } } ?>
</ul>
</div>
<div class="cat-area" id="area_4" style="border-right:none;">
<h2><a href="shenghuofuwu.html">生活服务</a>&raquo;</h2>
<ul>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==159) { ?>
<li><a href="<?php echo $cat['pinyin']?>.html"><?php echo $cat['cname']?></a></li>
<? } } } ?>
</ul>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
var dvheight = Math.max($("#area_1").height(),$("#area_2").height(),$("#area_3").height(),$("#area_4").height());
$(".cat-area").css({'height':dvheight});
</script>
<div class="wrap" id="detail">
<div class="left">
<table border="0" cellpadding="0" cellspacing="0" class="post-list">
<?php if(is_array($threads)) { foreach($threads as $tt) { ?>
<tr>
<td class="time"><?php echo $tt['pbtime']?></td>
<td><a href="<?php echo $tt['pinyin']?>/<?php echo $tt['tid']?>.html" target="_blank"><?php echo $tt['title']?></a>　<span><?php echo $tt['areaname']?></span></td> 
<td></td>
</tr>
<? } } ?>
</table>
</div>
<div class="right">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 250x250, 创建于 10-6-8 */
google_ad_slot = "0436908022";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript"></script>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 250x250, 创建于 10-6-8 */
google_ad_slot = "0436908022";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript"></script>
</div>
<div class="clear"></div>
</div>
<?php include template('footer'); ?>
