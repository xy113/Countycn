<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='merger') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ����</span>
<span>�ϲ���վ</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�ϲ���վ</strong></div>
<p>������ʾ����վ�ϲ���Դ��վ�����ݽ���ת�Ƶ�Ŀ���վ�У�Դ��վ����ɾ����</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=city&operation=merger" onsubmit="return confirm('��վ�ϲ���Դ��վ�����ݽ���ת�Ƶ�Ŀ���վ�У�Դ��վ����ɾ�����Ҳ��ָܻ�����ȷ��Ҫ�ϲ���?')">
<input type="hidden" name="submit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">��ѡ��Ҫ�ϲ��ķ�վ</td>
    <td></td>
  </tr>
  <tr>
    <td>
<select name="source[]" id="source-city" size="20" multiple="multiple" class="text" style="font-size:14px;">
<?php if(is_array($provinces)) { foreach($provinces as $pp) { ?>
<optgroup label="<?php echo $pp['provincename']?>">
<?php if(is_array($cities[$pp['provinceid']])) { foreach($cities[$pp['provinceid']] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
<optgroup label="����">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>ѡ��Ҫ�ϲ��ķ�վ����סCTRL����ͬʱѡ������վ</td>
  </tr>
  <tr>
    <td class="bold">��ѡ��Ŀ���վ</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<select name="target" class="text" style="font-size:14px;">
<?php if(is_array($provinces)) { foreach($provinces as $pp) { ?>
<optgroup label="<?php echo $pp['provincename']?>">
<?php if(is_array($cities[$pp['provinceid']])) { foreach($cities[$pp['provinceid']] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
<optgroup label="����">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>ѡ��Ŀ���վ��Ŀ���վ���ܴ�������ѡ���Դ��վ��</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="button-submit" class="button" value="�ϲ�" /></td>
  </tr>
</table>
</form>
</div>
<?php } elseif($operation=='move') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ����</span>
<span>�ƶ���վ</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>�ƶ���վ</strong></div>
<p>������ʾ����վ�ƶ���Դ��վ���ݽ���ת�Ƶ�Ŀ��ʡ���У��˲�������ı��վ���ú����ݡ�</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=city&operation=move">
<input type="hidden" name="submit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">��ѡ��Ҫ�ƶ��ķ�վ</td>
    <td></td>
  </tr>
  <tr>
    <td>
<select name="cityid[]" id="source-city" size="20" multiple="multiple" class="text" style="font-size:14px;">
<?php if(is_array($provinces)) { foreach($provinces as $pp) { ?>
<optgroup label="<?php echo $pp['provincename']?>">
<?php if(is_array($cities[$pp['provinceid']])) { foreach($cities[$pp['provinceid']] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
<? } } ?>
<optgroup label="����">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>ѡ��Ҫ�ƶ��ķ�վ����סCTRL����ͬʱѡ������վ</td>
  </tr>
  <tr>
    <td class="bold">��ѡ��Ŀ��ʡ��</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<select name="provinceid" class="text" style="font-size:14px;">
<?php if(is_array($provinces)) { foreach($provinces as $province) { ?>
<option value="<?php echo $province['provinceid']?>"><?php echo $province['provincename']?></option>
<? } } ?>
</select>
</td>
    <td>ѡ��Ŀ��ʡ��</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="button-submit" class="button" value="�ϲ�" /></td>
  </tr>
</table>
</form>
</div>
<? } else { ?>
<script type="text/javascript">
var provinceid = <?php echo $provinceid?>;
var data = {
<?php if(is_array($CACHE['province'])) { foreach($CACHE['province'] as $province) { ?>
'<?php echo $province['provinceid']?>':'<?php echo $province['provincename']?>',
<? } } ?>
}
var theoptions = '';
for(var key in data){
if(provinceid == key){
theoptions+= '<option value="'+key+'" selected="selected">'+data[key]+'</option>';
}else{
theoptions+= '<option value="'+key+'">'+data[key]+'</option>';
}
}
function loadprovince(province){
var province = province || 0;
var optionlist = '<option value="0">δָ��</option>';
for(var key in data){
if(data[key]){
if(key == province){
optionlist+= '<option value="'+key+'" selected="selected">'+data[key]+'</option>';
}else{
optionlist+= '<option value="'+key+'">'+data[key]+'</option>';
}
}
}
document.write(optionlist)
}
</script>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��վ����</span>
<span>��վ�б�</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<form method="get" name="search" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<select name="provinceid" id="provinceid" class="select" onchange="window.location.href=baseurl+'&provinceid='+this.value">
<option value="0">���з�վ</option>
</select>
<input type="text" class="text search" name="keywords" id="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="button" value="<?php echo $lang['search']?>" />
</form>
</span>
<strong>��վ����</strong>���ܼ�<?php echo $totalrecords?>����¼
</div>
  <form method="post" name="city" action="<?php echo $BASESCRIPT?>?action=city">
  <input type="hidden" name="submit" value="yes" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
  <th width="120">��������</th>
  <th width="160">ƴ��</th>
  <th width="80">����ĸ</th>
  <th width="60">����</th>
  <th width="220">����</th>
  <th width="120">����ʡ��</th>
  <th width="120">����Ա</th>
  <th>ѡ��</th>
</tr>
<?php if(is_array($cities)) { foreach($cities as $city) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input name="delete[]" type="checkbox" value="<?php echo $city['cityid']?>" /></td>
  <td><input type="text" class="text" style="width:100px;" name="newcity[<?php echo $city['cityid']?>][cityname]" value="<?php echo $city['cityname']?>" /></td>
  <td><input type="text" class="text" style="width:120px;" name="newcity[<?php echo $city['cityid']?>][citypy]" value="<?php echo $city['citypy']?>" /></td>
  <td><input type="text" class="text" style="width:60px;" name="newcity[<?php echo $city['cityid']?>][cityletter]" value="<?php echo $city['cityletter']?>" /></td>
  <td><input type="text" class="text" style="width:40px;" name="newcity[<?php echo $city['cityid']?>][displayorder]" value="<?php echo $city['displayorder']?>" /></td>
  <td>http://<input type="text" class="text" style="width:100px;" name="newcity[<?php echo $city['cityid']?>][cityhost]" value="<?php echo $city['cityhost']?>" />.<?php echo $config['domain']?></td>
  <td><select name="newcity[<?php echo $city['cityid']?>][provinceid]" class="select"><script type="text/javascript">loadprovince(<?php echo $city['provinceid']?>);</script></select></td>
  <td><a href="###" onclick="OpenWindow(<?php echo $city['cityid']?>)">
<?php if($city['admins']) { ?>
<?php echo $city['admins']?>
<? } else { ?>
��ӹ���Ա
<? } ?>
</a></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=area&cityid=<?php echo $city['cityid']?>">�������</a></td>
</tr>
<? } } ?>
<tbody id="newcity"></tbody>
<tr>
<td></td>
<td colspan="7"><div class="addtr"><a href="javascript:;" id="addcity">����·�վ</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="8">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="<?php echo $lang['submit']?>" /> 
<input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="window.location.reload()" />
</td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
$("#provinceid").append(theoptions);
$("#addcity").click(function(){
$("#newcity").append('<tr><td></td><td><input type="text" class="text" style="width:100px;" name="newcityname[]" /></td>'+
  '<td><input type="text" class="text" style="width:120px;" name="newcitypy[]" /></td><td><input type="text" class="text" style="width:60px;" name="newcityletter[]" /></td>'+
  '<td><input type="text" class="text" style="width:40px;" name="neworder[]" value="0" /></td><td>http://<input type="text" class="text" style="width:100px;" name="newcityhost[]" />.<?php echo $config['domain']?></td><td><select name="newprovinceid[]" class="select">'+theoptions+'</select></td><td></td><td></td></tr>');
});
function OpenWindow(cityid){
//window.open(ADMINSCRIPT+'?action=street&areaid='+areaid);
var sw=Math.floor((window.screen.width/2-300));
    var sh=Math.floor((window.screen.height/2-300));
window.open(ADMINSCRIPT+'?action=city&operation=admins&cityid='+cityid,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}
</script>
<? } ?>
