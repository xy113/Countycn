<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>常见问题</span>
<span>新增问题</span>
</div>
<div class="main-div">
<div class="titlediv"><b>常见问题</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu">问题管理</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=add" class="cmenu-on">添加</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=faq&operation=add" onSubmit="return checkForm()">
<input type="hidden" name="submit" value="yes">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">标题</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[title]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">显示顺序</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[displayorder]" value="0"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">关键字</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[keywords]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">内容</td>
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
alert("标题不能留空哦");
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>常见问题</span>
<span>编辑问题</span>
</div>
<div class="main-div">
<div class="titlediv"><b>常见问题</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu">问题管理</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=edit&id=<?php echo $id?>" class="cmenu-on">编辑</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=faq&operation=edit" onSubmit="return checkForm()">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="id" value="<?php echo $id?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">标题</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[title]" value="<?php echo $article['title']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">显示顺序</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[displayorder]" value="<?php echo $article['displayorder']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">关键字</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[keywords]" value="<?php echo $article['keywords']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">内容</td>
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
alert("标题不能留空哦");
return false;
}
return true;
}
</script>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>常见问题</span>
<span>问题管理</span>
</div>
<div class="main-div">
<div class="titlediv"><b>常见问题</b>
<a href="<?php echo $BASESCRIPT?>?action=faq" class="cmenu-on">问题管理</a>
<a href="<?php echo $BASESCRIPT?>?action=faq&operation=add" class="cmenu">添加</a>
</div>
<form name="faq" method="post" action="<?php echo $BASESCRIPT?>?action=faq">
<input type="hidden" name="submit" value="yes" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> 删?</th>
        <th width="320">标题</th>
        <th width="100">显示顺序</th>
        <th>关键字</th>
        <th width="80">&nbsp;</th>
      </tr>
  
<?php if(is_array($articles)) { foreach($articles as $article) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $article['id']?>"></td>
        <td><input type="text" class="text" name="article[<?php echo $article['id']?>][title]" value="<?php echo $article['title']?>" /></td>
        <td><input type="text" class="text order" name="article[<?php echo $article['id']?>][displayorder]" value="<?php echo $article['displayorder']?>" /></td>
        <td><input type="text" class="text" name="article[<?php echo $article['id']?>][keywords]" value="<?php echo $article['keywords']?>" /></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=faq&operation=edit&id=<?php echo $article['id']?>">编辑</a></td>
      </tr>
  
<? } } ?>
  <tr>
  	<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> 删?</td>
<td colspan="4"><input type="submit" class="button" value="<?php echo $lang['submit']?>"> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onClick="LoadPage('page=<?php echo $page?>')"></td>
  </tr>
  </table>
  </form>
</div>
<? } ?>
