<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>数据统计</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
选择年份
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
<strong>数据统计</strong>
</div>
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
      <tr>
        <th width="100">分站名称</th>
        <th width="70">十二月</th>
        <th width="70">十一月</th>
        <th width="70">十月</th>
        <th width="70">九月</th>
        <th width="70">八月</th>
        <th width="70">七月</th>
        <th width="70">六月</th>
        <th width="70">五月</th>
        <th width="70">四月</th>
        <th width="70">三月</th>
        <th width="70">二月</th>
        <th width="70">一月</th>
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
<a href="javascript:;" class="button" onclick="if(confirm('此操作比较耗费系统资源，若无需要请不要频繁操作。')){window.open(baseurl+'&operation=export&year=<?php echo $year?>');}"><span>保存为CSV表</span></a>
</td>
  </tr>
    </table>
</div>
