<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='add') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>用户管理</span>
<span>添加用户</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>用户管理</strong>
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu">管理</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=add" class="cmenu-on">添加</a>
</div>
    <form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=member&operation=add" onsubmit="return checkForm()">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td class="bold" width="360">用户名</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[username]" id="username" class="text" value="" /></td>
        <td>必填项，不能留空，不能与以后记录重复</td>
      </tr>
      <tr>
        <td class="bold">密码</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="password" name="membernew[password]" id="password" class="text" value="" /></td>
        <td>必填项，不能留空，至少6位字符</td>
      </tr>
      <tr>
        <td class="bold">电子邮件</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[email]" id="email" class="text" value="" /></td>
        <td>必填项，不能留空</td>
      </tr>
  <tr>
        <td class="bold">用户组</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select name="membernew[groupid]" class="text">
<optgroup label="会员用户组">
<?php if(is_array($usergroups['member'])) { foreach($usergroups['member'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="系统用户组">
<?php if(is_array($usergroups['system'])) { foreach($usergroups['system'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="自定义用户组">
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
dialog("<p>用户名不能留空，请重新输入。</p>",{title:'出错了'});
return false;
}
if(($("#password").val()).length<6){
dialog("<p>密码输入错误，至少6位字符，请重新输入。</p>",{title:'出错了'});
return false;
}
if(!$("#email").val()){
dialog("<p>电子邮件不能留空，请重新输入。</p>",{title:'出错了'});
return false;
}
return true;
}
</script>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>用户管理</span>
<span>编辑用户</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>用户管理　<?php echo $user['username']?>(UID:<?php echo $user['uid']?>)</strong>
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu">管理</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=edit&uid=<?php echo $uid?>" class="cmenu-on">编辑</a>
</div>
    <form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=member&operation=edit">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="uid" value="<?php echo $user['uid']?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td class="bold" width="360">用户名</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[username]" id="username" class="text" value="<?php echo $user['username']?>" readonly="" /></td>
        <td>不可修改</td>
      </tr>
      <tr>
        <td class="bold">密码</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="password" name="membernew[password]" id="password" class="text" value="" /></td>
        <td>至少6位字符，无需修改请留空</td>
      </tr>
      <tr>
        <td class="bold">电子邮件</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="membernew[email]" id="email" class="text" value="<?php echo $user['email']?>" /></td>
        <td>必填项，不能留空</td>
      </tr>
  <tr>
        <td class="bold">用户组</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select name="membernew[groupid]" class="text">
<optgroup label="会员用户组">
<?php if(is_array($usergroups['member'])) { foreach($usergroups['member'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"
<?php if($user['groupid']==$group['groupid']) { ?>
 selected="selected"
<? } ?>
><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="系统用户组">
<?php if(is_array($usergroups['system'])) { foreach($usergroups['system'] as $group) { ?>
<option value="<?php echo $group['groupid']?>"
<?php if($user['groupid']==$group['groupid']) { ?>
 selected="selected"
<? } ?>
><?php echo $group['groupname']?></option>
<? } } ?>
</optgroup>
<optgroup label="自定义用户组">
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
alert("密码输入错误，至少6位");
return false;
}
})
</script>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>用户管理</span>
<span>用户列表</span>
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
<strong>用户管理</strong>　总计<?php echo $totalrecords?>条记录　
<a href="<?php echo $BASESCRIPT?>?action=member" class="cmenu-on">管理</a>
<a href="<?php echo $BASESCRIPT?>?action=member&operation=add" class="cmenu">添加</a>
</div>
<form method="post" name="member" action="<?php echo $BASESCRIPT?>?action=member">
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="160">用户名</th>
  <th width="120">用户组</th>
  <th width="140">注册日期</th>
  <th width="140">最后登录时间</th>
  <th width="120">最后登录IP</th>
  <th width="100">发帖数</th>
  <th width="100">拥有财富</th>
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
<a href="<?php echo $BASESCRIPT?>?action=member&operation=edit&uid=<?php echo $user['uid']?>&page=<?php echo $page?>">编辑</a>
<? } ?>
</td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
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
