<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-05-20
 * $ID:admincp_main.php
**/
if (!defined('IN_XSCMS')||!defined('IN_ADMINCP'))die('Access Denied!');
include ROOT_PATH."/source/lang/$config[language]/cpmenu.php";
$lang = array_merge($lang,$cpmenu);
$headers = $menus = '';
$headers.= $admin->checkadminpriv('allowadminsettings') ? showheader('settings','settings&operation=basic') : '';
$headers.= $admin->checkadminpriv('allowadminmember') ? showheader('user','member') : '';
$headers.= $admin->checkadminpriv('allowadminsite') ? showheader('site','city') : '';
$headers.= showheader('info','threads');
$headers.= showheader('tool','runlog');
$headers.= $admincp['adminid']==1 ? showheader('task','announce') : '';

$menus.= $isfounder ? showmenu('settings',array(
	array('menu_settings_basic','settings&operation=basic'),
	array('menu_settings_optimization','settings&operation=optimization'),
	array('menu_settings_attachment','settings&operation=attachment'),
	array('menu_settings_image','settings&operation=image'),
	array('menu_settings_register','settings&operation=register'),
	array('menu_settings_randcode','settings&operation=randcode'),
	array('menu_contactus','contactus'),
	//$admin->checkadminpriv('allowadminnav') ? array('menu_nav','nav') : array(),
	array('menu_adminlog','cplog'),
	array('menu_about','about')
)) : '';

$menus.= $admin->checkadminpriv('allowadminmember') ? showmenu('user',array(
	$isfounder ? array('menu_admingroup','admingroups') : array(),
	$isfounder ? array('menu_usergroup','usergroups') : array(),
	array('menu_addmember','member&operation=add'),
	array('menu_userlist','member'),
)) : '';

$menus.= $admin->checkadminpriv('allowadminsite') ? showmenu('site',array(
	array('menu_province','province'),
	array('menu_site','city'),
	array('menu_site_merger','city&operation=merger'),
	array('menu_site_move','city&operation=move'),
	array('menu_area','area')
)) : '';

$menus.= showmenu('info',array(
	array('menu_threads','threads'),
	array('menu_pending','threads&audited=-1'),
	array('menu_report','report'),
	$isfounder ? array('menu_category','category') : array(),
	$isfounder ? array('menu_category_merger','category&operation=merger') : array(),
	$isfounder ? array('menu_threadtypes','threadtypes') : array(),
	$isfounder ? array('menu_typeoptions','threadtypes&operation=typeoption') : array()
));

$menus.= showmenu('tool',array(
	array('menu_runlog','runlog'),
	array('menu_stat','stat'),
	$admincp['adminid']==1 ? array('menu_cache','cache') : array(),
	$isfounder ? array('menu_email','email') : array(),
	array('menu_check','check')
));

$menus.= showmenu('task',array(
	array('menu_announce','announce'),
	$admin->checkadminpriv('allowadminlink') ? array('menu_flink','flink') : array(),
	array('menu_faq','faq'),
	array('menu_feedback','feedback')
));
include template('admin');
?>