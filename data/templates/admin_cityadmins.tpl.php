<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>分站管理</span>
<span>编辑管理员</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>编辑管理员</strong></div>
  <form name="form1" method="post" action="">
  	<input type="hidden" name="formsubmit" value="yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> 删?</th>
        <th width="80">显示顺序</th>
        <th width="180">用户名</th>
        <th>用户组</th>
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
        <td>新增：</td>
        <td><input type="text" class="text text60" name="neworder" value="0"></td>
        <td><input type="text" class="text text160" name="newusername"></td>
        <td>
<select name="newadminid">
<option value="1">系统管理员</option>
<option value="2" selected="selected">分站管理员</option>
</select>
</td>
      </tr>
  <tr>
  	<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> 删?</td>
<td colspan="3"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></td>
  </tr>
    </table>
    </form>
</div>
