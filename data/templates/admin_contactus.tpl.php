<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add'||$operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��ϵ����Ϣ����</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>��ϵ����Ϣ����</strong>��
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>" class="cmenu">����</a>
<?php if($operation=='add') { ?>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=add" class="cmenu-on">����</a>
<? } else { ?>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=edit&id=<?php echo $id?>" class="cmenu-on">�༭</a>
<? } ?>
</div>
<form method="post" name="contactus" action="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=<?php echo $operation?>">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="id" value="<?php echo $contact['id']?>">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <tr>
      <td class="bold" width="360">��ϵ��</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[name]" value="<?php echo $contact['name']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">��ϵ�绰</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[tel]" value="<?php echo $contact['tel']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">�ƶ��绰</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[mobile]" value="<?php echo $contact['mobile']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">�����ʼ�</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[email]" value="<?php echo $contact['email']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">����</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[fax]" value="<?php echo $contact['fax']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">QQ����</td>
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
      <td class="bold">��������</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="contactnew[postcode]" value="<?php echo $contact['postcode']?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="bold">��ϵ��ַ</td>
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
<span>��ϵ����Ϣ����</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>��ϵ����Ϣ����</strong>��
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>" class="cmenu-on">����</a>
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&operation=add" class="cmenu">����</a>
</div>
<form name="contact" method="post" action="<?php echo $BASESCRIPT?>?action=<?php echo $action?>">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> ɾ?</td>
  <th width="120">��ϵ��</th>
  <th width="120">��ϵ�绰</th>
  <th width="120">�ƶ��绰</th>
  <th width="160">�����ʼ�</th>
  <th width="120">����</th>
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
  <td><a href="<?php echo $BASESCRIPT?>?action=contactus&operation=edit&id=<?php echo $con['id']?>">�༭</a></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="8">
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" name="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" />
</td>
</tr>
  </table>
  </form>
</div>
<? } ?>
