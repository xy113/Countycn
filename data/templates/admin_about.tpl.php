<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ�����Ϣ</span>
<span>���</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��վ�����Ϣ</b>
<a href="<?php echo $BASESCRIPT?>?action=about" class="cmenu">����</a>
<a href="<?php echo $BASESCRIPT?>?action=about&operation=add" class="cmenu-on">���</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=about&operation=add" onSubmit="return checkForm()">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="articlenew[title]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">�ؼ���</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="articlenew[keywords]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><?php echo $fckeditor?></td>
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
if(!$("input[name='articlenew[title]']").val()){
alert("���ⲻ������Ŷ");
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ�����Ϣ</span>
<span>�༭</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��վ�����Ϣ</b>
<a href="<?php echo $BASESCRIPT?>?action=about" class="cmenu">����</a>
<a href="<?php echo $BASESCRIPT?>?action=about&operation=edit&id=<?php echo $id?>" class="cmenu-on">�༭</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=about&operation=edit">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="id" value="<?php echo $id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="articlenew[title]" value="<?php echo $article['title']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">�ؼ���</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="articlenew[keywords]" value="<?php echo $article['keywords']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><?php echo $fckeditor?></td>
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
<span>��վ�����Ϣ</span>
<span>��Ϣ����</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��վ�����Ϣ</b>
<a href="<?php echo $BASESCRIPT?>?action=about" class="cmenu-on">����</a>
<a href="<?php echo $BASESCRIPT?>?action=about&operation=add" class="cmenu">���</a>
</div>
<form name="announce" method="post" action="<?php echo $BASESCRIPT?>?action=about">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</th>
        <th>����</th>
        <th width="100">����޸���</th>
        <th width="160">����ʱ��</th>
        <th width="80">&nbsp;</th>
      </tr>
  
<?php if(is_array($articles)) { foreach($articles as $article) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $article['id']?>"></td>
        <td><?php echo $article['title']?></td>
        <td><?php echo $article['author']?></td>
        <td><?php echo $article['dateline']?></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=about&operation=edit&id=<?php echo $article['id']?>">�༭</a></td>
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
