<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>������</span>
<span>�༭��Ȩ��</span>
<em><a href="<?php echo $BASESCRIPT?>?action=admingroup">����</a></em>
</div>
<div class="main-div">
  <div class="titlediv"><strong>�༭��Ȩ�� - <?php echo $admingroup['groupname']?>(groupid:<?php echo $admingroup['admingid']?>)</strong></div>
  <form name="admingroup" method="post" action="<?php echo $BASESCRIPT?>?action=admingroups&operation=edit">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="admingid" value="<?php echo $admingid?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
        <tr>
          <td class="bold" width="260">����༭����</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[alloweditpost]" value="1"
<?php if($admingroup['alloweditpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[alloweditpost]" value="0"
<?php if(!$admingroup['alloweditpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����༭����Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����ɾ������</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdelpost]" value="1"
<?php if($admingroup['allowdelpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowdelpost]" value="0"
<?php if(!$admingroup['allowdelpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����ɾ������Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">�����ƶ�����</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowmovepost]" value="1"
<?php if($admingroup['allowmovepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowmovepost]" value="0"
<?php if(!$admingroup['allowmovepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ������ƶ�����Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����ر�����</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowclosepost]" value="1"
<?php if($admingroup['allowclosepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowclosepost]" value="0"
<?php if(!$admingroup['allowclosepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����رչ���Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">�����ö�����</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowmodpost]" value="1"
<?php if($admingroup['allowmodpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowmodpost]" value="0"
<?php if(!$admingroup['allowmodpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ������ö�����Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����������</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowpostarticle]" value="1"
<?php if($admingroup['allowpostarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowpostarticle]" value="0"
<?php if(!$admingroup['allowpostarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����������Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����༭����</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[alloweditarticle]" value="1"
<?php if($admingroup['alloweditarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[alloweditarticle]" value="0"
<?php if(!$admingroup['alloweditarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����༭����Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����ɾ������</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdelarticle]" value="1"
<?php if($admingroup['allowdelarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowdelarticle]" value="0"
<?php if(!$admingroup['allowdelarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����ɾ������Χ�ڵ�����</td>
        </tr>
<tr>
          <td class="bold">����������</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowannounce]" value="1"
<?php if($admingroup['allowannounce']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowannounce]" value="0"
<?php if(!$admingroup['allowannounce']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����������</td>
        </tr>
<tr>
          <td class="bold">����༭�û�</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowedituser]" value="1"
<?php if($admingroup['allowedituser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowedituser]" value="0"
<?php if(!$admingroup['allowedituser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����༭�û���Ϣ</td>
        </tr>
<tr>
          <td class="bold">����ɾ���û�</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdeluser]" value="1"
<?php if($admingroup['allowdeluser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowdeluser]" value="0"
<?php if(!$admingroup['allowdeluser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����ɾ���û���Ϣ</td>
        </tr>
<tr>
          <td class="bold">����鿴��־</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowviewlog]" value="1"
<?php if($admingroup['allowviewlog']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowviewlog]" value="0"
<?php if(!$admingroup['allowviewlog']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����鿴��¼��־</td>
        </tr>
<tr>
          <td class="bold">����鿴ͳ��</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowviewstat]" value="1"
<?php if($admingroup['allowviewstat']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>��
  <input type="radio" name="admingroupnew[allowviewstat]" value="0"
<?php if(!$admingroup['allowviewstat']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>�����Ƿ�����鿴����ͳ��</td>
        </tr>
<tr>
<td colspan="2"><input type="submit" class="button" value="<?php echo $lang['submit']?>" /></td>
</tr>
      </table>
  </form>
</div>
<? } else { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>�û�����</span>
<span>������</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>������</strong></div>
  <form method="post" name="admingroup" action="<?php echo $BASESCRIPT?>?action=admingroups">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
  <th width="30">��ID</th>
  <th width="240">��ͷ��</th>
  <th width="100">����</th>
  <th width="160">������</th>
  <th>ѡ��</th>
</tr>
<tbody id="grouplist">
<?php if(is_array($admingroups)) { foreach($admingroups as $gg) { ?>
<tr onmouseover="this.className='hover'" onmouseout="this.className=''">
  <td><input 
<?php if($gg['type']=='system') { ?>
 disabled="disabled"
<? } else { ?>
 name="delete[]"
<? } ?>
 type="checkbox" value="<?php echo $gg['admingid']?>" /></td>
  <td><?php echo $gg['admingid']?></td>
  <td>
<?php if($gg['type']=='system') { ?>
<?php echo $gg['groupname']?>
<? } else { ?>
<input type="text" class="text text200" name="groupnew[<?php echo $gg['admingid']?>][groupname]" value="<?php echo $gg['groupname']?>" />
<? } ?>
</td>
  <td><?php echo $gg['typename']?></td>
  <td><?php echo $gg['level']?></td>
  <td><a href="<?php echo $BASESCRIPT?>?action=admingroups&operation=edit&admingid=<?php echo $gg['admingid']?>">�༭Ȩ��</a></td>
</tr>
<? } } ?>
</tbody>
<tr>
  <td></td>
  <td colspan="4"><div class="addtr"><a href="javascript:;" id="addgroup">��������</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="4"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" /></td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
$("#addgroup").click(function(){
$("#grouplist").append('<tr><td><input type="hidden" name="newtype[]" value="custom" /></td><td></td><td><input type="text" class="text text200" name="newgroupname[]" value="�·�������"></td><td></td>'+
'<td><select name="newradminid[]"><option value="1"><?php echo $lang['usergroup_level_1']?></option><option value="2"><?php echo $lang['usergroup_level_2']?></option></select></td><td></td></tr>');
})
</script>
<? } ?>
