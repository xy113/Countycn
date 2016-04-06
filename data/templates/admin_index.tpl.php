<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span><?php echo $lang['setting_system']?></span>
</div>
<div class="main-div">
<div class="titlediv"><strong>系统提示</strong></div>
<p>建议使用最新版Firefox浏览器，以达到最佳体验效果。　<a href="http://download.firefox.com.cn/releases/webins/4.0/zh-CN/Firefox-latest.exe" target="_blank">下载最新版Firefox浏览器。</a></p>
<p><!--<script src="http://www.songdewei.com/news.php?timestamp=<?php echo $timestamp?>" type="text/javascript"></script> --></p>
</div>
<div class="main-div">
<div class="pos-div2"><strong>开放团队</strong></div>
   <div class="blank"></div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td width="80" height="28">项目策划</td>
       <td>David Song</td>
     </tr>
     <tr>
       <td height="28">程序开发</td>
       <td>David Song</td>
     </tr>
     <tr>
       <td height="28">界面设计</td>
       <td>David Song</td>
     </tr>
     <tr>
       <td height="28">文档整理</td>
       <td>David Song</td>
     </tr>
    <tr>
      <td width="80" height="28">官方网址</td>
      <td><a href="http://www.songdewei.com" target="_blank">http://www.songdewei.com</a>　<a href="http://www.toking.cc" target="_blank">http://www.toking.cc</a></td>
    </tr>
    <tr>
      <td height="28">技术支持</td>
      <td>拓垦科技 QQ:<a href="tencent://message/?Uin=307718818" target="_blank">307718818</a> , MSN:<a href="msnim:chat?contact=songdewei@hotmail.com">songdewei@hotmail.com</a></td>
    </tr>
     <tr>
       <td width="80" height="28">版权所有</td>
       <td>&copy;2012-2099 <a href="http://www.toking.cc" target="_blank">北京拓垦科技有限公司</a>版权所有，并保留所有权利。</td>
     </tr>
     <tr>
       <td height="28">程序版本</td>
       <td>V1.0测试版。</td>
     </tr>
  </table>
</div>

<div class="main-div">
<div class="titlediv"><strong><?php echo $lang['server_info']?></strong></div>
  <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="90" height="30"><?php echo $lang['server_os']?>：</td>
      <td width="260" height="30"><?php echo $sys_info['os']?></td>
      <td width="100"><?php echo $lang['server_ip']?>：</td>
      <td><?php echo $sys_info['ip']?></td>
    </tr>
    
    <tr>
      <td height="30"><?php echo $lang['web_server']?>：</td>
      <td height="30"><?php echo $sys_info['web_server']?></td>
      <td><?php echo $lang['php_ver']?>：</td>
      <td><?php echo $sys_info['php_ver']?></td>
    </tr>
    <tr>
      <td height="30"><?php echo $lang['mysql_ver']?>：</td>
      <td height="30"><?php echo $sys_info['mysql_ver']?></td>
      <td><?php echo $lang['server_issocket']?>：</td>
      <td><?php echo $sys_info['socket']?></td>
    </tr>
    <tr>
      <td height="30"><?php echo $lang['server_iszlib']?>：</td>
      <td height="30"><?php echo $sys_info['zlib']?></td>
      <td><?php echo $lang['server_max_upload']?>：</td>
      <td><?php echo $sys_info['max_filesize']?></td>
    </tr>
    <tr>
      <td height="30"><?php echo $lang['safe_mode']?>：</td>
      <td height="30"><?php echo $sys_info['safe_mode']?></td>
      <td><?php echo $lang['safe_mode_gid']?>：</td>
      <td><?php echo $sys_info['safe_mode_gid']?></td>
    </tr>
    <tr>
      <td height="30"><?php echo $lang['gd_ver']?>：</td>
      <td height="30"><?php echo $sys_info['gd']?></td>
      <td><?php echo $lang['web_charset']?>：</td>
      <td><?php echo $sys_info['charset']?></td>
    </tr>
  </table>
  <div class="bottom-line"></div>
</div>