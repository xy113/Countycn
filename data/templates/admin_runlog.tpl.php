<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>运行记录</span>
</div>
<div class="main-div">
<div class="titlediv"><b>运行记录</b>　总计<?php echo $totalrecords?>条记录</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="80"><?php echo $lang['cplog_admin']?></th>
  <th width="300"><?php echo $lang['cplog_body']?></th>
  <th><?php echo $lang['cplog_requesturi']?></th>
  <th width="120"><?php echo $lang['cplog_ipaddr']?></th>
  <th width="100" class="last"><?php echo $lang['cplog_time']?></th>
</tr>
<?php if(is_array($cplogs)) { foreach($cplogs as $log) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><?php echo $log['username']?></td>
  <td><?php echo $log['body']?></td>
  <td><?php echo $log['requesturi']?></td>
  <td><a href="http://www.ip138.com/ips.asp?ip=<?php echo $log['ipaddr']?>" target="_blank"><?php echo $log['ipaddr']?></a></td>
  <td><?php echo $log['dateline']?></td>
</tr>
<? } } ?>
<tr>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
</td>
</tr>
  </table>
</div>