<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>����ͳ��</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
ѡ�����
<select name="year" onchange="window.location.href=baseurl+'&year='+this.value">
<option value="2012"
<?php if($year=='2012') { ?>
 selected="selected"
<? } ?>
>2012</option>
<option value="2011"
<?php if($year=='2011') { ?>
 selected="selected"
<? } ?>
>2011</option>
<option value="2010"
<?php if($year=='2010') { ?>
 selected="selected"
<? } ?>
>2010</option>
<option value="2009"
<?php if($year=='2009') { ?>
 selected="selected"
<? } ?>
>2009</option>
<option value="2008"
<?php if($year=='2008') { ?>
 selected="selected"
<? } ?>
>2008</option>
</select>
</span>
<strong>����ͳ��</strong>
</div>
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="100">��վ����</th>
        <th width="70">ʮ����</th>
        <th width="70">ʮһ��</th>
        <th width="70">ʮ��</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">����</th>
        <th width="70">һ��</th>
      </tr>
  
<?php if(is_array($cities)) { foreach($cities as $city) { ?>
      <tr onmouseover="this.className='hover'" onmouseout="this.className=''">
        <td><strong><?php echo $city['cityname']?></strong></td>
        <td><?php echo $city['month12']?></td>
        <td><?php echo $city['month11']?></td>
        <td><?php echo $city['month10']?></td>
        <td><?php echo $city['month9']?></td>
        <td><?php echo $city['month8']?></td>
        <td><?php echo $city['month7']?></td>
        <td><?php echo $city['month6']?></td>
        <td><?php echo $city['month5']?></td>
        <td><?php echo $city['month4']?></td>
        <td><?php echo $city['month3']?></td>
        <td><?php echo $city['month2']?></td>
        <td><?php echo $city['month1']?></td>
      </tr>
  
<? } } ?>
  <tr>
  	<td colspan="13"><span class="pagebox"><?php echo $pagelink?></span>
<a href="javascript:;" class="button" onclick="if(confirm('�˲����ȽϺķ�ϵͳ��Դ��������Ҫ�벻ҪƵ��������')){window.open(baseurl+'&operation=export&year=<?php echo $year?>');}"><span>����ΪCSV��</span></a>
</td>
  </tr>
    </table>
</div>
