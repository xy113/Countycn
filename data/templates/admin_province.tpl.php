<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��������</span>
<span>ʡ������</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>ʡ������</strong></div>
  <form method="post" name="province" action="<?php echo $BASESCRIPT?>?action=province">
  <input type="hidden" name="submit" value="yes" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
  <th width="120">ʡ����</th>
  <th width="120">ƴ��</th>
  <th>����</th>
</tr>
<tbody id="provincelist">
<?php if(is_array($provinces)) { foreach($provinces as $pp) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $pp['provinceid']?>" onclick="checkThis(this)" /></td>
  <td><input name="newprovince[<?php echo $pp['provinceid']?>][provincename]" value="<?php echo $pp['provincename']?>" class="text" style="width:100px;" /></td>
  <td><input name="newprovince[<?php echo $pp['provinceid']?>][provincepy]" value="<?php echo $pp['provincepy']?>" class="text" style="width:100px;" /></td>
  <td><input name="newprovince[<?php echo $pp['provinceid']?>][displayorder]" value="<?php echo $pp['displayorder']?>" class="text" style="width:40px;" /></td>
</tr>
<? } } ?>
</tbody>
<tr>
<td></td>
<td colspan="3"><div class="addtr" id="addnew"><a href="javascript:;" onclick="addgroup()">��������</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" /></td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
$("#addnew").click(function(){
$("#provincelist").append('<tr><td></td><td><input class="text" style="width:100px;" name="newprovincename[]" /></td><td><input class="text" style="width:100px;" name="newprovincepy[]" /></td>'+
  '<td><input class="text" style="width:40px;" name="neworder" value="0" /></td><td></td></tr>');
});
</script>