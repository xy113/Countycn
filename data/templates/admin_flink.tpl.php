<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>ϵͳ����</span>
<span>��������</span>
<span>���ӹ���</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��������</b>
<a href="<?php echo $BASESCRIPT?>?action=flink" class="cmenu">���ӹ���</a>
<a href="<?php echo $BASESCRIPT?>?action=flink&operation=edit&siteid=<?php echo $siteid?>" class="cmenu-on">�༭����</a>
</div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=flink&operation=edit">
<input type="hidden" name="submit" value="yes">
<input type="hidden" name="siteid" value="<?php echo $siteid?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold">��վ����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="flink[sitename]" value="<?php echo $flink['sitename']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">��վ��ַ</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="flink[siteurl]" value="<?php echo $flink['siteurl']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">LOGOͼƬ</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="flink[logo]" value="<?php echo $flink['logo']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">��ʾ˳��</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" class="text" name="flink[displayorder]" value="<?php echo $flink['displayorder']?>"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="bold">��վ����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="flink[description]" class="text"><?php echo $flink['description']?></textarea></td>
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
<span>��������</span>
<span>���ӹ���</span>
</div>
<div class="main-div">
<div class="titlediv"><b>��������</b></div>
<form method="post" name="flink" action="<?php echo $BASESCRIPT?>?action=flink">
<input type="hidden" name="submit" value="yes">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</th>
        <th width="150">��վ����</th>
        <th width="300">��վ��ַ</th>
        <th width="100">��ʾ˳��</th>
        <th width="80">�Ƿ���ʾ</th>
        <th>&nbsp;</th>
      </tr>
  <tbody id="flinklist">
  
<?php if(is_array($flinks)) { foreach($flinks as $link) { ?>
      <tr>
        <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $link['siteid']?>"></td>
        <td><input type="text" class="text" value="<?php echo $link['sitename']?>" name="flink[<?php echo $link['siteid']?>][sitename]" style="width:130px;"></td>
        <td><input type="text" class="text" value="<?php echo $link['siteurl']?>" name="flink[<?php echo $link['siteid']?>][siteurl]" style="width:210px;"></td>
        <td><input type="text" class="text order" value="<?php echo $link['displayorder']?>" name="flink[<?php echo $link['siteid']?>][displayorder]"></td>
        <td><input type="checkbox" class="checkbox" value="1" name="flink[<?php echo $link['siteid']?>][display]"
<?php if($link['display']) { ?>
 checked="checked"
<? } ?>
></td>
        <td><a href="<?php echo $BASESCRIPT?>?action=flink&operation=edit&siteid=<?php echo $link['siteid']?>">�༭</a></td>
      </tr>
  
<? } } ?>
  </tbody>
      <tr>
        <td></td>
        <td colspan="5"><div class="addtr"><a href="javascript:;" onclick="addLink()">��������</a></div></td>
      </tr>
  <tr>
        <td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')"> ɾ?</td>
        <td colspan="5">
<span class="pagebox" style="float:right;"><?php echo $pagelink?></span>
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>">
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('page=<?php echo $page?>')">
</td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
function addLink(){
$("#flinklist").append('<tr><td></td><td><input type="text" class="text" name="newsitename[]" style="width:130px;"></td>'+
        '<td><input type="text" class="text" name="newsiteurl[]" style="width:210px;"></td>'+
        '<td><input type="text" class="text order" name="neworder[]" value="0"></td><td><input type="checkbox" class="checkbox" value="1" name="newdisplay[]"></td><td></td></tr>');
}
</script>
<? } ?>
