<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='view') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�鿴��ϸ</span>
</div>
<div class="main-div">
<div class="titlediv"><b><?php echo $feedback['subject']?></b></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td>Ͷ����</td>
        <td width="160"><?php echo $feedback['username']?></td>
        <td width="80">Ͷ��ʱ��</td>
        <td><?php echo $feedback['dateline']?></td>
      </tr>
   <tr>
        <td>��ϵ�绰</td>
        <td><?php echo $feedback['tel']?></td>
        <td>�����ʼ�</td>
        <td><?php echo $feedback['email']?></td>
      </tr>
      <tr>
        <td>Ͷ������</td>
        <td colspan="3"></td>
      </tr>
  <tr>
  	<td colspan="4"><?php echo $feedback['message']?></td>
  </tr>
    </table>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�����б�</span>
</div>
<div class="main-div">
<div class="titlediv"><b>�û�����</b></div>
<form method="post" name="feedback" action="<?php echo $BASESCRIPT?>?action=feedback">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <tr>
      <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')"> ɾ?</th>
      <th>����</th>
      <th width="100">Ͷ����</th>
      <th width="100">��ϵ�绰</th>
      <th width="150">�����ʼ�</th>
      <th width="150">Ͷ��ʱ��</th>
      <th width="80">&nbsp;</th>
    </tr>
<?php if(is_array($messages)) { foreach($messages as $mm) { ?>
    <tr>
      <td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $mm['id']?>"></td>
      <td><?php echo $mm['subject']?></td>
      <td><?php echo $mm['username']?></td>
      <td><?php echo $mm['tel']?></td>
      <td><?php echo $mm['email']?></td>
      <td><?php echo $mm['dateline']?></td>
      <td><a href="javascript:;" onclick="ViewMsg(<?php echo $mm['id']?>)">�鿴��ϸ</a></td>
    </tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="6">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="<?php echo $lang['drop']?>">
  		<a class="button" href="javascript:;" onclick="LoadPage('<?php echo $querystring?>')"><span><?php echo $lang['refresh']?></span></a>
</td>
</tr>
  	</table>
</form>
</div>
<? } ?>
<script type="text/javascript">
function ViewMsg(id){
//window.open(ADMINSCRIPT+'?action=street&areaid='+areaid);
var sw=Math.floor((window.screen.width/2-300));
    var sh=Math.floor((window.screen.height/2-300));
window.open(ADMINSCRIPT+'?action=feedback&operation=view&id='+id,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}
</script>