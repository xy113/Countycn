<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $keywords?>_<?php echo $config['sitename']?></title>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<link href="static/images/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="top">
<div class="wrap">
<?php if($_XCOOKIE['username'] && $_XCOOKIE['password']) { ?>
<span>
<a href="profile.php"><?php echo $_XCOOKIE['username']?></a>��
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?action=logout&next='+encodeURIComponent(location.href);return false;">�˳���¼</a>  
</span>
<? } else { ?>
<span>
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/register.php?next='+encodeURIComponent(location.href);return false;">���ע��</a>  
<a href="javascript:;" onclick="window.location='<?php echo $config['siteurl']?>/login.php?next='+encodeURIComponent(location.href);return false;">��Ա��¼</a>
</span>
<? } ?>

<?php if($city) { ?>
<a href="/"><b><?php echo $citydata['cityname']?></b></a>
<? } ?>
 <a href="<?php echo $config['siteurl']?>">[�л�����]</a>
</div>
</div>
<div class="banner">
<div class="wrap">
<a href="/post.php?cid=<?php echo $catdata['cid']?>" class="btn-post"><b></b>��ѷ�����Ϣ</a>
<span class="logo"><img src="/static/images/logo.gif" border="0" /></span>
<div class="sreachbox">
<form method="get" action="search.php" onsubmit="if($('#s-keyword').val()){return true}else{alert('������һ���ؼ���');return false;}">
<input type="hidden" name="city" value="<?php echo $city?>" />
<input type="hidden" name="cid" value="<?php echo $catdata['cid']?>" />
<input type="text" class="search-key" name="keywords" id="s-keyword" value="<?php echo $keywords?>" />
<input type="submit" class="search-btn" value="����" />
</form>
</div>
</div>
</div>
<div class="blank"></div>
<div class="wrap" id="detail">
<div class="yourpos">
<a href="/"><?php echo $citydata['cityname']?>������Ϣ</a> >  
<?php if($catdata['fid']) { ?>
<a href="/<?php echo $CACHE['categories'][$catdata['fid']]['pinyin']?>.html"><?php echo $CACHE['categories'][$catdata['fid']]['cname']?></a> > <?php echo $catdata['cname']?>
<?php } elseif($cid) { ?>
<?php echo $catdata['cname']?> > 
<? } ?>
��ѯ���
</div> 
<div class="choose">
<div><span>��ѯ���</span><em>(���ҵ�<?php echo $totalrecords?>������<font color="#FF0000"><?php echo $keywords?></font>����Ϣ)</em></div>
<?php if($citydata['cid'] && !$catdata['fid']) { ?>
<div>
<span>�ӷ���</span><a href="" class="cur">����</a>
<?php if(is_array($CACHE['categories'])) { foreach($CACHE['categories'] as $cat) { ?>
<?php if($cat['fid']==$cid) { ?>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=<?php echo $time?>&keywords=<?php echo $keywords?>"><?php echo $cat['cname']?></a>
<? } } } ?>
</div>
<? } ?>
<div><span>����ʱ��</span>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=0&keywords=<?php echo $keywords?>"
<?php if(!$time) { ?>
 class="cur"
<? } ?>
>����</a>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=3&keywords=<?php echo $keywords?>"
<?php if($time==3) { ?>
 class="cur"
<? } ?>
>������</a>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=7&keywords=<?php echo $keywords?>"
<?php if($time==7) { ?>
 class="cur"
<? } ?>
>һ����</a>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=30&keywords=<?php echo $keywords?>"
<?php if($time==30) { ?>
 class="cur"
<? } ?>
>һ������</a>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $areaid?>&time=90&keywords=<?php echo $keywords?>"
<?php if($time==90) { ?>
 class="cur"
<? } ?>
>��������</a>
</div>
<div><span>��������</span>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=0&time=<?php echo $time?>&keywords=<?php echo $keywords?>"
<?php if(!$areaid) { ?>
 class="cur"
<? } ?>
>����</a>
<?php if(is_array($citydata['area'])) { foreach($citydata['area'] as $area) { ?>
<a href="<?php echo $BASESCRIPT?>?city=<?php echo $city?>&cid=<?php echo $cid?>&streetid=<?php echo $streetid?>&areaid=<?php echo $area['areaid']?>&time=<?php echo $time?>&keywords=<?php echo $keywords?>"
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
<td><a href="<?php echo $tt['pinyin']?>/<?php echo $tt['tid']?>.html" target="_blank"><?php echo $tt['title']?></a>��<span><?php echo $tt['areaname']?></span></td> 
<td></td>
</tr>
<? } } ?>
</table>
<div id="ad2">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7306822352785197";
/* 468x60, ������ 10-6-8 */
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
/* 250x250, ������ 10-6-8 */
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
