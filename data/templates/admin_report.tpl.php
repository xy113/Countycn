<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>信息管理</span>
<span>举报信息</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>举报信息</strong></div>
  <form method="post" name="report">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="200">标题</th>
  <th width="140">类型</th>
  <th>补充说明</th>
  <th width="80">IP地址</th>
  <th width="120">举报时间</th>
</tr>
<?php if(is_array($messages)) { foreach($messages as $mm) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $mm['id']?>" /></td>
  <td><a href="thread.php?tid=<?php echo $mm['tid']?>" target="_blank"><?php echo $mm['title']?></a></td>
  <td><?php echo $mm['typename']?></td>
  <td><?php echo $mm['body']?></td>
  <td><?php echo $mm['ipaddr']?></td>
  <td><?php echo $mm['dateline']?></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="<?php echo $lang['submit']?>" name="button-submit" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" name="" onclick="LoadPage('page=<?php echo $page?>')" />
</td>
</tr>
  </table>
  </form>
</div>