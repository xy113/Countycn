<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>信息分类管理</span>
<span>信息分类列表</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>信息分类列表</strong></div>
  <form method="post" name="categories" action="<?php echo $BASESCRIPT?>?action=category">
  <input type="hidden" name="submit" value="true" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <thead>
<tr>
  <th width="50">ID</th>
  <th width="280">分类名称</th>
  <th width="180">英文名称或拼音</th>
  <th width="80">排序</th>
  <th width="80">信息数</th>
  <th>选项</th>
</tr>
</thead>
<?php if(is_array($categories['0'])) { foreach($categories['0'] as $cat) { ?>
<tbody id="body_<?php echo $cat['cid']?>">
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><?php echo $cat['cid']?></td>
  <td><input type="text" class="text groupbox" name="newcat[<?php echo $cat['cid']?>][cname]" value="<?php echo $cat['cname']?>">　<a href="###" onclick="addcat(<?php echo $cat['cid']?>)" class="addcat">添加子分类</a></td>
  <td><input type="text" class="text catbox" name="newcat[<?php echo $cat['cid']?>][pinyin]" value="<?php echo $cat['pinyin']?>"></td>
  <td><input type="text" class="text order" name="newcat[<?php echo $cat['cid']?>][displayorder]" value="<?php echo $cat['displayorder']?>"></td>
  <td><?php echo $cat['records']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=category&operation=edit&cid=<?php echo $cat['cid']?>">编辑</a> <a href="<?php echo $BASESCRIPT?>?action=category&operation=delete&cid=<?php echo $cat['cid']?>">删除</a></td>
</tr>
<?php if(is_array($categories[$cat['cid']])) { foreach($categories[$cat['cid']] as $category) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><?php echo $category['cid']?></td>
  <td>|－<input type="text" class="text catbox" name="newcat[<?php echo $category['cid']?>][cname]" value="<?php echo $category['cname']?>"></td>
  <td><input type="text" class="text catbox" name="newcat[<?php echo $category['cid']?>][pinyin]" value="<?php echo $category['pinyin']?>"></td>
  <td><input type="text" class="text order" name="newcat[<?php echo $category['cid']?>][displayorder]" value="<?php echo $category['displayorder']?>"></td>
  <td><?php echo $category['records']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=category&operation=edit&cid=<?php echo $category['cid']?>">编辑</a> <a href="<?php echo $BASESCRIPT?>?action=category&operation=delete&cid=<?php echo $category['cid']?>">删除</a></td>
</tr>
<? } } ?>
</tbody>
<? } } ?>
<tbody id="newcat"></tbody>
<tr>
  <td></td>
  <td colspan="5"><div class="addtr"><a href="javascript:;" onclick="addgroup()">添加新分类</a></div></td>
</tr>
<tr>
<td colspan="6">
<input type="submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" />
</td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
function addgroup(){
$("#newcat").append('<tr><td><input type="hidden" name="newfid[]" value="0" /></td><td><input type="text" class="text groupbox" name="newcname[]" value="新分类名称"></td>'+
  '<td><input type="text" class="text catbox" name="newpinyin[]"></td><td><input type="text" class="text order" name="neworder[]" value="0"></td>'+
  '<td></td><td></td></tr>');
}
function addcat(fid){
$("#body_"+fid).append('<tr><td><input type="hidden" name="newfid[]" value="'+fid+'" /></td>'+
  '<td>|－<input type="text" class="text catbox" name="newcname[]" value="新子分类名称"></td>'+
  '<td><input type="text" class="text catbox" name="newpinyin[]"></td> <td><input type="text" class="text order" name="neworder[]" value="0"></td><td><?php echo $category['records']?></td><td></td></tr>');
}
</script>