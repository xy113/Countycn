<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<?php if($operation=='edit') { ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span>用户管理</span>
<span>管理组</span>
<span>编辑组权限</span>
<em><a href="<?php echo $BASESCRIPT?>?action=admingroup">返回</a></em>
</div>
<div class="main-div">
  <div class="titlediv"><strong>编辑组权限 - <?php echo $admingroup['groupname']?>(groupid:<?php echo $admingroup['admingid']?>)</strong></div>
  <form name="admingroup" method="post" action="<?php echo $BASESCRIPT?>?action=admingroups&operation=edit">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <input type="hidden" name="admingid" value="<?php echo $admingid?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
        <tr>
          <td class="bold" width="260">允许编辑帖子</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[alloweditpost]" value="1"
<?php if($admingroup['alloweditpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[alloweditpost]" value="0"
<?php if(!$admingroup['alloweditpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许编辑管理范围内的帖子</td>
        </tr>
<tr>
          <td class="bold">允许删除帖子</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdelpost]" value="1"
<?php if($admingroup['allowdelpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowdelpost]" value="0"
<?php if(!$admingroup['allowdelpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许删除管理范围内的帖子</td>
        </tr>
<tr>
          <td class="bold">允许移动帖子</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowmovepost]" value="1"
<?php if($admingroup['allowmovepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowmovepost]" value="0"
<?php if(!$admingroup['allowmovepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许移动管理范围内的帖子</td>
        </tr>
<tr>
          <td class="bold">允许关闭帖子</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowclosepost]" value="1"
<?php if($admingroup['allowclosepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowclosepost]" value="0"
<?php if(!$admingroup['allowclosepost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许关闭管理范围内的帖子</td>
        </tr>
<tr>
          <td class="bold">允许置顶帖子</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowmodpost]" value="1"
<?php if($admingroup['allowmodpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowmodpost]" value="0"
<?php if(!$admingroup['allowmodpost']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许置顶管理范围内的帖子</td>
        </tr>
<tr>
          <td class="bold">允许发布文章</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowpostarticle]" value="1"
<?php if($admingroup['allowpostarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowpostarticle]" value="0"
<?php if(!$admingroup['allowpostarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许发布管理范围内的文章</td>
        </tr>
<tr>
          <td class="bold">允许编辑文章</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[alloweditarticle]" value="1"
<?php if($admingroup['alloweditarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[alloweditarticle]" value="0"
<?php if(!$admingroup['alloweditarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许编辑管理范围内的文章</td>
        </tr>
<tr>
          <td class="bold">允许删除文章</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdelarticle]" value="1"
<?php if($admingroup['allowdelarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowdelarticle]" value="0"
<?php if(!$admingroup['allowdelarticle']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许删除管理范围内的文章</td>
        </tr>
<tr>
          <td class="bold">允许发布公告</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowannounce]" value="1"
<?php if($admingroup['allowannounce']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowannounce]" value="0"
<?php if(!$admingroup['allowannounce']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许发布公告</td>
        </tr>
<tr>
          <td class="bold">允许编辑用户</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowedituser]" value="1"
<?php if($admingroup['allowedituser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowedituser]" value="0"
<?php if(!$admingroup['allowedituser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许编辑用户信息</td>
        </tr>
<tr>
          <td class="bold">允许删除用户</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowdeluser]" value="1"
<?php if($admingroup['allowdeluser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowdeluser]" value="0"
<?php if(!$admingroup['allowdeluser']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许删除用户信息</td>
        </tr>
<tr>
          <td class="bold">允许查看日志</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowviewlog]" value="1"
<?php if($admingroup['allowviewlog']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowviewlog]" value="0"
<?php if(!$admingroup['allowviewlog']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许查看登录日志</td>
        </tr>
<tr>
          <td class="bold">允许查看统计</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="radio" name="admingroupnew[allowviewstat]" value="1"
<?php if($admingroup['allowviewstat']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['yes']?>　
  <input type="radio" name="admingroupnew[allowviewstat]" value="0"
<?php if(!$admingroup['allowviewstat']) { ?>
 checked="checked"
<? } ?>
> <?php echo $lang['no']?></td>
          <td>设置是否允许查看数据统计</td>
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
<span>用户管理</span>
<span>管理组</span>
</div>
<div class="main-div">
  <div class="titlediv"><strong>管理组</strong></div>
  <form method="post" name="admingroup" action="<?php echo $BASESCRIPT?>?action=admingroups">
  <input type="hidden" name="formsubmit" value="yes" />
  <input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
  <th width="30">组ID</th>
  <th width="240">组头衔</th>
  <th width="100">类型</th>
  <th width="160">管理级别</th>
  <th>选项</th>
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
  <td><a href="<?php echo $BASESCRIPT?>?action=admingroups&operation=edit&admingid=<?php echo $gg['admingid']?>">编辑权限</a></td>
</tr>
<? } } ?>
</tbody>
<tr>
  <td></td>
  <td colspan="4"><div class="addtr"><a href="javascript:;" id="addgroup">新增分组</a></div></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="4"><input type="submit" class="button" name="button-submit" value="<?php echo $lang['submit']?>" /> <input type="button" class="button" value="<?php echo $lang['refresh']?>" onclick="LoadPage()" /></td>
</tr>
  </table>
  </form>
</div>
<script type="text/javascript">
$("#addgroup").click(function(){
$("#grouplist").append('<tr><td><input type="hidden" name="newtype[]" value="custom" /></td><td></td><td><input type="text" class="text text200" name="newgroupname[]" value="新分组名称"></td><td></td>'+
'<td><select name="newradminid[]"><option value="1"><?php echo $lang['usergroup_level_1']?></option><option value="2"><?php echo $lang['usergroup_level_2']?></option></select></td><td></td></tr>');
})
</script>
<? } ?>
