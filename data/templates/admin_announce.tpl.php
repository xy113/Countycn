<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>ϵͳ����</span>
<span>��������</span>
</div>
<div class="main-div">
<div class="titlediv"><b>ϵͳ����</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=add" class="cmenu-on">��������</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=announce&operation=add" onSubmit="return checkForm()">
<input type="hidden" name="submit" value="yes">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[title]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">������</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[poster]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="article[message]" class="text" style="height:200px;"></textarea></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>"></td>
  <td>&nbsp;</td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
function checkForm(){
if(!$("input[name='article[title]']").val()){
alert("���ⲻ������Ŷ");
return false;
}
if(!$("textarea[name='article[message]']").val()){
alert("���ݲ�������Ŷ");
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>ϵͳ����</span>
<span>�༭����</span>
</div>
<div class="main-div">
<div class="titlediv"><b>ϵͳ����</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=edit&id=<?php echo $id?>" class="cmenu-on">�༭����</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=announce&operation=edit">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="id" value="<?php echo $id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[title]" value="<?php echo $article['title']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">������</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[poster]" value="<?php echo $article['poster']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="article[message]" class="text" style="height:200px;"><?php echo $article['message']?></textarea></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>"></td>
  <td>&nbsp;</td>
</tr>
  </table>
  </form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>ϵͳ����</span>
<span>�������</span>
</div>
<div class="main-div">
<div class="titlediv"><b>ϵͳ����</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu-on">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=add" class="cmenu">��������</a>
</div>
<form name="announce" method="post" action="<?php echo $BASESCRIPT?>?action=announce">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</th>
        <th>����</th>
        <th width="100">������</th>
        <th width="160">����ʱ��</th>
        <th width="80">&nbsp;</th>
      </tr>
  
<?php if(is_array($articles)) { foreach($articles as $article) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $article['id']?>"></td>
        <td><?php echo $article['title']?></td>
        <td><?php echo $article['poster']?></td>
        <td><?php echo $article['dateline']?></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=announce&operation=edit&id=<?php echo $article['id']?>">�༭</a></td>
      </tr>
  
<? } } ?>
  <tr>
  	<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</td>
<td colspan="4"><input type="submit" class="button" value="<?php echo $lang['submit']?>"> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onClick="LoadPage('page=<?php echo $page?>')"></td>
  </tr>
  </table>
  </form>
</div>
<? } ?>
