<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>信息提示-<?php echo $config['sitename']?></title>
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
<a href="/post.php?cityid=<?php echo $cityid?>&amp;cid=<?php echo $cid?>"><strong>免费发布信息</strong></a></span>
<a href="<?php echo $config['siteurl']?>"><img src="static/images/logo.gif" border="0" class="logo" /></a>
</div>
<div class="wrap">
<div id="sysmessage">
<?php if($msg_type==0) { ?>
<h1><img src="static/images/success.png" border="0" /> <?php echo $msg_detail?></h1>
<?php } elseif($msg_type==1) { ?>
<h1><img src="static/images/success.png" border="0" /> <?php echo $msg_detail?></h1>
<? } else { ?>
<h1><img src="static/images/confirm.gif" border="0" /> <?php echo $msg_detail?></h1>
<? } ?>
<?php if(is_array($links)) { foreach($links as $link) { ?>
<p><a href="<?php echo $link['href']?>"><?php echo $link['text']?></a></p>
<? } } ?>
</div>
</div>
<?php include template('footer'); ?>
