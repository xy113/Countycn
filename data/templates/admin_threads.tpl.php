<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��Ϣ����</span>
<span>��Ϣ�б�</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<form method="get" name="search" action="<?php echo $BASESCRIPT?>">
<?php if($admincp['adminid']==2) { ?>
<select name="cityid" class="select">
<option value="0">���з�վ</option>
<?php if(is_array($cities)) { foreach($cities as $city) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($city['cityid']==$cityid) { ?>
 selected="selected"
<? } ?>
><?php echo $city['cityname']?></option>
<? } } ?>
</select>
<? } else { ?>
<select name="cityid" class="select">
<option value="0">���з�վ</option>
<?php if(is_array($letters)) { foreach($letters as $ll) { ?>
<optgroup label="<?php echo $ll?>">
<?php if(is_array($cities[$ll])) { foreach($cities[$ll] as $city) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($city['cityid']==$cityid) { ?>
 selected="selected"
<? } ?>
><?php echo $ll?>.<?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
</select>
<? } ?>
<input type="hidden" name="action" value="threads" />
<input type="text" class="text search" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="button" value="<?php echo $lang['search']?>" />
</form>
</span>
<strong>������Ϣ����</strong>���ܼ�<?php echo $totalrecords?>����¼
</div>
  <form method="post" name="threads" action="<?php echo $BASESCRIPT?>?action=threads">
  <input type="hidden" name="submit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th>����</th>
  <th width="100">������վ</th>
  <th width="120">��������</th>
  <th width="100">IP��ַ</th>
  <th width="140">IP��Դ</th>
  <th width="80">���</th>
  <th width="120">����ʱ��</th>
</tr>
<?php if(is_array($threads)) { foreach($threads as $tt) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $tt['tid']?>" onclick="checkThis(this)" /></td>
  <td><a href="http://<?php echo $tt['cityhost']?>.<?php echo $config['domain']?>/thread.php?category=<?php echo $tt['pinyin']?>&tid=<?php echo $tt['tid']?>" target="_blank"><?php echo $tt['title']?></a></td>
  <td><?php echo $tt['cityname']?></td>
  <td><?php echo $tt['cname']?></td>
  <td><?php echo $tt['ip']?></td>
  <td><?php echo $tt['ip2']?></td>
  <td><?php echo $tt['views']?></td>
  <td><?php echo $tt['dateline']?></td>
</tr>
<? } } ?>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="7">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" />
<input type="button" class="button" name="" value="<?php echo $lang['refresh']?>" onclick="LoadPage('<?php echo $querystring?>')" />
</td>
</tr>
  </table>
  </form>
</div>