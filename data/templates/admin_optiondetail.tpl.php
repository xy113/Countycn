<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>��Ϣ����</span>
<span>������Ϣѡ��</span>
<em><a href="<?php echo $BASESCRIPT?>?action=threadtypes&operation=typeoption&classid=<?php echo $option['classid']?>">����</a></em>
</div>
<div class="main-div">
<div class="titlediv"><b>ѡ���������</b></div>
<form method="post" action="<?php echo $BASESCRIPT?>?action=threadtypes&operation=optiondetail">
<input type="hidden" name="optionid" value="<?php echo $option['optionid']?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tbody>
      <tr>
        <td class="bold" width="360">ѡ������</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[title]" value="<?php echo $option['title']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">������</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[identifier]" value="<?php echo $option['identifier']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">��������</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
<select  name="optionnew[classid]" class="text">
<?php if(is_array($optiontypes)) { foreach($optiontypes as $ot) { ?>
<option value="<?php echo $ot['optionid']?>"
<?php if($option['classid']==$ot['optionid']) { ?>
 selected="selected"
<? } ?>
><?php echo $ot['title']?></option>
<? } } ?>
</select>
</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">����</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><select name="optionnew[type]" id="option_type" class="text"></select></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">����˳��</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" class="text" name="optionnew[displayorder]" value="<?php echo $option['displayorder']?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold"></td>
        <td>&nbsp;</td>
      </tr>
  </tbody>
  <tbody class="rules" id="rule_text">
  <tr>
<td class="option">�ִ�(text)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>������󳤶ȣ���ѡ��:</b></p><input type="text" class="text" name="optionnew[rules][maxlength]"></td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_number">
  <tr>
<td class="option">����(number)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<p><strong>���ֵ(��ѡ)��</strong></p>
<input type="text" class="text" name="optionnew[rules][number][maxnum]" value="<?php echo $option['rules']['maxnum']?>"> 
<p><strong>��Сֵ(��ѡ)��</strong></p>
<input type="text" class="text" name="optionnew[rules][number][minnum]" value="<?php echo $option['rules']['minnum']?>">
</td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_radio">
  <tr>
<td class="option">��ѡ(radio)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>ѡ������:</b></p><textarea class="text" name="optionnew[rules][radio][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>ֻ����ĿΪ��ѡʱ��Ч��ÿ��һ��ѡ��Ⱥ�ǰ��Ϊѡ������(����������)������Ϊ���ݣ�����: <br>
  1 = ������<br>
  2 = ��е���<br>
  3 = û�����<br>
  ע��: ѡ��ȷ���������޸����������ݵĶ�Ӧ��ϵ�����Կ�������ѡ����������ʾ˳�򣬿���ͨ���ƶ����е�����λ����ʵ��<br>
   </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_checkbox">
  <tr>
<td class="option">��ѡ(checkbox)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>ѡ������:</b></p><textarea class="text" name="optionnew[rules][checkbox][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>ֻ����ĿΪ��ѡʱ��Ч��ÿ��һ��ѡ��Ⱥ�ǰ��Ϊѡ������(����������)������Ϊ���ݣ�����: <br>
  1 = ������<br>
  2 = ��е���<br>
  3 = û�����<br>
  ע��: ѡ��ȷ���������޸����������ݵĶ�Ӧ��ϵ�����Կ�������ѡ����������ʾ˳�򣬿���ͨ���ƶ����е�����λ����ʵ��<br>
    </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_textarea">
  <tr>
<td class="option">�ı�(textarea)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>������󳤶ȣ���ѡ��:</b></p><input type="text" class="text" name="optionnew[rules][textarea][maxlength]" value="<?php echo $option['rules']['maxlength']?>"></td>
<td>&nbsp;</td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_select">
  <tr>
<td class="option">ѡ��(select)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><p><b>ѡ������:</b></p><textarea class="text" name="optionnew[rules][select][choices]"><?php echo $option['rules']['choices']?></textarea></td>
<td>ֻ����ĿΪ��ѡʱ��Ч��ÿ��һ��ѡ��Ⱥ�ǰ��Ϊѡ������(����������)������Ϊ���ݣ�����: <br>
  1 = ������<br>
  2 = ��е���<br>
  3 = û�����<br>
  ע��: ѡ��ȷ���������޸����������ݵĶ�Ӧ��ϵ�����Կ�������ѡ����������ʾ˳�򣬿���ͨ���ƶ����е�����λ����ʵ��<br>
    </td>
  </tr>
  </tbody>
  <tbody class="rules" id="rule_image">
  <tr>
<td class="option">ͼ��(image)</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<p><strong>ͼƬ�����(��ѡ)��</strong></p>
<input type="text" class="text" name="optionnew[rules][image][maxwidth]" value="<?php echo $option['rules']['maxwidth']?>"> 
<p><strong>ͼƬ���߶�(��ѡ)��</strong></p>
<input type="text" class="text" name="optionnew[rules][image][maxheight]" value="<?php echo $option['rules']['maxheight']?>">
</td>
<td>&nbsp;</td>
  </tr>
  </tbody>
    </table>
<div class="toolbar"><input type="submit" class="button" value="<?php echo $lang['submit']?>"></div>
</form>
</div>
<script type="text/javascript">
var options = {'text':'�ִ�','number':'����','radio':'��ѡ','checkbox':'��ѡ','textarea':'�ı�','select':'ѡ��','calendar':'����','email':'�����ʼ�','url':'��������','image':'ͼ��'}
for(var option in options){
if(option == '<?php echo $option['type']?>'){
$("#option_type").append('<option value="'+option+'" selected>'+options[option]+'</option>');
}else{
$("#option_type").append('<option value="'+option+'">'+options[option]+'</option>');
}
}
$(".rules").hide();
$("#rule_<?php echo $option['type']?>").show();
$("#option_type").change(function(){
$(".rules").hide();
$("#rule_"+$(this).val()).show();
})
</script>