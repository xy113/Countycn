<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>分类管理</span>
<span>合并分类</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>合并分类</strong></div>
<p>核心提示：分类合并后源分类的帖子全部转入目标分类，同时删除源分类。</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=category&operation=merger">
<input type="hidden" name="submit" value="true" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">请选择源分类</td>
    <td></td>
  </tr>
  <tr>
    <td>
<select name="source[]" size="20" multiple="multiple" class="text" style="font-size:14px;">
<?php if(is_array($categories['0'])) { foreach($categories['0'] as $cat) { ?>
<optgroup label="<?php echo $cat['cname']?>">
<?php if(is_array($categories[$cat['cid']])) { foreach($categories[$cat['cid']] as $cc) { ?>
<option value="<?php echo $cc['cid']?>"><?php echo $cc['cname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
</select>
</td>
    <td>按住CTRL键可同时选择多个分站，源分类的帖子全部转入目标分类，同时删除源分类。</td>
  </tr>
  <tr>
    <td class="bold">请选择目标分类</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<select name="target" class="text" style="font-size:14px;">
<?php if(is_array($categories['0'])) { foreach($categories['0'] as $cat) { ?>
<optgroup label="<?php echo $cat['cname']?>">
<?php if(is_array($categories[$cat['cid']])) { foreach($categories[$cat['cid']] as $cc) { ?>
<option value="<?php echo $cc['cid']?>"><?php echo $cc['cname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
</select>
</td>
    <td>选择目标分类，目标分类不能存在于已选择的源分类中</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" class="button" name="button-submit" value="合并" /></td>
  </tr>
</table>
</form>
</div>