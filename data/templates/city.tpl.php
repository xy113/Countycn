<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $config['sitename']?>-县域生活信息门户</title>
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="data/cache/city.js" type="text/javascript"></script>
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
<a href="register.php" class="btn-post"><b></b>免费注册会员</a>
<span class="logo"><img src="/static/images/logo.gif" border="0" /></span>
<div class="sreachbox">
<form method="get" action="search.php" onsubmit="if($('#s-keyword').val()){return true}else{alert('请输入一个关键字');return false;}">
<input type="hidden" name="city" value="" />
<input type="hidden" name="cid" value="0" />
<input type="text" class="search-key" id="s-keyword" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="search-btn" value="搜索" />
</form>
</div>
</div>
</div>
<div class="blank"></div>
<div class="wrap" id="city-select">
<strong>按照省份选择</strong>
<select id="id_province"></select>
<select id="id_city"></select>
<input type="button" value="确定" onclick="GoCity()" />　
<strong>或者</strong>　
<input type="text" id="cityhost" value="请输入拼音或城市名称或城市ID" style="width:220px;" />
<input type="button" id="gotocity" value="进入城市" onclick="window.location.href='<?php echo $config['siteurl']?>/index.php?keywords='+$('#cityhost').val()" />
</div>
<div class="wrap">
<?php if(is_array($letters)) { foreach($letters as $letter) { ?>
<div class="city-list">
<b><?php echo $letter?>.</b>
<?php if(is_array($CACHE['cities'])) { foreach($CACHE['cities'] as $city) { ?>
<?php if($city['cityletter']==$letter) { ?>
<a href="http://<?php echo $city['cityhost']?>.<?php echo $config['domain']?>"><?php echo $city['cityname']?></a>
<? } } } ?>
</div>
<? } } ?>
</div>
<div class="wrap flink">
<h3><span><a href="friendlink.php">申请友情链接</a></span>友情链接</h3>
<div>
<?php if(is_array($flinks)) { foreach($flinks as $link) { ?>
<a href="<?php echo $link['siteurl']?>" title="<?php echo $link['description']?>" target="_blank"><?php echo $link['sitename']?></a>
<? } } ?>
</div>
</div>
<script type="text/javascript">
selectCity("#id_province","#id_city",province,city); 
$("#cityhost").click(function(){
if(this.value == '请输入拼音或城市名称或城市ID')this.value='';
}).blur(function(){
if(this.value == '') this.value = '请输入拼音或城市名称或城市ID';
});
function selectCity(element1,element2,data1,data2){
$(element1).append('<option value="0">请选择省份</option>');
$(element2).append('<option value="0">请选择城市</option>');
for(var el1 in data1){
$(element1).append('<option value="'+el1+'">'+data1[el1]+'</option>');
}
$(element1).change(function(){
var data = data2[$(this).val()];
$(element2).empty();
for(var el2 in data){
$(element2).append('<option value="'+el2+'">'+data[el2]+'</option>');
}
})
}
function GoCity(){
if($("#id_city").val() != 0){
window.location.href = 'http://'+$("#id_city").val()+'.<?php echo $config['domain']?>';
}else{return false;}
}
</script>
<?php include template('footer'); ?>
