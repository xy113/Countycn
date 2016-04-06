<?php if(!defined('IN_XSCMS')) exit('Access Denied'); ?>
<div class="yourpos">
<?php echo $lang['cp_home']?>
<span><?php echo $lang['setting_system']?></span>
<span><?php echo $lang['setting_'.$operation]?></span>
</div>
<div class="main-div">
<div class="titlediv"><b><?php echo $lang['setting_'.$operation]?></b></div>
<form name="settings" method="post" action="<?php echo $BASESCRIPT?>?action=settings&operation=<?php echo $operation?>">
<input type="hidden" name="submit" value="yes" />
<?php if($operation=='basic') { ?>
<table border="0" cellpadding="0" cellspacing="0" class="formtable">
<tr>
  <td width="360" class="bold"><?php echo $lang['setting_sysname']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[sysname]" type="text" class="text" value="<?php echo $config['sysname']?>" /></td>
  <td><?php echo $lang['setting_tips_0']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_sitename']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[sitename]" type="text" class="text" value="<?php echo $config['sitename']?>"/></td>
  <td><?php echo $lang['setting_tips_1']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_siteurl']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[siteurl]" type="text" class="text" value="<?php echo $config['siteurl']?>"/></td>
  <td><?php echo $lang['setting_tips_2']?></td>
</tr>
<tr>
  <td class="bold">网站根域名：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[domain]" type="text" class="text" value="<?php echo $config['domain']?>"/></td>
  <td>如：countycn.com，不要加www和/</td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_keywords']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[keywords]" class="text" value="<?php echo $config['keywords']?>"></td>
  <td><?php echo $lang['setting_tips_3']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_description']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="settingnew[description]" class="text" style="height:60px;"><?php echo $config['description']?></textarea></td>
  <td><?php echo $lang['setting_tips_4']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_icp']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[icp]" type="text" class="text" value="<?php echo $config['icp']?>" /></td>
  <td><?php echo $lang['setting_tips_5']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_copyright']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input name="settingnew[copyright]" class="text" value="<?php echo $config['copyright']?>"></td>
  <td><?php echo $lang['setting_tips_6']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_islog']?>：</td>
  <td></td>
</tr>
<tr>
<td>
<input type="radio" name="settingnew[islog]"  value="1"
<?php if($config['islog']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['yes']?>　
<input type="radio" name="settingnew[islog]"  value="0"
<?php if($config['islog']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['no']?>	</td>
  <td><?php echo $lang['setting_tips_7']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_statcode']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="settingnew[statcode]" class="text" style="height:60px;"><?php echo $config['statcode']?></textarea></td>
  <td><?php echo $lang['setting_tips_8']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_slidewidth']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" name="settingnew[slidewidth]" value="<?php echo $config['slidewidth']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_9']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_slideheight']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" name="settingnew[slideheight]" value="<?php echo $config['slideheight']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_10']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_sysclosed']?>：</td>
  <td></td>
</tr>
<tr>
  <td>
<input name="settingnew[sysclosed]" type="radio" value="1"
<?php if($config['sysclosed']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['yes']?>　
<input name="settingnew[sysclosed]" type="radio" value="0"
<?php if($config['sysclosed']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['no']?>  </td>
  <td><?php echo $lang['setting_tips_11']?></td>
</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_closedreason']?>：</td>
  <td>&nbsp;</td>
</tr>

<tr>
  <td><textarea name="settingnew[sysclosedreason]" class="text" style="height:60px;"><?php echo $config['sysclosedreason']?></textarea></td>
  <td><?php echo $lang['setting_tips_12']?></td>
</tr>
</table>
<? } ?>
<?php if($operation=='optimization') { ?>
<table border="0" cellspacing="0" cellpadding="0" class="formtable">
<tr>
  <td width="360" class="bold"><?php echo $lang['setting_rewrite']?>:</td>
  <td>&nbsp;</td>
  	</tr>
<tr>
  <td>
  	<input type="radio" name="settingnew[rewrite]"  value="1"
<?php if($config['rewrite']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['yes']?>　
<input type="radio" name="settingnew[rewrite]"  value="0"
<?php if($config['rewrite']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['no']?>		  </td>
  <td><?php echo $lang['setting_tips_13']?></td>
  	</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_seotitle']?>:</td>
  <td></td>
  </tr>
<tr>
  <td><input name="settingnew[seotitle]" type="text" class="text" value="<?php echo $config['seotitle']?>" /></td>
  <td><?php echo $lang['setting_tips_14']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_seohead']?>:</td>
  <td></td>
  </tr>
<tr>
  <td><textarea name="settingnew[seohead]" class="text"><?php echo $config['seohead']?></textarea></td>
  <td><?php echo $lang['setting_tips_15']?></td>
  </tr>
<tr>
  <td width="100" class="bold"><?php echo $lang['setting_iscache']?>：</td>
  <td></td>
</tr>
<tr>
  <td>
  	<input type="radio" name="settingnew[iscache]"  value="1"
<?php if($config['iscache']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['yes']?>　
<input type="radio" name="settingnew[iscache]"  value="0"
<?php if($config['iscache']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['no']?>		  </td>
  <td><?php echo $lang['setting_tips_16']?></td>
  	</tr>
<tr>
  <td class="bold"><?php echo $lang['setting_cacheindex']?>:</td>
  <td></td>
  </tr>
<tr>
  <td><input type="text" name="settingnew[cacheindex]" class="text" value="<?php echo $config['cacheindex']?>" /></td>
  <td><?php echo $lang['setting_tips_17']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_cachetime']?>：</td>
  <td></td>
</tr>
<tr>
  <td><input type="text" name="settingnew[cachetime]" value="<?php echo $config['cachetime']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_18']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_cachedir']?>：</td>
  <td></td>
</tr>
<tr>
  <td><input type="text" name="settingnew[cachedir]" value="<?php echo $config['cachedir']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_19']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_gzipcompress']?>：</td>
  <td></td>
</tr>
<tr>
  <td>
  	<input type="radio" name="settingnew[gzipcompress]" value="1"
<?php if($config['gzipcompress']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['yes']?>　
<input type="radio" name="settingnew[gzipcompress]" value="0"
<?php if($config['gzipcompress']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['no']?>
  </td>
  <td><?php echo $lang['setting_tips_20']?></td>
  </tr>
</table>
<? } ?>
<?php if($operation=='attachment') { ?>
<table border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
<td width="360" class="bold"><?php echo $lang['setting_attachdir']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[attachdir]" type="text" value="<?php echo $config['attachdir']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_21']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_attachmax']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[attachmax]" type="text" value="<?php echo $config['attachmax']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_22']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_attachtype']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[attachtype]" type="text" value="<?php echo $config['attachtype']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_23']?></td>
  </tr>
</table>
<? } ?>

<?php if($operation=='image') { ?>
<table border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
<td width="360" class="bold"><?php echo $lang['setting_imgtype']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[imgtype]" type="text" value="<?php echo $config['imgtype']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_24']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_thumbstatus']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<input type="radio" name="settingnew[thumbstatus]" value="1"
<?php if($config['thumbstatus']==1) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['yes']?>
<input type="radio" name="settingnew[thumbstatus]" value="0"
<?php if($config['thumbstatus']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['no']?>		 	
</td>
<td><?php echo $lang['setting_tips_25']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_thumbsize']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<input name="settingnew[thumbwidth]" type="text" value="<?php echo $config['thumbwidth']?>" class="textinput" style="width:60px;" /> x 
<input name="settingnew[thumbheight]" type="text" value="<?php echo $config['thumbheight']?>" class="textinput" style="width:60px;" />			</td>
<td><?php echo $lang['setting_tips_26']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_watermark']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<input type="radio" name="settingnew[watermarkstatus]" value="0"
<?php if($config['watermarkstatus']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['setting_nowatermark']?><br />
<input type="radio" name="settingnew[watermarkstatus]" value="1"
<?php if($config['watermarkstatus']==1) { ?>
 checked="checked"
<? } ?>
 />
#1
<input type="radio" name="settingnew[watermarkstatus]" value="2"
<?php if($config['watermarkstatus']==2) { ?>
 checked="checked"
<? } ?>
 />
#2
<input type="radio" name="settingnew[watermarkstatus]" value="3"
<?php if($config['watermarkstatus']==3) { ?>
 checked="checked"
<? } ?>
 />
#3<br />
<input type="radio" name="settingnew[watermarkstatus]" value="4"
<?php if($config['watermarkstatus']==4) { ?>
 checked="checked"
<? } ?>
 />
#4
<input type="radio" name="settingnew[watermarkstatus]" value="5"
<?php if($config['watermarkstatus']==5) { ?>
 checked="checked"
<? } ?>
 />
#5
<input type="radio" name="settingnew[watermarkstatus]" value="6"
<?php if($config['watermarkstatus']==6) { ?>
 checked="checked"
<? } ?>
 />
#6<br />
<input type="radio" name="settingnew[watermarkstatus]" value="7"
<?php if($config['watermarkstatus']==7) { ?>
 checked="checked"
<? } ?>
 />
#7
<input type="radio" name="settingnew[watermarkstatus]" value="8"
<?php if($config['watermarkstatus']==8) { ?>
 checked="checked"
<? } ?>
 />
#8
<input type="radio" name="settingnew[watermarkstatus]" value="9"
<?php if($config['watermarkstatus']==9) { ?>
 checked="checked"
<? } ?>
 />
#9			</td>
<td><?php echo $lang['setting_tips_27']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_watermarktype']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td>
<input type="radio" name="settingnew[watermarktype]" value="0"
<?php if($config['watermarktype']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['setting_watermarktype_0']?>
<input type="radio" name="settingnew[watermarktype]" value="1"
<?php if($config['watermarktype']==1) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['setting_watermarktype_1']?>			
</td>
<td><?php echo $lang['setting_tips_28']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_watertext']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><textarea name="settingnew[watermarktext]" rows="3" class="text"><?php echo $config['watermarktext']?></textarea></td>
<td><?php echo $lang['setting_tips_29']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_waterfont']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkfontfile]" type="text" value="<?php echo $config['watermarkfontfile']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_30']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_watersize']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkfontsize]" type="text" value="<?php echo $config['watermarkfontsize']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_31']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_watercolor']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkfontcolor]" type="text" value="<?php echo $config['watermarkfontcolor']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_32']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_waterimg']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkimg]" type="text" value="<?php echo $config['watermarkimg']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_33']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_wateralpha']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkalpha]" type="text" value="<?php echo $config['watermarkalpha']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_34']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_waterxoffset']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkoffsetx]" type="text" value="<?php echo $config['watermarkoffsetx']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_35']?></td>
  </tr>
  <tr>
<td class="bold"><?php echo $lang['setting_wateryoffset']?>：</td>
<td>&nbsp;</td>
  </tr>
  <tr>
<td><input name="settingnew[watermarkoffsety]" type="text" value="<?php echo $config['watermarkoffsety']?>" class="text" /></td>
<td><?php echo $lang['setting_tips_36']?></td>
  </tr>
</table>
<? } ?>
<?php if($operation=='register') { ?>
<table border="0" cellpadding="0" cellspacing="0" class="formtable">
<tr>
  <td width="360" class="bold"><?php echo $lang['setting_register_allowed']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>
<input name="settingnew[regallowed]" type="radio" value="1"
<?php if($config['regallowed']==1) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['yes']?>　
  <input name="settingnew[regallowed]" type="radio" value="0"
<?php if($config['regallowed']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['no']?>			</td>
  <td><?php echo $lang['setting_tips_37']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_link']?>:</td>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td><input type="text" name="settingnew[reglink]" value="<?php echo $config['reglink']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_38']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_linkname']?>:</td>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td><input type="text" name="settingnew[reglinkname]" value="<?php echo $config['reglinkname']?>" class="text" /></td>
  <td><?php echo $lang['setting_tips_39']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_advance']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>
<input name="settingnew[regadvance]" type="radio" value="1"
<?php if($config['regadvance']==1) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['yes']?>　
  <input name="settingnew[regadvance]" type="radio" value="0"
<?php if($config['regadvance']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['no']?>			</td>
  <td><?php echo $lang['setting_tips_40']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_verify']?>:</td>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td>
<select name="settingnew[regverify]" style="width:300px;">
<option value="0"
<?php if($config['regverify']==0) { ?>
 selected="selected"
<? } ?>
><?php echo $lang['setting_register_verify_0']?></option>
<option value="1"
<?php if($config['regverify']==1) { ?>
 selected="selected"
<? } ?>
><?php echo $lang['setting_register_verify_1']?></option>
<option value="2"
<?php if($config['regverify']==2) { ?>
 selected="selected"
<? } ?>
><?php echo $lang['setting_register_verify_2']?></option>
</select>
  </td>
  <td><?php echo $lang['setting_tips_41']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_wellcomemsg']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>
<ul>
<li><input name="settingnew[wellcomemsg]" type="radio" value="0"
<?php if($config['wellcomemsg']==0) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_register_wellcomemsg_0']?></li>
<li><input name="settingnew[wellcomemsg]" type="radio" value="1"
<?php if($config['wellcomemsg']==1) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_register_wellcomemsg_1']?></li>
<li><input name="settingnew[wellcomemsg]" type="radio" value="2"
<?php if($config['wellcomemsg']==2) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_register_wellcomemsg_2']?></li>
</ul>		 	
</td>
  <td><?php echo $lang['setting_tips_42']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_wellcomemsgtitle']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><input type="text" name="settingnew[wellcomemsgtitle]" class="text" value="<?php echo $config['wellcomemsgtitle']?>" /></td>
  <td><?php echo $lang['setting_tips_43']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_wellcomemsgtxt']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="settingnew[wellcomemsgtxt]" class="text" style="height:100px;"><?php echo $config['wellcomemsgtxt']?></textarea></td>
  <td><?php echo $lang['setting_tips_44']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_sysrules']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>
<input name="settingnew[sysrules]" type="radio" value="1"
<?php if($config['sysrules']==1) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['yes']?>　
<input name="settingnew[sysrules]" type="radio" value="0"
<?php if($config['sysrules']==0) { ?>
 checked="checked"
<? } ?>
 />
<?php echo $lang['no']?>			
</td>
  <td><?php echo $lang['setting_tips_45']?></td>
  </tr>
<tr>
  <td class="bold"><?php echo $lang['setting_register_sysrulestxt']?>：</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><textarea name="settingnew[sysrulestxt]" class="text" style="height:100px;"><?php echo $config['sysrulestxt']?></textarea></td>
  <td><?php echo $lang['setting_tips_46']?></td>
  </tr>
</table>
<? } ?>
<?php if($operation=='randcode') { ?>
<table border="0" cellpadding="0" cellspacing="0" class="formtable">
<tr>
  <td width="360" class="bold"><?php echo $lang['setting_randcodestatus']?>：</td>
  <td></td>
</tr>
<tr>
  <td>
<ul>
<li><input name="settingnew[randcodestatus][register]" type="checkbox" value="1"
<?php if($config['randcodestatus']['register']) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_randcodestatus_1']?></li>
<li><input name="settingnew[randcodestatus][login]" type="checkbox" value="1"
<?php if($config['randcodestatus']['login']) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_randcodestatus_2']?></li>
<li><input name="settingnew[randcodestatus][post]" type="checkbox" value="1"
<?php if($config['randcodestatus']['post']) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_randcodestatus_3']?></li>
<li><input name="settingnew[randcodestatus][reply]" type="checkbox" value="1"
<?php if($config['randcodestatus']['reply']) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_randcodestatus_4']?></li>
<li><input name="settingnew[randcodestatus][modify]" type="checkbox" value="1"
<?php if($config['randcodestatus']['modify']) { ?>
 checked="checked"
<? } ?>
 /> <?php echo $lang['setting_randcodestatus_5']?></li>
</ul>			  
  </td>
  <td><?php echo $lang['setting_tips_47']?></td>
  </tr>
</table>
<? } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
  <tr>
<td><input type="submit" name="button-submit" class="button" value="<?php echo $lang['submit']?>" /></td>
  </tr>
</table>
</form>
</div>