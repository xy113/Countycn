<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $thread['title']?>_<?php echo $catdata['cname']?>_<?php echo $citydata['cityname']?>_<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $thread['title']?>" />
<meta name="description" content="<?php echo $thread['description']?>" />
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/static/images/css.css">
</head>

<body>
<div class="wrap" id="top2">
<span>
<?php if($_XCOOKIE['username'] && $_XCOOKIE['password']) { ?>
<a href="<?php echo $config['siteurl']?>/profile.php"><?php echo $_XCOOKIE['username']?></a>��
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">�˳���¼</a>  
<? } else { ?>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">���ע��</a> | 
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">��Ա��¼</a> | 
<? } ?>
<a href="/post.php?cityid=<?php echo $thread['cityid']?>&amp;cid=<?php echo $thread['cid']?>">
<b>��ѷ�����Ϣ</b></a>
</span>
<a href="/"><img src="/static/images/logo-small.png" border="0" class="logo" align="left" /></a>��
<b><a href="http://<?php echo $citydata['cityhost']?>.<?php echo $config['domain']?>"><?php echo $citydata['cityname']?></a></b>
<a href="<?php echo $config['siteurl']?>">[�л�����]</a>��
<a href="http://<?php echo $citydata['cityhost']?>.<?php echo $config['domain']?>"><?php echo $citydata['cityname']?>������Ϣ</a> > 
<a href="http://<?php echo $citydata['cityhost']?>.<?php echo $config['domain']?>/<?php echo $CACHE['categories'][$catdata['fid']]['pinyin']?>.html"><?php echo $CACHE['categories'][$catdata['fid']]['cname']?></a> > 
<a href="http://<?php echo $citydata['cityhost']?>.<?php echo $config['domain']?>/<?php echo $catdata['pinyin']?>.html"><?php echo $catdata['cname']?></a> 
</div>
<div class="wrap">
<div class="tishi">�����й�������������<font color="#FF0000">��ǰ���</font>����<font color="#FF0000">�����潻��</font>�Ķ���ƭ�ӣ�</div>
<h1 class="posttitle"><?php echo $thread['title']?></h1>
<div class="posttime">
<span>��Ϣ��ţ�<?php echo $thread['postno']?>����<a href="/edit.php?tid=<?php echo $thread['tid']?>">�޸�</a> | <a href="/edit.php?action=delete&amp;tid=<?php echo $thread['tid']?>">ɾ��</a><!-- | <a href="#">�ö�</a> --></span>
����ʱ�䣺<?php echo $thread['pbtime']?>������Ϣ����� <?php echo $thread['views']?> �� </div>
</div>
<div class="wrap" id="detail">
<div class="left">
<div id="postdetail">
<div class="contact" id="dv1">
<div>�ص㣺<?php echo $citydata['cityname']?> 
<?php if($thread['areaname']) { ?>
- <?php echo $thread['areaname']?>
<? } ?>
 
<?php if($thread['streetname']) { ?>
- <?php echo $thread['streetname']?>
<? } ?>
</div>
<div>��ϵ�ˣ�<?php echo $thread['contactto']?></div>
<div>��ϵ�绰��<img src="/source/include/image.php?txt=<?php echo $thread['tel']?>" align="absmiddle" />��<a href="http://www.ip138.com:8080/search.asp?action=mobile&amp;mobile=<?php echo $thread['tel']?>" target="_blank">��ѯ���������</a></div>
<?php if($thread['userim']) { ?>
<div>QQ��<img src="/source/include/image.php?txt=<?php echo $thread['userim']?>" align="absmiddle" /></div>
<? } ?>
</div>
<?php if($threadoptions) { ?>
<div class="extra" id="dv2">
<ul>
<?php if(is_array($threadoptions)) { foreach($threadoptions as $option) { ?>
<li><?php echo $option['title']?>��<?php echo $option['value']?></li>
<? } } ?>
</ul>
</div>
<? } ?>
<div class="blank"></div>
<p class="body"><?php echo $thread['body']?></p>
</div>
<div class="ad3">
<script type="text/javascript">
/*728*90��������2011-5-21*/
var cpro_id = "u483185";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div>
<div class="ad3">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 728x90, ������ 10-5-27 */
google_ad_slot = "4644227153";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript"></script>
</div>
</div>
<div class="right">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 250x250, ������ 10-6-8 */
google_ad_slot = "0436908022";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript"></script>
<div class="blank"></div>
<script type="text/javascript">
/*250*250��������2011-7-8*/
var cpro_id = "u532828";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div>
<div class="clear"></div>
</div>
<?php include template('footer'); ?>
