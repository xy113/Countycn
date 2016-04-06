<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $catdata['cname']?>_<?php echo $citydata['cityname']?>_<?php echo $config['sitename']?></title>
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
<a href="/"><b><?php echo $citydata['cityname']?></b></a>
<? } ?>
 <a href="<?php echo $config['siteurl']?>">[切换城市]</a>
</div>
</div>
<div class="banner">
<div class="wrap">
<a href="/post.php?cid=<?php echo $catdata['cid']?>" class="btn-post"><b></b>免费发布信息</a>
<span class="logo"><img src="/static/images/logo.gif" border="0" /></span>
<div class="sreachbox">
<form method="get" action="search.php" onsubmit="if($('#s-keyword').val()){return true}else{alert('请输入一个关键字');return false;}">
<input type="hidden" name="city" value="<?php echo $city?>" />
<input type="hidden" name="cid" value="<?php echo $catdata['cid']?>" />
<input type="text" class="search-key" id="s-keyword" name="keywords" />
<input type="submit" class="search-btn" value="搜索" />
</form>
</div>
</div>
</div>
<div class="blank"></div>
<div class="wrap" id="detail">
<div class="yourpos"><a href="/"><?php echo $citydata['cityname']?>分类信息</a> >  
<?php if($catdata['fid']) { ?>
<a href="/<?php echo $CACHE['categories'][$catdata['fid']]['pinyin']?>.html"><?php echo $CACHE['categories'][$catdata['fid']]['cname']?></a> > <?php echo $catdata['cname']?>
<? } else { ?>
<?php echo $catdata['cname']?>
<? } ?>
</div> 
<div class="choose">
<div><span>全部</span><em>(共有<?php echo $totalrecords?>条信息)</em></div>
<?php if(!$catdata['fid']) { ?>
<div><span>子分类</span>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=<?php echo $time?>" class="cur">不限</a>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==$catdata['cid']) { ?>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $cat['pinyin']?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=<?php echo $time?>"><?php echo $cat['cname']?></a>
<? } } } ?>
</div>
<? } ?>
<?php if(is_array($typeoptions)) { foreach($typeoptions as $option) { ?>
<div><span><?php echo $option['title']?></span>
<a href="list.php?category=<?php echo $category?>&amp;areaid=<?php echo $areaid?>&amp;time=<?php echo $time?>"
<?php if(!$$option['identifier']) { ?>
 class="cur"
<? } ?>
>不限</a>
<?php if(is_array($option['choices'])) { foreach($option['choices'] as $key => $choice) { ?>
<a href="list.php?category=<?php echo $category?>&amp;areaid=<?php echo $areaid?>&amp;time=<?php echo $time?>&amp;<?php echo $option['identifier']?>=<?php echo $key?>"
<?php if($$option['identifier']==$key) { ?>
 class="cur"
<? } ?>
><?php echo $choice?></a>
<? } } ?>
</div>
<? } } ?>
<div><span>发布时间</span>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=0"
<?php if(!$time) { ?>
 class="cur"
<? } ?>
>不限</a>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=3"
<?php if($time==3) { ?>
 class="cur"
<? } ?>
>三天内</a>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=7"
<?php if($time==7) { ?>
 class="cur"
<? } ?>
>一周内</a>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=30"
<?php if($time==30) { ?>
 class="cur"
<? } ?>
>一个月内</a>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $areaid?>&streetid=<?php echo $streetid?>&time=90"
<?php if($time==90) { ?>
 class="cur"
<? } ?>
>三个月内</a>
</div>
<div><span>查找区域</span>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=0&streetid=<?php echo $streetid?>&time=<?php echo $time?>"
<?php if(!$areaid) { ?>
 class="cur"
<? } ?>
>不限</a>
<?php if(is_array($citydata['area'])) { foreach($citydata['area'] as $area) { ?>
<a href="<?php echo $BASESCRIPT?>?category=<?php echo $category?>&areaid=<?php echo $area['areaid']?>&streetid=<?php echo $streetid?>&time=<?php echo $time?>"
<?php if($areaid==$area['areaid']) { ?>
 class="cur"
<? } ?>
><?php echo $area['areaname']?></a>
<? } } ?>
</div>
<div class="clear"></div>
</div>
<div class="left">
<table border="0" cellpadding="0" cellspacing="0" class="post-list">
<?php if(is_array($threads)) { foreach($threads as $tt) { ?>
<tr>
<td class="time"><?php echo $tt['pbtime']?></td>
<td><a href="<?php echo $category?>/<?php echo $tt['tid']?>.html" target="_blank"><?php echo $tt['title']?></a>　<span><?php echo $tt['areaname']?></span></td> 
<td></td>
</tr>
<? } } ?>
</table>
<div id="ad2">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 468x60, 创建于 10-6-8 */
google_ad_slot = "1272396633";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript"></script>
</div>
<div class="page"><?php echo $pagelink?></div>
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
</div>
<div class="clear"></div>
</div>
<?php include template('footer'); ?>
