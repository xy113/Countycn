<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>信息管理</span>
<span>分类信息选项</span>
<em><a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption&classid=<?php echo $option['classid']?>">返回</a></em>
</div>
<div class="main-div">
<div class="titlediv"><b>选项基本设置</b></div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=threadtypes&operation=optiondetail">
<input type="hidden" name="optionid" value="<?php echo $option['optionid']?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tbody>
      <tr>
        <td class="bold" width="360">选项名称</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[title]" value="<?php echo $option['title']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">变量名</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[identifier]" value="<?php echo $option['identifier']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">所属分类</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select  name="optionnew[classid]" class="text">
<?php if(is_array($optiontypes)) { foreach($optiontypes as $ot) { ?>
<option value="<?php echo $ot['optionid']?>"
<?php if($option['classid']==$ot['optionid']) { ?>
 selected="selected"
<? } ?>
><?php echo $ot['title']?></option>
<? } } ?>
</select>
</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">类型</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><select name="optionnew[type]" id="option_type" class="text"></select></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">排列顺序</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[displayorder]" value="<?php echo $option['displayorder']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold"></td>
        <td>&nbsp;</td>
      </tr>
  </tbody>
  <tbody class="rules" id="rule_text">
  <tr>
<td class="option">字串(text)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>内容最大长度（可选）:</b></p><input type="text" class="text" name="optionnew[rules][maxlength]"></td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_number">
  <tr>
<td class="option">数字(number)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<p><strong>最大值(可选)：</strong></p>
<input type="text" class="text" name="optionnew[rules][number][maxnum]" value="<?php echo $option['rules']['maxnum']?>"> 
<p><strong>最小值(可选)：</strong></p>
<input type="text" class="text" name="optionnew[rules][number][minnum]" value="<?php echo $option['rules']['minnum']?>">
</td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_radio">
  <tr>
<td class="option">单选(radio)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>选项内容:</b></p><textarea class="text" name="optionnew[rules][radio][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>只在项目为可选时有效，每行一个选项，等号前面为选项索引(建议用数字)，后面为内容，例如: <br>
  1 = 光电鼠标<br>
  2 = 机械鼠标<br>
  3 = 没有鼠标<br>
  注意: 选项确定后请勿修改索引和内容的对应关系，但仍可以新增选项。如需调换显示顺序，可以通过移动整行的上下位置来实现<br>
   </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_checkbox">
  <tr>
<td class="option">多选(checkbox)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>选项内容:</b></p><textarea class="text" name="optionnew[rules][checkbox][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>只在项目为可选时有效，每行一个选项，等号前面为选项索引(建议用数字)，后面为内容，例如: <br>
  1 = 光电鼠标<br>
  2 = 机械鼠标<br>
  3 = 没有鼠标<br>
  注意: 选项确定后请勿修改索引和内容的对应关系，但仍可以新增选项。如需调换显示顺序，可以通过移动整行的上下位置来实现<br>
    </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_textarea">
  <tr>
<td class="option">文本(textarea)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>内容最大长度（可选）:</b></p><input type="text" class="text" name="optionnew[rules][textarea][maxlength]" value="<?php echo $option['rules']['maxlength']?>"></td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_select">
  <tr>
<td class="option">选择(select)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>选项内容:</b></p><textarea class="text" name="optionnew[rules][select][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>只在项目为可选时有效，每行一个选项，等号前面为选项索引(建议用数字)，后面为内容，例如: <br>
  1 = 光电鼠标<br>
  2 = 机械鼠标<br>
  3 = 没有鼠标<br>
  注意: 选项确定后请勿修改索引和内容的对应关系，但仍可以新增选项。如需调换显示顺序，可以通过移动整行的上下位置来实现<br>
    </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_image">
  <tr>
<td class="option">图像(image)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<p><strong>图片最大宽度(可选)：</strong></p>
<input type="text" class="text" name="optionnew[rules][image][maxwidth]" value="<?php echo $option['rules']['maxwidth']?>"> 
<p><strong>图片最大高度(可选)：</strong></p>
<input type="text" class="text" name="optionnew[rules][image][maxheight]" value="<?php echo $option['rules']['maxheight']?>">
</td>
<td>&nbsp;</td>
  </tr>
  </tbody>
    </table>
<div class="toolbar"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></div>
</form>
</div>
<script type="text/javascript">
var options = {'text':'字串','number':'数字','radio':'单选','checkbox':'多选','textarea':'文本','select':'选择','calendar':'日历','email':'电子邮件','url':'超级链接','image':'图像'}
for(var option in options){
if(option == '<?php echo $option['type']?>'){
$("#option_type").append('<option value="'+option+'" selected>'+options[option]+'</option>');
}else{
$("#option_type").append('<option value="'+option+'">'+options[option]+'</option>');
}
}
$(".rules").hide();
$("#rule_<?php echo $option['type']?>").show();
$("#option_type").change(function(){
$(".rules").hide();
$("#rule_"+$(this).val()).show();
})
</script>