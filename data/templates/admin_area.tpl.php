<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='addnew') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�������</span>
<span>��������</span>
<em><a href="<?php echo $BASESCRIPT?>?action=area&cityid=<?php echo $cityid?>">����</a></em>
</div>
<div class="main-div">
<div class="titlediv"><strong>��������</strong></div>
<form method="post" name="areanew" action="<?php echo $BASESCRIPT?>?action=area&operation=save">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
    <tr>
      <td class="bold" width="360">������վ</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
  <select id="cityid" name="cityid" class="text">
<option value="0">���з�վ</option>
<?php if(is_array($CACHE['province'])) { foreach($CACHE['province'] as $province) { ?>
<optgroup label="<?php echo $province['provincename']?>">
<?php if(is_array($CACHE['cities'])) { foreach($CACHE['cities'] as $city) { ?>
<?php if($city['provinceid']==$province['provinceid']) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($cityid==$city['cityid']) { ?>
 selected="selected"
<? } ?>
><?php echo $city['cityname']?></option>
<? } } } ?>
</optgroup>
<? } } ?>
<optgroup label="����">
<?php if(is_array($CACHE['cities'])) { foreach($CACHE['cities'] as $city) { ?>
<?php if($city['provinceid']==0) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($cityid==$city['cityid']) { ?>
 selected="selected"
<? } ?>
><?php echo $city['cityname']?></option>
<? } } } ?>
</optgroup>
</select>
  </td>
      <td>ѡ������������վ</td>
    </tr>
    <tr>
      <td class="bold">��������</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><textarea class="text" name="areas" style="height:140px;"></textarea></td>
      <td>��д�������ƣ�ÿ��һ����</td>
    </tr>
  </table>
  <div class="toolbar"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></div>
  </form>
</div>
<?php } elseif($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�������</span>
<span>�༭����</span>
<em><a href="<?php echo $BASESCRIPT?>?action=area&cityid=<?php echo $area['cityid']?>">����</a></em>
</div>
<div class="main-div">
<div class="titlediv"><strong>�༭����<?php echo $area['areaname']?>(areaid:<?php echo $area['areaid']?>)</strong></div>
<form method="post" name="areanew" action="<?php echo $BASESCRIPT?>?action=area&operation=modify">
<input type="hidden" name="areaid" value="<?php echo $area['areaid']?>">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
      <td class="bold">��������</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" class="text" name="areaname" value="<?php echo $area['areaname']?>"></td>
      <td></td>
    </tr>
    <tr>
      <td class="bold" width="360">������վ</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
  <select id="cityid" name="cityid" class="text">
<option value="0">���з�վ</option>
<?php if(is_array($CACHE['province'])) { foreach($CACHE['province'] as $province) { ?>
<optgroup label="<?php echo $province['provincename']?>">
<?php if(is_array($CACHE['cities'])) { foreach($CACHE['cities'] as $city) { ?>
<?php if($city['provinceid']==$province['provinceid']) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($area['cityid']==$city['cityid']) { ?>
 selected="selected"
<? } ?>
><?php echo $city['cityname']?></option>
<? } } } ?>
</optgroup>
<? } } ?>
<optgroup label="����">
<?php if(is_array($CACHE['cities'])) { foreach($CACHE['cities'] as $city) { ?>
<?php if($city['provinceid']==0) { ?>
<option value="<?php echo $city['cityid']?>"
<?php if($area['cityid']==$city['cityid']) { ?>
 selected="selected"
<? } ?>
><?php echo $city['cityname']?></option>
<? } } } ?>
</optgroup>
</select>
  </td>
      <td>ѡ������������վ</td>
    </tr>
  </table>
  <div class="toolbar"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></div>
  </form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�������</span>
<span>�����б�</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<form name="search" method="get" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="cityid" value="<?php echo $cityid?>" />
<input type="text" class="text search" name="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="button" value="<?php echo $lang['search']?>" />
</form>
</span>
<strong>
<?php if($cityid) { ?>
 <?php echo $city['cityname']?> -
<? } ?>
�����б�</strong>���ܼ�<?php echo $totalrecords?>����¼
</div>
<form method="post" name="area" action="<?php echo $BASESCRIPT?>?action=area">
<input type="hidden" name="submit" value="yes" />
<input type="hidden" name="cityid" value="<?php echo $cityid?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th width="100">��ʾ˳��</th>
  <th width="300">��������</th>
  <th width="160">������վ</th>
  <th>ѡ��</th>
</tr>
<tbody id="arealist">
<?php if(is_array($areas)) { foreach($areas as $area) { ?>
<tr onMouseOver="this.className='hover'" onMouseOut="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $area['areaid']?>" /></td>
  <td><input type="text" class="text order" name="newarea[<?php echo $area['areaid']?>][displayorder]" value="<?php echo $area['displayorder']?>" /></td>
  <td><input type="text" class="text text200" name="newarea[<?php echo $area['areaid']?>][areaname]" value="<?php echo $area['areaname']?>" /></td>
  <td><?php echo $area['cityname']?></td>
  <td><a href="javascript:;" onclick="OpenStreet(<?php echo $area['areaid']?>)">�ֵ�����</a></td>
</tr>
<? } } ?>
</tbody>
<?php if($cityid) { ?>
<tr>
<td></td>
<td colspan="4"><div class="addtr"><a href="javascript:;" id="addarea">���������</a></div></td>
</tr>
<? } ?>
<tr>
<td><input type="checkbox" class="checkbox" onClick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="4">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /> 
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage('cityid=<?php echo $cityid?>&page=<?php echo $page?>')" />
</td>
</tr>
</table>
</form>
</div>
<? } ?>
<script type="text/javascript">
<?php if($cityid) { ?>
$("#addarea").click(function(){
$("#arealist").append('<tr><td></td><td><input type="text" class="text order" name="neworder[]" value="0" /></td><td><input type="text" class="text text200" name="newareaname[]" /></td><td></td><td></td></tr>');
});
<? } ?>
function OpenStreet(areaid){
//window.open(ADMINSCRIPT+'?action=street&areaid='+areaid);
var sw=Math.floor((window.screen.width/2-300));
    var sh=Math.floor((window.screen.height/2-300));
window.open(ADMINSCRIPT+'?action=street&areaid='+areaid,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}
</script>