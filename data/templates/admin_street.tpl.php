<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>区域管理</span>
<span>街道管理</span>
</div>
<div class="main-div">
<div class="titlediv"><b>街道管理</b></div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=street" name="street">
<input type="hidden" name="areaid" value="<?php echo $areaid?>" />
<input type="hidden" name="submit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="100">显示顺序</th>
  <th>街道名称</th>
</tr>
<tbody id="streetlist">
<?php if(is_array($streets)) { foreach($streets as $street) { ?>
<tr onMouseOver="this.className='hover'" onMouseOut="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $street['streetid']?>" /></td>
  <td><input type="text" class="text order" name="newstreet[<?php echo $street['streetid']?>][displayorder]" value="<?php echo $street['displayorder']?>" /></td>
  <td><input type="text" class="text text200" name="newstreet[<?php echo $street['streetid']?>][streetname]" value="<?php echo $street['streetname']?>" /></td>
</tr>
<? } } ?>
</tbody>
<tr>
  <td></td>
  <td colspan="2"><div class="addtr"><a href="javascript:;" id="addstreet">新增街道</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="2"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('areaid=<?php echo $areaid?>')" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
$("#addstreet").click(function(){
$("#streetlist").append('<tr><td></td><td><input type="text" class="text order" name="neworder[]" value="0" /></td><td><input type="text" class="text text200" name="newstreetname[]" value="新街道名称" /></td></tr>');
});
</script>