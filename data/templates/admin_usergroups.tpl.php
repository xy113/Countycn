<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�û���</span>
<span>�༭��Ȩ��</span>
<em><a href="<?php echo $BASESCRIPT?>?action=usergroups">����</a></em>
</div>
<div class="main-div">
  <div class="titlediv"><strong>�༭��Ȩ�� - <?php echo $usergroup['groupname']?>(groupid:<?php echo $usergroup['groupid']?>)</strong></div>
  <form name="usergroup" method="post" action="<?php echo $BASESCRIPT?>?action=usergroups&operation=edit">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="groupid" value="<?php echo $usergroup['groupid']?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td class="bold" width="260">����������</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="radio" name="usergroupnew[allowpost]" value="1"
<?php if($usergroup['allowpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="usergroupnew[allowpost]" value="0"
<?php if(!$usergroup['allowpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
  <td>�����Ƿ�����������</td>
</tr>
<tr>
  <td class="bold">����ظ�����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="radio" name="usergroupnew[allowreply]" value="1"
<?php if($usergroup['allowreply']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="usergroupnew[allowreply]" value="0"
<?php if(!$usergroup['allowreply']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
  <td>�����Ƿ�����ظ�����</td>
</tr>
<tr>
  <td class="bold">�����ϴ�����</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="radio" name="usergroupnew[allowpostattach]" value="1"
<?php if($usergroup['allowpostattach']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="usergroupnew[allowpostattach]" value="0"
<?php if(!$usergroup['allowpostattach']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
  <td>�����Ƿ������ϴ�����</td>
</tr>
<tr>
  <td class="bold">�������ظ���</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="radio" name="usergroupnew[allowgetattach]" value="1"
<?php if($usergroup['allowgetattach']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="usergroupnew[allowgetattach]" value="0"
<?php if(!$usergroup['allowgetattach']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
  <td>�����Ƿ��������ظ���</td>
</tr>
<tr>
  <td class="bold">����ʹ������</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="radio" name="usergroupnew[allowsearch]" value="1"
<?php if($usergroup['allowsearch']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="usergroupnew[allowsearch]" value="0"
<?php if(!$usergroup['allowsearch']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
  <td>�����Ƿ�����ʹ��վ������</td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="button" value="<?php echo $lang['submit']?>" name="button-submit" /></td>
</tr>
  </table>
  </form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>�û���</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>�û���</strong>��
  <span id="tab-menu"><a href="#" id="tab-member" class="cmenu">��Ա�û���</a> 
  <a href="#" id="tab-custom" class="cmenu">�Զ����û���</a> 
  <a href="#" id="tab-system" class="cmenu">ϵͳ�û���</a>
  </span>
  </div>
  <span id="table-content">
  <span id="table-member" style="display:none;">
  <form method="post" name="usergroup" action="<?php echo $BASESCRIPT?>?action=usergroups">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="type" value="member" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th width="30">��ID</th>
  <th width="200">��ͷ��</th>
  <th width="200">���ֽ���</th>
  <th>ѡ��</th>
</tr>
<?php if(is_array($usergroups['member'])) { foreach($usergroups['member'] as $group) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $group['groupid']?>" /></td>
  <td><?php echo $group['groupid']?></td>
  <td><input type="text" name="groupnew[<?php echo $group['groupid']?>][groupname]" value="<?php echo $group['groupname']?>" class="text text160"></td>
  <td>
<input type="text" name="groupnew[<?php echo $group['groupid']?>][creditslower]" value="<?php echo $group['creditslower']?>" class="text text60"> ~
<input type="text" name="groupnew[<?php echo $group['groupid']?>][creditshigher]" value="<?php echo $group['creditshigher']?>" class="text text60">
  </td>
  <td><a href="<?php echo $BASESCRIPT?>?action=usergroups&operation=edit&groupid=<?php echo $group['groupid']?>">�༭Ȩ��</a></td>
</tr>
<? } } ?>
<tbody id="membergroup"></tbody>
<tr>
  <td></td>
  <td colspan="4"><div class="addtr"><a href="javascript:;" id="addmembergroup">�����û���</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="4">
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" /> 
<input type="button" class="button" name="" value="<?php echo $lang['refresh']?>" onclick="LoadPage('type=member')" />
</td>
</tr>
  </table>
  </form>
  </span>
  <span id="table-custom" style="display:none;">
  <form method="post" name="specialgroup" action="<?php echo $BASESCRIPT?>?action=usergroups">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="type" value="custom" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th width="30">��ID</th>
  <th width="200">��ͷ��</th>
  <th>ѡ��</th>
</tr>
<?php if(is_array($usergroups['custom'])) { foreach($usergroups['custom'] as $group) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input type="checkbox" value="<?php echo $group['groupid']?>" disabled="disabled" /></td>
  <td><?php echo $group['groupid']?></td>
  <td><input type="text" name="groupnew[<?php echo $group['groupid']?>][groupname]" value="<?php echo $group['groupname']?>" class="text text160"></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=usergroups&operation=edit&groupid=<?php echo $group['groupid']?>">�༭Ȩ��</a></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="3">
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" name="" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('type=custom')" />
</td>
</tr>
  </table>
  </form>
  </span>
  <span id="table-system" style="display:none;">
  <form method="post" name="specialgroup" action="<?php echo $BASESCRIPT?>?action=usergroups">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="type" value="system" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th width="30">��ID</th>
  <th width="200">��ͷ��</th>
  <th>ѡ��</th>
</tr>
<?php if(is_array($usergroups['system'])) { foreach($usergroups['system'] as $group) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input type="checkbox" class="checkbox" disabled="disabled" /></td>
  <td><?php echo $group['groupid']?></td>
  <td><input type="text" name="groupnew[<?php echo $group['groupid']?>][groupname]" value="<?php echo $group['groupname']?>" class="text text160"></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=usergroups&operation=edit&groupid=<?php echo $group['groupid']?>">�༭Ȩ��</a></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="3">
<input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" />
<input type="button" name="" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('type=system')" />
</td>
</tr>
  </table>
  </form>
  </span>
  </span>
</div>
<script type="text/javascript">
var type = '<?php echo $type?>';
if(!type) type = 'member';
$("#table-"+type).show();
$("#tab-"+type).attr("class","cmenu-on");
$('#tab-menu a').click(function(){
$(this).attr("class","cmenu-on").siblings().attr("class","cmenu");
$("#table-content > span").eq($('#tab-menu a').index(this)).show().siblings().hide();
});
$("#addmembergroup").click(function(){
$("#membergroup").append('<tr><td></td><td></td><td><input type="text" name="newgroupname[]" value="�·�������" class="text text160"></td><td>'+
  	'<input type="text" name="newcreditslower[]" value="0" class="text text60"> ~ <input type="text" name="newcreditshigher[]" value="0" class="text text60"></td><td></td></tr>');
});
</script>
<? } ?>
