<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>系统公告</span>
<span>发布公告</span>
</div>
<div class="main-div">
<div class="titlediv"><b>系统公告</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu">公告管理</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=add" class="cmenu-on">发布公告</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=announce&operation=add" onSubmit="return checkForm()">
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
  <td class="bold">发布人</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[poster]"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">内容</td>
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
alert("标题不能留空哦");
return false;
}
if(!$("textarea[name='article[message]']").val()){
alert("内容不能留空哦");
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>系统公告</span>
<span>编辑公告</span>
</div>
<div class="main-div">
<div class="titlediv"><b>系统公告</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu">公告管理</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=edit&id=<?php echo $id?>" class="cmenu-on">编辑公告</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=announce&operation=edit">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="id" value="<?php echo $id?>">
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
  <td class="bold">发布人</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="article[poster]" value="<?php echo $article['poster']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">内容</td>
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
<span>系统公告</span>
<span>公告管理</span>
</div>
<div class="main-div">
<div class="titlediv"><b>系统公告</b>
<a href="<?php echo $BASESCRIPT?>?action=announce" class="cmenu-on">公告管理</a>
<a href="<?php echo $BASESCRIPT?>?action=announce&operation=add" class="cmenu">发布公告</a>
</div>
<form name="announce" method="post" action="<?php echo $BASESCRIPT?>?action=announce">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> 删?</th>
        <th>标题</th>
        <th width="100">发布人</th>
        <th width="160">发布时间</th>
        <th width="80">&nbsp;</th>
      </tr>
  
<?php if(is_array($articles)) { foreach($articles as $article) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $article['id']?>"></td>
        <td><?php echo $article['title']?></td>
        <td><?php echo $article['poster']?></td>
        <td><?php echo $article['dateline']?></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=announce&operation=edit&id=<?php echo $article['id']?>">编辑</a></td>
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
