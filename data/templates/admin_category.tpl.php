<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��Ϣ�������</span>
<span>��Ϣ�����б�</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>��Ϣ�����б�</strong></div>
  <form method="post" name="categories" action="<?php echo $BASESCRIPT?>?action=category">
  <input type="hidden" name="submit" value="true" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <thead>
<tr>
  <th width="50">ID</th>
  <th width="280">��������</th>
  <th width="180">Ӣ�����ƻ�ƴ��</th>
  <th width="80">����</th>
  <th width="80">��Ϣ��</th>
  <th>ѡ��</th>
</tr>
</thead>
<?php if(is_array($categories['0'])) { foreach($categories['0'] as $cat) { ?>
<tbody id="body_<?php echo $cat['cid']?>">
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><?php echo $cat['cid']?></td>
  <td><input type="text" class="text groupbox" name="newcat[<?php echo $cat['cid']?>][cname]" value="<?php echo $cat['cname']?>">��<a href="###" onclick="addcat(<?php echo $cat['cid']?>)" class="addcat">����ӷ���</a></td>
  <td><input type="text" class="text catbox" name="newcat[<?php echo $cat['cid']?>][pinyin]" value="<?php echo $cat['pinyin']?>"></td>
  <td><input type="text" class="text order" name="newcat[<?php echo $cat['cid']?>][displayorder]" value="<?php echo $cat['displayorder']?>"></td>
  <td><?php echo $cat['records']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=category&operation=edit&cid=<?php echo $cat['cid']?>">�༭</a> <a href="<?php echo $BASESCRIPT?>?action=category&operation=delete&cid=<?php echo $cat['cid']?>">ɾ��</a></td>
</tr>
<?php if(is_array($categories[$cat['cid']])) { foreach($categories[$cat['cid']] as $category) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><?php echo $category['cid']?></td>
  <td>|��<input type="text" class="text catbox" name="newcat[<?php echo $category['cid']?>][cname]" value="<?php echo $category['cname']?>"></td>
  <td><input type="text" class="text catbox" name="newcat[<?php echo $category['cid']?>][pinyin]" value="<?php echo $category['pinyin']?>"></td>
  <td><input type="text" class="text order" name="newcat[<?php echo $category['cid']?>][displayorder]" value="<?php echo $category['displayorder']?>"></td>
  <td><?php echo $category['records']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=category&operation=edit&cid=<?php echo $category['cid']?>">�༭</a> <a href="<?php echo $BASESCRIPT?>?action=category&operation=delete&cid=<?php echo $category['cid']?>">ɾ��</a></td>
</tr>
<? } } ?>
</tbody>
<? } } ?>
<tbody id="newcat"></tbody>
<tr>
  <td></td>
  <td colspan="5"><div class="addtr"><a href="javascript:;" onclick="addgroup()">����·���</a></div></td>
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
$("#newcat").append('<tr><td><input type="hidden" name="newfid[]" value="0" /></td><td><input type="text" class="text groupbox" name="newcname[]" value="�·�������"></td>'+
  '<td><input type="text" class="text catbox" name="newpinyin[]"></td><td><input type="text" class="text order" name="neworder[]" value="0"></td>'+
  '<td></td><td></td></tr>');
}
function addcat(fid){
$("#body_"+fid).append('<tr><td><input type="hidden" name="newfid[]" value="'+fid+'" /></td>'+
  '<td>|��<input type="text" class="text catbox" name="newcname[]" value="���ӷ�������"></td>'+
  '<td><input type="text" class="text catbox" name="newpinyin[]"></td> <td><input type="text" class="text order" name="neworder[]" value="0"></td><td><?php echo $category['records']?></td><td></td></tr>');
}
</script>