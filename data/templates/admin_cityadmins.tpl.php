<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ����</span>
<span>�༭����Ա</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�༭����Ա</strong></div>
  <form name="form1" method="post" action="">
  	<input type="hidden" name="formsubmit" value="yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</th>
        <th width="80">��ʾ˳��</th>
        <th width="180">�û���</th>
        <th>�û���</th>
      </tr>
  
<?php if(is_array($users)) { foreach($users as $user) { ?>
      <tr>
        <td><input type="checkbox" class="checked" name="delete[]" value="<?php echo $user['uid']?>"></td>
        <td><input type="text" class="text text60" name="displayorder[<?php echo $user['uid']?>]" value="<?php echo $user['displayorder']?>"></td>
        <td><?php echo $user['username']?></td>
        <td><?php echo $user['groupname']?></td>
      </tr>
  
<? } } ?>
   <tr>
        <td>������</td>
        <td><input type="text" class="text text60" name="neworder" value="0"></td>
        <td><input type="text" class="text text160" name="newusername"></td>
        <td>
<select name="newadminid">
<option value="1">ϵͳ����Ա</option>
<option value="2" selected="selected">��վ����Ա</option>
</select>
</td>
      </tr>
  <tr>
  	<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</td>
<td colspan="3"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></td>
  </tr>
    </table>
    </form>
</div>
