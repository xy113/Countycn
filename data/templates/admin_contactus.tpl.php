<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add'||$operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>联系人信息设置</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>联系人信息设置</strong>　
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>" class="cmenu">管理</a>
<?php if($operation=='add') { ?>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=add" class="cmenu-on">新增</a>
<? } else { ?>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=edit&id=<?php echo $id?>" class="cmenu-on">编辑</a>
<? } ?>
</div>
<form method="post" name="contactus" action="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=<?php echo $operation?>">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="id" value="<?php echo $contact['id']?>">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <tr>
      <td class="bold" width="360">联系人</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[name]" value="<?php echo $contact['name']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">联系电话</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[tel]" value="<?php echo $contact['tel']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">移动电话</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[mobile]" value="<?php echo $contact['mobile']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">电子邮件</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[email]" value="<?php echo $contact['email']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">传真</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[fax]" value="<?php echo $contact['fax']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">QQ号码</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[qq]" value="<?php echo $contact['qq']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">MSN</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[msn]" value="<?php echo $contact['msn']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">邮政编码</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[postcode]" value="<?php echo $contact['postcode']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">联系地址</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[address]" value="<?php echo $contact['address']?>"></td>
      <td>&nbsp;</td>
    </tr>
<tr>
<td colspan="2"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>"></td>
</tr>
  </table>
 </form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>联系人信息设置</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>联系人信息设置</strong>　
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>" class="cmenu-on">管理</a>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=add" class="cmenu">新增</a>
</div>
<form name="contact" method="post" action="<?php echo $BASESCRIPT?>?action=<?php echo $action?>">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="120">联系人</th>
  <th width="120">联系电话</th>
  <th width="120">移动电话</th>
  <th width="160">电子邮件</th>
  <th width="120">传真</th>
  <th width="120">QQ</th>
  <th width="160">MSN</th>
  <th></th>
</tr>
<?php if(is_array($messages)) { foreach($messages as $con) { ?>
<tr onMouseOver="this.className='hover'" onMouseOut="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $con['id']?>" onClick="checkThis(this)" /></td>
  <td><?php echo $con['name']?></td>
  <td><?php echo $con['tel']?></td>
  <td><?php echo $con['mobile']?></td>
  <td><?php echo $con['email']?></td>
  <td><?php echo $con['fax']?></td>
  <td><?php echo $con['qq']?></td>
  <td><?php echo $con['msn']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=contactus&operation=edit&id=<?php echo $con['id']?>">编辑</a></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="8">
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" name="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" />
</td>
</tr>
  </table>
  </form>
</div>
<? } ?>
