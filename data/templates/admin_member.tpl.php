<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>����û�</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�û�����</strong>
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu">����</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=add" class="cmenu-on">���</a>
</div>
    <form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=member&operation=add" onsubmit="return checkForm()">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td class="bold" width="360">�û���</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[username]" id="username" class="text" value="" /></td>
        <td>������������գ��������Ժ��¼�ظ�</td>
      </tr>
      <tr>
        <td class="bold">����</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="password" name="membernew[password]" id="password" class="text" value="" /></td>
        <td>������������գ�����6λ�ַ�</td>
      </tr>
      <tr>
        <td class="bold">�����ʼ�</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[email]" id="email" class="text" value="" /></td>
        <td>�������������</td>
      </tr>
  <tr>
        <td class="bold">�û���</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select name="membernew[groupid]" class="text">
<optgroup label="��Ա�û���">
<?php if(is_array($usergroups['member'])) { foreach($usergroups['member'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="ϵͳ�û���">
<?php if(is_array($usergroups['system'])) { foreach($usergroups['system'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="�Զ����û���">
<?php if(is_array($usergroups['custom'])) { foreach($usergroups['custom'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
        <td></td>
      </tr>
  <tr>
  	<td colspan="2"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /></td>
  </tr>
    </table>
    </form>
</div>
<script type="text/javascript">
function checkForm(){
if(!$("#username").val()){
dialog("<p>�û����������գ����������롣</p>",{title:'������'});
return false;
}
if(($("#password").val()).length<6){
dialog("<p>���������������6λ�ַ������������롣</p>",{title:'������'});
return false;
}
if(!$("#email").val()){
dialog("<p>�����ʼ��������գ����������롣</p>",{title:'������'});
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�༭�û�</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�û�����<?php echo $user['username']?>(UID:<?php echo $user['uid']?>)</strong>
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu">����</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=edit&uid=<?php echo $uid?>" class="cmenu-on">�༭</a>
</div>
    <form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=member&operation=edit">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="uid" value="<?php echo $user['uid']?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td class="bold" width="360">�û���</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[username]" id="username" class="text" value="<?php echo $user['username']?>" readonly="" /></td>
        <td>�����޸�</td>
      </tr>
      <tr>
        <td class="bold">����</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="password" name="membernew[password]" id="password" class="text" value="" /></td>
        <td>����6λ�ַ��������޸�������</td>
      </tr>
      <tr>
        <td class="bold">�����ʼ�</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[email]" id="email" class="text" value="<?php echo $user['email']?>" /></td>
        <td>�������������</td>
      </tr>
  <tr>
        <td class="bold">�û���</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select name="membernew[groupid]" class="text">
<optgroup label="��Ա�û���">
<?php if(is_array($usergroups['member'])) { foreach($usergroups['member'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"
<?php if($user['groupid']==$group['groupid']) { ?>
 selected="selected"
<? } ?>
><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="ϵͳ�û���">
<?php if(is_array($usergroups['system'])) { foreach($usergroups['system'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"
<?php if($user['groupid']==$group['groupid']) { ?>
 selected="selected"
<? } ?>
><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="�Զ����û���">
<?php if(is_array($usergroups['custom'])) { foreach($usergroups['custom'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"
<?php if($user['groupid']==$group['groupid']) { ?>
 selected="selected"
<? } ?>
><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
        <td></td>
      </tr>
  <tr><td colspan="2"><input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" /></td></tr>
    </table>
    </form>
</div>
<script type="text/javascript">
$("#form1").submit(function(){
if($("#password").val() && ($("#password").val()).length<6){
alert("���������������6λ");
return false;
}
})
</script>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�û��б�</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<form method="get" name="search" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="text" class="text search" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="button" value="<?php echo $lang['search']?>" />
</form>
</span>
<strong>�û�����</strong>���ܼ�<?php echo $totalrecords?>����¼��
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu-on">����</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=add" class="cmenu">���</a>
</div>
<form method="post" name="member" action="<?php echo $BASESCRIPT?>?action=member">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
  <th width="160">�û���</th>
  <th width="120">�û���</th>
  <th width="140">ע������</th>
  <th width="140">����¼ʱ��</th>
  <th width="120">����¼IP</th>
  <th width="100">������</th>
  <th width="100">ӵ�вƸ�</th>
  <th></th>
</tr>
<?php if(is_array($users)) { foreach($users as $user) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td>
<?php if((!$isfounder && $user['adminid']) || $user['isfounder']) { ?>
<input type="checkbox" class="checkbox" disabled="disabled" />
<? } else { ?>
<input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $user['uid']?>" />
<? } ?>
</td>
  <td><?php echo $user['username']?></td>
  <td><?php echo $user['groupname']?></td>
  <td><?php echo $user['regdate']?></td>
  <td><?php echo $user['lastvisit']?></td>
  <td><a href="http://www.ip138.com/ips.asp?ip=<?php echo $user['lastip']?>" target="_blank"><?php echo $user['lastip']?></a></td>
  <td><?php echo $user['posts']?></td>
  <td><?php echo $user['credits']?></td>
  <td>
<?php if(($user['adminid'] && $isfounder) || !$user['adminid']) { ?>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=edit&uid=<?php echo $user['uid']?>&page=<?php echo $page?>">�༭</a>
<? } ?>
</td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="8">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('keywords=<?php echo $keywords?>&page=<?php echo $page?>')" />
</td>
</tr>
  </table>
 </form>
</div>
<? } ?>
