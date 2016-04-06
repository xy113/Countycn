<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='newmail') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>系统工具</span>
<span>电子邮件</span>
<span>新邮件</span>
</div>
<div class="main-div">
<div class="titlediv">
<b>电子邮件</b>　
<a href="<?php echo $BASESCRIPT?>?action=email" class="cmenu">管理</a> 
<a href="<?php echo $BASESCRIPT?>?action=email&operation=edit&mailid=<?php echo $mailid?>" class="cmenu-on">新邮件</a>
</div>
<form method="post" name="newmail" action="<?php echo $BASESCRIPT?>?action=email&operation=newmail&mailid=<?php echo $mailid?>">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <td width="360" class="bold">邮件主题</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="newmail[subject]" value="<?php echo $mail['subject']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">收件人</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="newmail[mailto]" value="<?php echo $mail['mailto']?>"></td>
        <td>必填，多个收件人请用 “;” 隔开</td>
      </tr>
      <tr>
        <td class="bold">发件人</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="newmail[mailfrom]" value="<?php echo $mail['mailfrom']?>"></td>
        <td>可选</td>
      </tr>
      <tr>
        <td class="bold">同时发送给所有会员<input type="checkbox" class="checkbox" name="mailtoall" value="1"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">邮件内容</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $fckeditor?></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>"></td>
      </tr>
    </table>
</form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>系统工具</span>
<span>电子邮件</span>
</div>
<div class="main-div">
<div class="titlediv">
<b>电子邮件</b>　
<a href="<?php echo $BASESCRIPT?>?action=email" class="cmenu-on">管理</a> 
<a href="<?php echo $BASESCRIPT?>?action=email&operation=newmail" class="cmuenu">新邮件</a>
</div>
<form name="mails" method="post" action="<?php echo $BASESCRIPT?>?action=email">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')"> 删?</th>
<th width="300">主题</th>
<th width="160">发送人</th>
<th>收件人</th>
<th width="160">发送时间</th>
<th width="80"></th>
  </tr>
  
<?php if(is_array($mails)) { foreach($mails as $mail) { ?>
  <tr>
<td><input type="checkbox" class="checkbox" name="delete[]" value="<?php echo $mail['mailid']?>"></td>
<td><?php echo $mail['subject']?></td>
<td><?php echo $mail['mailfrom']?></td>
<td><?php echo $mail['mailto']?></td>
<td><?php echo $mail['dateline']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=email&operation=newmail&mailid=<?php echo $mail['mailid']?>">重新发送</a></td>
  </tr>
  
<? } } ?>
  <tr>
  	<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')"> 删?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" name="button-submit" value="<?php echo $lang['submit']?>" class="button">
<input type="button" name="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('page=<?php echo $page?>')">
</td>
  </tr>
</table>
</form>
</div>
<? } ?>
