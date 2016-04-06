<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>信息管理</span>
<span>分类信息选项</span>
</div>
<div class="main-div">
  <div class="titlediv"><b>分类信息选项</b>　
  <span id="tab-menu">
  <a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption&classid=0" id="menu_0">类别管理</a>
  
<?php if(is_array($optiontypes)) { foreach($optiontypes as $tc) { ?>
  <a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption&classid=<?php echo $tc['optionid']?>" id="menu_<?php echo $tc['optionid']?>"><?php echo $tc['title']?></a>
  
<? } } ?>
  </span>
  </div>
  
<?php if($classid) { ?>
  <form method="post" name="typeoptions" action="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption&classid=<?php echo $classid?>">
  <input type="hidden" name="submit" value="true" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  	<tbody id="typeoption">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
  <th width="200">选项名称</th>
  <th width="200">变量名</th>
  <th width="160">类型</th>
  <th width="80">显示顺序</th>
  <th>选项</th>
</tr>
<?php if(is_array($typeoptions)) { foreach($typeoptions as $to) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $to['optionid']?>" onclick="checkThis(this)" /></td>
  <td><input name="newoption[<?php echo $to['optionid']?>][title]" value="<?php echo $to['title']?>" type="text" class="text text100"></td>
  <td><input name="newoption[<?php echo $to['optionid']?>][identifier]" value="<?php echo $to['identifier']?>" type="text" class="text text100"></td>
  <td><?php echo $lang['typeoption'][$to['type']]?> (<?php echo $to['type']?>)</td>
  <td><input name="newoption[<?php echo $to['optionid']?>][displayorder]" value="<?php echo $to['displayorder']?>" type="text" class="text order"></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=optiondetail&optionid=<?php echo $to['optionid']?>">编辑</a></td>
</tr>
<? } } ?>
</tbody>
<tbody>
    <tr><td></td><td colspan="5"><div class="addtr"><a href="javascript:;" id="addtr">添加新选项</a></div></td></tr>
<tr><td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td><td colspan="5">
<input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('operation=typeoption&classid=<?php echo $classid?>')" />
</td></tr>
</tbody>
  </table>
  </form>
  
<? } else { ?>
  <form method="post" name="optioncat" action="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption">
  <input type="hidden" name="submit" value="true" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  	<tbody id="typeoptioncat">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
  <th width="260">类别名称</th>
  <th width="80">显示顺序</th>
  <th></th>
</tr>
<?php if(is_array($optiontypes)) { foreach($optiontypes as $ot) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $ot['optionid']?>" onclick="checkThis(this)" /></td>
  <td><input type="text" class="text catbox" name="newclass[<?php echo $ot['optionid']?>][title]" value="<?php echo $ot['title']?>"></td>
  <td><input type="text" class="text order" name="newclass[<?php echo $ot['optionid']?>][displayorder]" value="<?php echo $ot['displayorder']?>"></td>
  <td></td>
</tr>
<? } } ?>
</tbody>
<tbody>
<tr><td></td><td colspan="3"><div class="addtr"><a href="javascript:;" id="addcat">添加新分类</a></div></td></tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="3">
<input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('operation=typeoption')" />
</td>
</tr>
</tbody>
  </table>
  </form>
  
<? } ?>
</div>
<script type="text/javascript">
$("#tab-menu a").attr("class","cmenu");
$("#menu_<?php echo $classid?>").attr("class","cmenu-on");
$("#addtr").click(function(){
$("#typeoption").append('<tr><td></td><td><input type="text" class="text text100" name="newtitle[]"></td><td><input type="text" class="text text100" name="newidentifier[]"></td>'+
'<td><select name="newtype[]" class="text" style="width:140px;"><option selected="" value="text">字串(text)</option><option value="number">数字(number)</option>'+
'<option value="radio">单选(radio)</option><option value="checkbox">多选(checkbox)</option><option value="textarea">文本(textarea)</option><option value="select">选择(select)</option>'+
'<option value="calendar">日历(calendar)</option><option value="email">电子邮件(email)</option><option value="url">超级链接(url)</option><option value="image">图片(image)</option>'+
'</select></td><td><input type="text" class="text order" name="newdisplayorder[]" value="0"></td><td></td></tr>');
});
$("#addcat").click(function(){
$("#typeoptioncat").append('<tr><td></td><td><input type="text" class="text catbox" name="newclassname[]" value=""></td><td><input type="text" class="text order" name="newclassorder[]" value=""></td><td></td></tr>');
})
</script>