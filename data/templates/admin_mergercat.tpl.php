<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�������</span>
<span>�ϲ�����</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�ϲ�����</strong></div>
<p>������ʾ������ϲ���Դ���������ȫ��ת��Ŀ����࣬ͬʱɾ��Դ���ࡣ</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=category&operation=merger">
<input type="hidden" name="submit" value="true" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">��ѡ��Դ����</td>
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
    <td>��סCTRL����ͬʱѡ������վ��Դ���������ȫ��ת��Ŀ����࣬ͬʱɾ��Դ���ࡣ</td>
  </tr>
  <tr>
    <td class="bold">��ѡ��Ŀ�����</td>
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
    <td>ѡ��Ŀ����࣬Ŀ����಻�ܴ�������ѡ���Դ������</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" class="button" name="button-submit" value="�ϲ�" /></td>
  </tr>
</table>
</form>
</div>