<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��Ϣ����</span>
<span>�ٱ���Ϣ</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>�ٱ���Ϣ</strong></div>
  <form method="post" name="report">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
  <th width="200">����</th>
  <th width="140">����</th>
  <th>����˵��</th>
  <th width="80">IP��ַ</th>
  <th width="120">�ٱ�ʱ��</th>
</tr>
<?php if(is_array($messages)) { foreach($messages as $mm) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $mm['id']?>" /></td>
  <td><a href="thread.php?tid=<?php echo $mm['tid']?>" target="_blank"><?php echo $mm['title']?></a></td>
  <td><?php echo $mm['typename']?></td>
  <td><?php echo $mm['body']?></td>
  <td><?php echo $mm['ipaddr']?></td>
  <td><?php echo $mm['dateline']?></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="<?php echo $lang['submit']?>" name="button-submit" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" name="" onclick="LoadPage('page=<?php echo $page?>')" />
</td>
</tr>
  </table>
  </form>
</div>