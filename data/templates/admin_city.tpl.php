<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='merger') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>分站管理</span>
<span>合并分站</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>合并分站</strong></div>
<p>核心提示：分站合并后源分站的数据将被转移到目标分站中，源分站将被删除。</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=city&operation=merger" onsubmit="return confirm('分站合并后源分站的数据将被转移到目标分站中，源分站将被删除，且不能恢复，您确定要合并吗?')">
<input type="hidden" name="submit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">请选择要合并的分站</td>
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
<optgroup label="其他">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>选择要合并的分站，按住CTRL键可同时选择多个分站</td>
  </tr>
  <tr>
    <td class="bold">请选择目标分站</td>
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
<optgroup label="其他">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>选择目标分站，目标分站不能存在于已选择的源分站中</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="button-submit" class="button" value="合并" /></td>
  </tr>
</table>
</form>
</div>
<?php } elseif($operation=='move') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>分站管理</span>
<span>移动分站</span>
</div>
<div class="main-div">
<div class="titlediv"><strong>移动分站</strong></div>
<p>核心提示：分站移动后源分站数据将被转移到目标省份中，此操作不会改变分站设置和数据。</p>
<form id="form1" name="form1" method="post" action="<?php echo $BASESCRIPT?>?action=city&operation=move">
<input type="hidden" name="submit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
    <td class="bold" width="360">请选择要移动的分站</td>
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
<optgroup label="其他">
<?php if(is_array($cities['0'])) { foreach($cities['0'] as $city) { ?>
<option value="<?php echo $city['cityid']?>"><?php echo $city['cityname']?></option>
<? } } ?>
</optgroup>
</select>
</td>
    <td>选择要移动的分站，按住CTRL键可同时选择多个分站</td>
  </tr>
  <tr>
    <td class="bold">请选择目标省份</td>
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
    <td>选择目标省份</td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="button-submit" class="button" value="合并" /></td>
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
var optionlist = '<option value="0">未指定</option>';
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
<span>分站管理</span>
<span>分站列表</span>
</div>
<div class="main-div">
<div class="titlediv">
<span class="right">
<form method="get" name="search" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<select name="provinceid" id="provinceid" class="select" onchange="window.location.href=baseurl+'&provinceid='+this.value">
<option value="0">所有分站</option>
</select>
<input type="text" class="text search" name="keywords" id="keywords" value="<?php echo $keywords?>" />
<input type="submit" class="button" value="<?php echo $lang['search']?>" />
</form>
</span>
<strong>分站管理</strong>　总计<?php echo $totalrecords?>条记录
</div>
  <form method="post" name="city" action="<?php echo $BASESCRIPT?>?action=city">
  <input type="hidden" name="submit" value="yes" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
  <th width="120">城市名称</th>
  <th width="160">拼音</th>
  <th width="80">首字母</th>
  <th width="60">排序</th>
  <th width="220">域名</th>
  <th width="120">所在省份</th>
  <th width="120">管理员</th>
  <th>选项</th>
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
添加管理员
<? } ?>
</a></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=area&cityid=<?php echo $city['cityid']?>">区域管理</a></td>
</tr>
<? } } ?>
<tbody id="newcity"></tbody>
<tr>
<td></td>
<td colspan="7"><div class="addtr"><a href="javascript:;" id="addcity">添加新分站</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
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
