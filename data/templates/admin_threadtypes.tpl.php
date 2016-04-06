<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>信息管理</span>
<span>分类信息模型</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>分类信息模型</strong></div>
  <form method="post" name="threadtypes" action="<?php echo $BASESCRIPT?>?action=threadtypes">
  <input type="hidden" name="submit" value="true" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  	<tbody id="threadtypes">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" name="drop0" value="0" onclick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="60">排序</th>
  <th width="260">模型名称</th>
  <th>描述</th>
  <th width="50">选项</th>
</tr>
<?php if(is_array($threadtypes)) { foreach($threadtypes as $tt) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $tt['typeid']?>" onclick="checkThis(this)" /></td>
  <td><input type="text" class="text order" name="threadtype[<?php echo $tt['typeid']?>][displayorder]" value="<?php echo $tt['displayorder']?>"></td>
  <td><input type="text" class="text" name="threadtype[<?php echo $tt['typeid']?>][typename]" value="<?php echo $tt['typename']?>" style="width:200px;"></td>
  <td><input type="text" class="text" name="threadtype[<?php echo $tt['typeid']?>][description]" value="<?php echo $tt['description']?>"></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typedetail&typeid=<?php echo $tt['typeid']?>">详情</a></td>
</tr>
<? } } ?>
</tbody>
<tbody>
    <tr>
      <td></td>
      <td colspan="4"><div class="addtr"><a href="javascript:;" onClick="Addtr()">添加新信息模型</a></div></td>
    </tr>
<tr>
<td><input type="checkbox" class="checkbox" name="drop1" value="0" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="4">
<input type="submit" name="buttun-submit" class="button" value="<?php echo $lang['submit']?>" /> 
<input type="button" name="button" class="button" onclick="LoadPage()" value="<?php echo $lang['refresh']?>" />
</td>
</tr>
</tbody>
  </table>
  </form>
</div>
<script type="text/javascript">
function Addtr(){
var str = '<tr><td></td><td><input type="text" class="text order" name="newdisplayorder[]" value=""></td>';
str+= '<td><input type="text" class="text" name="newtypename[]" value="" style="width:200px;"></td><td><input type="text" class="text" name="newdiscription[]" value=""></td><td></td></tr>';
$("#threadtypes").append(str);
}
</script>