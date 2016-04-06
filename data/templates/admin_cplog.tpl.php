<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span><?php echo $lang['cplog_manage']?></span>
<span><?php echo $lang['cplog_list']?></span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<input type="text" class="text search" id="keywords" value="<?php echo $keywords?>" />
<input type="button" class="button" value="<?php echo $lang['search']?>" onclick="window.location.href=baseurl+'&keywords='+$('#keywords').val();" />
</span>
<strong><?php echo $lang['cplog_list']?></strong>　总计<?php echo $totalrecords?>条记录
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="30"><input type="checkbox" class="checkbox" onclick="checkAll(this,'id[]')" /></td>
  <th width="60"><?php echo $lang['cplog_admin']?></th>
  <th width="300"><?php echo $lang['cplog_body']?></th>
  <th><?php echo $lang['cplog_requesturi']?></th>
  <th width="80"><?php echo $lang['cplog_ipaddr']?></th>
  <th width="100" class="last"><?php echo $lang['cplog_time']?></th>
</tr>
<?php if(is_array($cplogs)) { foreach($cplogs as $log) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="id[]" type="checkbox" value="<?php echo $log['id']?>" onclick="checkThis(this)" /></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=cplog&uid=<?php echo $log['uid']?>"><?php echo $log['username']?></a></td>
  <td><?php echo $log['body']?></td>
  <td><?php echo $log['requesturi']?></td>
  <td><a href="http://www.ip138.com/ips.asp?ip=<?php echo $log['ipaddr']?>" target="_blank"><?php echo $log['ipaddr']?></a></td>
  <td><?php echo $log['dateline']?></td>
</tr>
<? } } ?>
<tr>
<td colspan="6">
<span class="pagebox"><?php echo $pagelink?></span>
<a class="button" href="javascript:;" onclick="Delete('id[]','<?php echo $querystring?>')"><span><?php echo $lang['drop']?></span></a>
<a class="button" href="javascript:;" onclick="ClearAll()"><span><?php echo $lang['cplog_clear']?></span></a>
<a class="button" href="javascript:;" onclick="Export()"><span><?php echo $lang['cplog_export']?></span></a>
</td>
</tr>
  </table>
</div>
<script type="text/javascript">
function ClearAll(){
if(confirm('日志清空后将不能恢复，您确定要清空所有记录吗?')){
$.ajax({url:ajaxurl+'&operation=clearall',
beforSend:showloading("正在删除信息..."),
success:function(response){$("body").html(response)},
complete:closeloading()
})
}
}
function Export(){
window.open(baseurl+"&operation=export");
}
</script>