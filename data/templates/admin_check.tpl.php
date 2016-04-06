<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>文件权限检查</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>文件权限检查</strong></div>
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="300">文件名</th>
        <th width="80">可读</th>
        <th width="80">可写</th>
        <th width="80">可执行</th>
<th>修改时间</th>
      </tr>
  
<?php if($parent) { ?>
      <tr>
        <td><img src="<?php echo $parent['img']?>" border="0" align="absmiddle"> <a href="<?php echo $parent['folderlink']?>"><?php echo $parent['filename']?></a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
<td></td>
      </tr>
  
<? } ?>
  
<?php if(is_array($folders)) { foreach($folders as $fd) { ?>
      <tr>
        <td><img src="<?php echo $fd['img']?>" border="0" align="absmiddle"> <a href="<?php echo $fd['folderlink']?>"><?php echo $fd['filename']?></a></td>
        <td><img src="/static/images/yes.gif" border="0"></td>
        <td><img src="/static/images/
<?php if($fd['writeable']) { ?>
yes.gif
<? } else { ?>
no.gif
<? } ?>
" border="0"></td>
<td></td>
        <td><?php echo $fd['filetime']?></td>
      </tr>
  
<? } } ?>
  
<?php if(is_array($filelist)) { foreach($filelist as $ff) { ?>
      <tr>
        <td><img src="<?php echo $ff['img']?>" border="0" align="absmiddle"> <?php echo $ff['filename']?></td>
        <td><img src="/static/images/
<?php if($ff['readable']) { ?>
yes.gif
<? } else { ?>
no.gif
<? } ?>
" border="0"></td>
        <td><img src="/static/images/
<?php if($ff['writeable']) { ?>
yes.gif
<? } else { ?>
no.gif
<? } ?>
" border="0"></td>
<td><img src="/static/images/
<?php if($ff['execable']) { ?>
yes.gif
<? } else { ?>
no.gif
<? } ?>
" border="0"></td>
        <td><?php echo $ff['filetime']?></td>
      </tr>
  
<? } } ?>
    </table>
</div>
