<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��������</span>
<span>��������</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��������</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=add" class="cmenu-on">���</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=faq&operation=add" onSubmit="return checkForm()">
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
  <td class="bold">��ʾ˳��</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[displayorder]" value="0"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">�ؼ���</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[keywords]"></td>
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
if(!$("input[name='article[title]']").val()){
alert("���ⲻ������Ŷ");
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��������</span>
<span>�༭����</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��������</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=edit&id=<?php echo $id?>" class="cmenu-on">�༭</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=faq&operation=edit" onSubmit="return checkForm()">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="id" value="<?php echo $id?>" />
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
  <td class="bold">��ʾ˳��</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[displayorder]" value="<?php echo $article['displayorder']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">�ؼ���</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[keywords]" value="<?php echo $article['keywords']?>"></td>
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
if(!$("input[name='article[title]']").val()){
alert("���ⲻ������Ŷ");
return false;
}
return true;
}
</script>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��������</span>
<span>�������</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��������</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu-on">�������</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=add" class="cmenu">���</a>
</div>
<form name="faq" method="post" action="<?php echo $BASESCRIPT?>?action=faq">
<input type="hidden" name="submit" value="yes" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</th>
        <th width="320">����</th>
        <th width="100">��ʾ˳��</th>
        <th>�ؼ���</th>
        <th width="80">&nbsp;</th>
      </tr>
  
<?php if(is_array($articles)) { foreach($articles as $article) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $article['id']?>"></td>
        <td><input type="text" class="text" name="article[<?php echo $article['id']?>][title]" value="<?php echo $article['title']?>" /></td>
        <td><input type="text" class="text order" name="article[<?php echo $article['id']?>][displayorder]" value="<?php echo $article['displayorder']?>" /></td>
        <td><input type="text" class="text" name="article[<?php echo $article['id']?>][keywords]" value="<?php echo $article['keywords']?>" /></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=faq&operation=edit&id=<?php echo $article['id']?>">�༭</a></td>
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
